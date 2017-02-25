<?php
include_once 'Kelas.php';
include_once 'TeacherDao.php';
include_once 'PeriodeDao.php';


class KelasDao {
    public function get_kelas_row($row)
    {
        $kelas = new Kelas();
        $kelas ->setKelasid($row['kelasid']);
        $kelas ->setNamakelas($row['namakelas']);
        $kelas ->setClasslevel($row['classlevel']);
        
        $teacherid = $row['teacherid'];
        $teacherdao = new TeacherDao();
        $teacher = $teacherdao ->get_one_teacher($teacherid);
        
        $kelas ->setTeacherid($teacherid);
        $kelas ->setTeacher($teacher);
        
        $periodeid = $row['periodeid'];
        $periodedao = new PeriodeDao();
        $periode = $periodedao ->get_one_periode($periodeid);
        
        $kelas ->setPeriodeid($periodeid);
        $kelas ->setPeriode($periode);
        
        return $kelas;
    }
    
    public function get_my_kelas($teacherid, $periodeid)
    {
        $kelass = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT k.kelasid as kelasid, k.namakelas as namakelas, k.classlevel as classlevel, 
                        k.teacherid as teacherid, k.periodeid as periodeid, COUNT(mk.studentkelasid) as jumlahsiswa
                      FROM kelas k
                      LEFT JOIN studentkelas mk
                      ON k.kelasid = mk.kelasid
                      WHERE k.teacherid = ? AND k.periodeid = ?
                      GROUP BY k.kelasid, k.namakelas, k.classlevel, k.teacherid, k.periodeid
                      ORDER BY k.classlevel, k.namakelas";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $teacherid);
            $stmt -> bindValue(2, $periodeid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $kelas = $this ->get_kelas_row($row);
                    $kelas ->setJumlahsiswa($row['jumlahsiswa']);
                    $kelass->append($kelas);
                }
            }
        } 
        catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        try {
            if (!empty($conn) || $conn != null) {
                $conn = null;
            }
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
        return $kelass;
    }
    
    public function get_kelas_by_periodeid($periodeid)
    {
        $kelass = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from kelas
                      WHERE periodeid = ? 
                      ORDER BY classlevel,namakelas";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $periodeid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $kelas = $this ->get_kelas_row($row);
                    $kelass->append($kelas);
                }
            }
        } 
        catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        try {
            if (!empty($conn) || $conn != null) {
                $conn = null;
            }
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
        return $kelass;
    }
    
    public function get_kelas_by_studentid($studentid)
    {
        $kelass = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from kelas
                      WHERE kelasid IN 
                      (SELECT kelasid 
                       FROM studentkelas
                       WHERE studentid = ?)
                      ORDER BY classlevel, namakelas";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $studentid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $kelas = $this ->get_kelas_row($row);
                    $kelass->append($kelas);
                }
            }
        } 
        catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        try {
            if (!empty($conn) || $conn != null) {
                $conn = null;
            }
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
        return $kelass;
    }
    
    public function get_one_kelasid($kelasid)
    {
        $kelas = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM kelas 
                    WHERE kelasid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $kelasid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $kelas = $this->get_kelas_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $kelas;
    }
    
    public function insert_kelas($kelas)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO kelas(namakelas,classlevel,teacherid,periodeid)  
                    VALUES(?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $kelas ->getNamakelas());
            $stmt -> bindValue(2, $kelas ->getClasslevel());
            $stmt -> bindValue(3, $kelas ->getTeacherid());
            $stmt -> bindValue(4, $kelas ->getPeriodeid());
            $result = $stmt -> execute();
            $conn -> commit();
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            $stmt -> rollBacxk();
            die();
        }
        try
        {
            if(!empty($conn) || $conn != null)
            {
                $conn = null;
            }
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
        }
        return $result;	
    }
    
    
    public function insert_kelas_student($kelasid,$studentid)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO studentkelas(studentid,kelasid)  
                    VALUES(?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $studentid);
            $stmt -> bindValue(2, $kelasid);
            $result = $stmt -> execute();
            $conn -> commit();
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            $stmt -> rollBacxk();
            die();
        }
        try
        {
            if(!empty($conn) || $conn != null)
            {
                $conn = null;
            }
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
        }
        return $result;	
    }
}