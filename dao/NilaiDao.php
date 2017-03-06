<?php
include_once 'Nilai.php';
include_once 'MapelkelasDao.php';
include_once 'StudentDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NilaiDao
 *
 * @author Feechan
 */
class NilaiDao {
    //put your code here
    public function get_nilai_row($row)
    {
        $nilai = new Nilai();
        $nilai ->setNilaiid($row['nilaiid']);
        $nilai ->setUts_ulangan1($row['uts_ulangan1']);
        $nilai ->setUts_ulangan2($row['uts_ulangan2']);
        $nilai ->setUts_ulangan3($row['uts_ulangan3']);
        $nilai ->setUts_ulangan4($row['uts_ulangan4']);
        $nilai ->setUts_ulangan5($row['uts_ulangan5']);
        
        $nilai ->setUts_quiz1($row['uts_quiz1']);
        $nilai ->setUts_quiz2($row['uts_quiz2']);
        $nilai ->setUts_quiz3($row['uts_quiz3']);
        $nilai ->setUts_quiz4($row['uts_quiz4']);
        $nilai ->setUts_quiz5($row['uts_quiz5']);
        
        $nilai ->setUts($row['uts']);
        
        $nilai ->setUas_ulangan1($row['uas_ulangan1']);
        $nilai ->setUas_ulangan2($row['uas_ulangan2']);
        $nilai ->setUas_ulangan3($row['uas_ulangan3']);
        $nilai ->setUas_ulangan4($row['uas_ulangan4']);
        $nilai ->setUas_ulangan5($row['uas_ulangan5']);
        
        $nilai ->setUas_quiz1($row['uas_quiz1']);
        $nilai ->setUas_quiz2($row['uas_quiz2']);
        $nilai ->setUas_quiz3($row['uas_quiz3']);
        $nilai ->setUas_quiz4($row['uas_quiz4']);
        $nilai ->setUas_quiz5($row['uas_quiz5']);
        
        $nilai ->setUas($row['uas']);
        
        $mapelkelasid = $row['mapelkelasid'];
        $mapelkelasdao = new MapelkelasDao();
        $mapelkelas = $mapelkelasdao ->get_one_mapelkelas($mapelkelasid);
        
        $nilai ->setMapelkelasid($mapelkelasid);
        $nilai ->setMapelkelas($mapelkelas);
        
        $studentid = $row['studentid'];
        $studentdao = new StudentDao();
        $student = $studentdao ->get_one_student($studentid);
        
        $nilai ->setStudentid($studentid);
        $nilai ->setStudent($student);
        return $nilai;
    }
    
    public function get_nilai_by_mapelkelasid($mapelkelasid)
    {
        $nilais = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT n.nilaiid, n.uts_ulangan1, n.uts_ulangan2, n.uts_ulangan3, n.uts_ulangan4, n.uts_ulangan5,
                            n.uts_quiz1, n.uts_quiz2, n.uts_quiz3, n.uts_quiz4, n.uts_quiz5, n.uts,
                            n.uas_ulangan1, n.uas_ulangan2, n.uas_ulangan3, n.uas_ulangan4, n.uas_ulangan5,
                            n.uas_quiz1, n.uas_quiz2, n.uas_quiz3, n.uas_quiz4, n.uas_quiz5, n.uas,
                            mk.mapelkelasid as mapelkelasid, s.studentid
                      FROM student s
                      JOIN studentkelas sk
                      ON s.studentid = sk.studentid
                      JOIN mapelkelas mk
                      ON sk.kelasid = mk.kelasid
                      LEFT JOIN nilai n 
                      ON mk.mapelkelasid = n.mapelkelasid 
                      AND sk.studentid = n.studentid
                      WHERE mk.mapelkelasid = ?
                      ORDER BY sk.studentid";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $mapelkelasid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $nilai = $this ->get_nilai_row($row);
                    $nilais->append($nilai);
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
        return $nilais;
    }
    public function get_one_nilai($mapelkelasid,$studentid)
    {
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM nilai 
            WHERE mapelkelasid = ? AND studentid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(1, $mapelkelasid);
            $stmt -> bindParam(2, $studentid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0)
            {
                while ($row = $stmt -> fetch())
                {
                   $nilai = $this ->get_nilai_row($row);
                }
            }
            else
            {
                $nilai = NULL;
            }
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            die();
        }
        $conn = null;

        return $nilai;
    }
    
    public function get_nilai_by_studentid($studentid,$kelasid)
    {
        $nilais = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT n.nilaiid, n.uts_ulangan1, n.uts_ulangan2, n.uts_ulangan3, n.uts_ulangan4, n.uts_ulangan5,
                            n.uts_quiz1, n.uts_quiz2, n.uts_quiz3, n.uts_quiz4, n.uts_quiz5, n.uts,
                            n.uas_ulangan1, n.uas_ulangan2, n.uas_ulangan3, n.uas_ulangan4, n.uas_ulangan5,
                            n.uas_quiz1, n.uas_quiz2, n.uas_quiz3, n.uas_quiz4, n.uas_quiz5, n.uas,
                            mk.mapelkelasid as mapelkelasid, s.studentid
                      FROM student s
                      JOIN studentkelas sk
                      ON s.studentid = sk.studentid
                      JOIN mapelkelas mk
                      ON sk.kelasid = mk.kelasid
                      LEFT JOIN nilai n 
                      ON mk.mapelkelasid = n.mapelkelasid 
                      AND sk.studentid = n.studentid
                      WHERE s.studentid = ? AND mk.kelasid = ?
                      ORDER BY mk.lessonname";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $studentid);
            $stmt -> bindValue(2, $kelasid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $nilai = $this ->get_nilai_row($row);
                    $nilais->append($nilai);
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
        return $nilais;
    }
    
    public function insert_nilai($nilai)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO 
                    nilai(uts_ulangan1,uts_ulangan2,uts_ulangan3,uts_ulangan4,uts_ulangan5,
                          uts_quiz1,uts_quiz2,uts_quiz3,uts_quiz4,uts_quiz5,uts,
                          uas_ulangan1,uas_ulangan2,uas_ulangan3,uas_ulangan4,uas_ulangan5,
                          uas_quiz1,uas_quiz2,uas_quiz3,uas_quiz4,uas_quiz5,uas,
                          mapelkelasid,studentid)  
                    VALUES(?,?,?,?,?,
                           ?,?,?,?,?,?,
                           ?,?,?,?,?,
                           ?,?,?,?,?,?,
                           ?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $nilai ->getUts_ulangan1());
            $stmt -> bindValue(2, $nilai ->getUts_ulangan2());
            $stmt -> bindValue(3, $nilai ->getUts_ulangan3());
            $stmt -> bindValue(4, $nilai ->getUts_ulangan4());
            $stmt -> bindValue(5, $nilai ->getUts_ulangan5());
            $stmt -> bindValue(6, $nilai ->getUts_quiz1());
            $stmt -> bindValue(7, $nilai ->getUts_quiz2());
            $stmt -> bindValue(8, $nilai ->getUts_quiz3());
            $stmt -> bindValue(9, $nilai ->getUts_quiz4());
            $stmt -> bindValue(10, $nilai ->getUts_quiz5());
            $stmt -> bindValue(11, $nilai ->getUts());
            $stmt -> bindValue(12, $nilai ->getUas_ulangan1());
            $stmt -> bindValue(13, $nilai ->getUas_ulangan2());
            $stmt -> bindValue(14, $nilai ->getUas_ulangan3());
            $stmt -> bindValue(15, $nilai ->getUas_ulangan4());
            $stmt -> bindValue(16, $nilai ->getUas_ulangan5());
            $stmt -> bindValue(17, $nilai ->getUas_quiz1());
            $stmt -> bindValue(18, $nilai ->getUas_quiz2());
            $stmt -> bindValue(19, $nilai ->getUas_quiz3());
            $stmt -> bindValue(20, $nilai ->getUas_quiz4());
            $stmt -> bindValue(21, $nilai ->getUas_quiz5());
            $stmt -> bindValue(22, $nilai ->getUas());
            $stmt -> bindValue(23, $nilai ->getMapelkelasid());
            $stmt -> bindValue(24, $nilai ->getStudentid());
            
            $result = $stmt -> execute();
            $conn -> commit();
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            $stmt -> rollBack();
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
    
    public function update_nilai($nilai) {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE nilai  
                    SET 
                        uts_ulangan1 = ?,
                        uts_ulangan2 = ?,
                        uts_ulangan3 = ?,
                        uts_ulangan4 = ?,
                        uts_ulangan5 = ?,
                        uts_quiz1 = ?,
                        uts_quiz2 = ?,
                        uts_quiz3 = ?,
                        uts_quiz4 = ?,
                        uts_quiz5 = ?,
                        uts = ?,
                        uas_ulangan1 = ?,
                        uas_ulangan2 = ?,
                        uas_ulangan3 = ?,
                        uas_ulangan4 = ?,
                        uas_ulangan5 = ?,
                        uas_quiz1 = ?,
                        uas_quiz2 = ?,
                        uas_quiz3 = ?,
                        uas_quiz4 = ?,
                        uas_quiz5 = ?,
                        uas = ?
                    WHERE nilaiid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $nilai ->getUts_ulangan1());
            $stmt -> bindValue(2, $nilai ->getUts_ulangan2());
            $stmt -> bindValue(3, $nilai ->getUts_ulangan3());
            $stmt -> bindValue(4, $nilai ->getUts_ulangan4());
            $stmt -> bindValue(5, $nilai ->getUts_ulangan5());
            $stmt -> bindValue(6, $nilai ->getUts_quiz1());
            $stmt -> bindValue(7, $nilai ->getUts_quiz2());
            $stmt -> bindValue(8, $nilai ->getUts_quiz3());
            $stmt -> bindValue(9, $nilai ->getUts_quiz4());
            $stmt -> bindValue(10, $nilai ->getUts_quiz5());
            $stmt -> bindValue(11, $nilai ->getUts());
            $stmt -> bindValue(12, $nilai ->getUas_ulangan1());
            $stmt -> bindValue(13, $nilai ->getUas_ulangan2());
            $stmt -> bindValue(14, $nilai ->getUas_ulangan3());
            $stmt -> bindValue(15, $nilai ->getUas_ulangan4());
            $stmt -> bindValue(16, $nilai ->getUas_ulangan5());
            $stmt -> bindValue(17, $nilai ->getUas_quiz1());
            $stmt -> bindValue(18, $nilai ->getUas_quiz2());
            $stmt -> bindValue(19, $nilai ->getUas_quiz3());
            $stmt -> bindValue(20, $nilai ->getUas_quiz4());
            $stmt -> bindValue(21, $nilai ->getUas_quiz5());
            $stmt -> bindValue(22, $nilai ->getUas());
            $stmt -> bindValue(23, $nilai ->getNilaiid ());
            
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
