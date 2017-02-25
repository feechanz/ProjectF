<?php
include_once 'Mapelkelas.php';
include_once 'LessonDao.php';
include_once 'TeacherDao.php';
include_once 'KelasDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MapelkelasDao
 *
 * @author Feechan
 */
class MapelkelasDao {
    //put your code here
    public function get_mapelkelas_row($row)
    {
        $mapelkelas = new Mapelkelas();
        $mapelkelas->setMapelkelasid($row['mapelkelasid']);
        $lessonid = $row['lessonid'];
        $lessondao = new LessonDao();
        $lesson = $lessondao->get_one_lesson($lessonid);
        
        $mapelkelas->setLessonid($lessonid);
        $mapelkelas->setLesson($lesson);
        $mapelkelas->setLessonname($row['lessonname']);
        $mapelkelas->setMinimumscore($row['minimumscore']);
        
        
        $teacherid = $row['teacherid'];
        $teacherdao = new TeacherDao();
        $teacher = $teacherdao ->get_one_teacher($teacherid);
        
        $mapelkelas ->setTeacherid($teacherid);
        $mapelkelas ->setTeacher($teacher);
        
        $kelasid = $row['kelasid'];
        $kelasdao = new KelasDao();
        $kelas = $kelasdao->get_one_kelasid($kelasid);
        
        $mapelkelas->setKelasid($kelasid);
        $mapelkelas->setKelas($kelas);
        
        $mapelkelas->setCreatedate($row['createdate']);
        return $mapelkelas;
    }
    
    
    public function get_my_mapelkelas($teacherid,$periodeid)
    {
        $mapelkelass = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT mk.mapelkelasid as mapelkelasid, mk.lessonid as lessonid,
                    mk.lessonname as lessonname, mk.minimumscore as minimumscore,
                    mk.teacherid as teacherid, mk.kelasid as kelasid, mk.createdate as createdate
                    FROM mapelkelas mk
                    JOIN kelas k 
                    ON mk.kelasid = k.kelasid
                    WHERE k.periodeid = ?
                    AND mk.teacherid = ?
                    ORDER BY k.classlevel, k.namakelas";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $periodeid);
            $stmt -> bindValue(2, $teacherid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $mapelkelas = $this ->get_mapelkelas_row($row);
                    $mapelkelass->append($mapelkelas);
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
        return $mapelkelass;
    }
    
    public function get_mapelkelas_kelasid($kelasid)
    {
        $mapelkelass = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from mapelkelas
                      WHERE kelasid = ?
                      ORDER BY lessonname";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $kelasid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $mapelkelas = $this ->get_mapelkelas_row($row);
                    $mapelkelass->append($mapelkelas);
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
        return $mapelkelass;
    }
    public function get_one_mapelkelas($mapelkelasid)
    {
        $mapelkelas = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM mapelkelas 
                    WHERE mapelkelasid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $mapelkelasid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $mapelkelas = $this->get_mapelkelas_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $mapelkelas;
    }
    
    public function insert_mapelkelas($mapelkelas)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO mapelkelas(lessonid,lessonname,minimumscore,teacherid,kelasid)  
                    VALUES(?,?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $mapelkelas ->getLessonid());
            $stmt -> bindValue(2, $mapelkelas ->getLessonname());
            $stmt -> bindValue(3, $mapelkelas ->getMinimumscore());
            $stmt -> bindValue(4, $mapelkelas ->getTeacherid());
            $stmt -> bindValue(5, $mapelkelas ->getKelasid());
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
    
    public function update_teacher($teacherid, $mapelkelasid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE mapelkelas  
                    SET 
                        teacherid = ?
                    WHERE mapelkelasid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $teacherid );
            $stmt -> bindValue(2, $mapelkelasid );
            
            $result = $stmt -> execute();
            $conn -> commit();
        } catch (PDOException $e) {
            echo $e -> getMessage();
            $conn -> rollBack();
            die();
        }
        $conn = null;
        return $result;	
    }
}
