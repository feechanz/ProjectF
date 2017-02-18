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
}