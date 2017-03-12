<?php
include_once 'Nilaiekskul.php';
include_once 'StudentDao.php';
include_once 'EkskulDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NilaiekskulDao
 *
 * @author Fenita
 */
class NilaiekskulDao {
    //put your code here
    public function get_nilaiekskul_row($row)
    {
        $nilaiekskul = new Nilaiekskul();
        $nilaiekskul ->setNilaiekskulid($row['nilaiekskulid']);
        $nilaiekskul ->setNilaimutu($row['nilaimutu']);
        $studentid = $row['studentid'];
        $studentdao = new StudentDao();
        $student = $studentdao->get_one_student($studentid);
        
        $ekskulid = $row['ekskulid'];
        $ekskuldao = new EkskulDao();
        $ekskul = $ekskuldao ->get_one_ekskul($ekskulid);
        
        $nilaiekskul ->setStudentid($studentid);
        $nilaiekskul ->setStudent($student);
        $nilaiekskul ->setEkskulid($ekskulid);
        $nilaiekskul ->setEkskul($ekskul);
        return $nilaiekskul;
    }
    
    public function get_one_nilaiekskul($nilaiekskulid)
    {
        $nilaiekskul = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM nilaiekskul 
                    WHERE nilaiekskulid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $nilaiekskulid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $nilaiekskul = $this->get_nilaiekskul_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $nilaiekskul;
    }
    
    public function get_nilaiekskul_ekskulid_studentid($ekskulid, $studentid)
    {
        $nilaiekskul = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM nilaiekskul 
                    WHERE ekskulid = ? AND studentid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $ekskulid);
            $stmt -> bindValue(2, $studentid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $nilaiekskul = $this->get_nilaiekskul_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $nilaiekskul;
    }
    
    public function update_nilaiekskul($nilaimutu, $nilaiekskulid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE nilaiekskul  
                    SET 
                        nilaimutu = ?
                    WHERE nilaiekskulid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $nilaimutu );
            $stmt -> bindValue(2, $nilaiekskulid );
            
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
    
    public function get_nilaiekskul_ekskulid($ekskulid)
    {
        $nilaiekskuls = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM nilaiekskul
                      WHERE ekskulid = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $ekskulid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $nilaiekskul = $this ->get_nilaiekskul_row($row);
                    $nilaiekskuls->append($nilaiekskul);
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
        return $nilaiekskuls;
    }
    
    
    public function get_nilaiekskul_studentid($studentid)
    {
        $nilaiekskuls = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM nilaiekskul
                      WHERE studentid = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $studentid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $nilaiekskul = $this ->get_nilaiekskul_row($row);
                    $nilaiekskuls->append($nilaiekskul);
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
        return $nilaiekskuls;
    }
    
    public function get_nilaiekskul_student_periodeid($periodeid,$studentid)
    {
        $nilaiekskuls = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM nilaiekskul
                      WHERE studentid = ? AND ekskulid IN
                        (SELECT ekskulid
                         FROM ekskul
                         WHERE periodeid = ?)";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $studentid);
            $stmt -> bindValue(2, $periodeid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $nilaiekskul = $this ->get_nilaiekskul_row($row);
                    $nilaiekskuls->append($nilaiekskul);
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
        return $nilaiekskuls;
    }
    
    public function insert_nilaiekskul($nilaiekskul)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO nilaiekskul(studentid,ekskulid,nilaimutu)  
                    VALUES(?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $nilaiekskul ->getStudentid());
            $stmt -> bindValue(2, $nilaiekskul ->getEkskulid());
            $stmt -> bindValue(3, $nilaiekskul ->getNilaimutu());
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
