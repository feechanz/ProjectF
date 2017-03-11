<?php

include_once 'Ekskul.php';
include_once 'PeriodeDao.php';
include_once 'TeacherDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EkskulDao
 *
 * @author Fenita
 */
class EkskulDao {
    //put your code here
    public function get_ekskul_row($row)
    {
        $ekskul = new Ekskul();
        $ekskul ->setEkskulid($row['ekskulid']);
        $ekskul ->setNamaekskul($row['namaekskul']);
        $ekskul ->setDeskripsiekskul($row['deskripsiekskul']);
        $ekskul ->setJammulai($row['jammulai']);
        $ekskul ->setJamselesai($row['jamselesai']);
        $ekskul ->setHari($row['hari']);
        
        $periodeid = $row['periodeid'];
        $periodedao = new PeriodeDao();
        $periode = $periodedao ->get_one_periode($periodeid);
        
        $teacherid = $row['teacherid'];
        $teacherdao = new TeacherDao();
        $teacher = $teacherdao ->get_one_teacher($teacherid);
        
        
        
        $ekskul ->setPeriodeid($periodeid);
        $ekskul ->setPeriode($periode);
        
        $ekskul ->setTeacherid($teacherid);
        $ekskul ->setTeacher($teacher);
        return $ekskul;
    }
    
    public function get_one_ekskul($ekskulid)
    {
        $ekskul = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM ekskul 
                    WHERE ekskulid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $ekskulid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $ekskul = $this->get_ekskul_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $ekskul;
    
    }
    
    public function insert_ekskul($ekskul)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO ekskul(namaekskul,deskripsiekskul,jammulai,jamselesai,hari,periodeid,teacherid)  
                    VALUES(?,?,?,?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $ekskul ->getNamaekskul());
            $stmt -> bindValue(2, $ekskul ->getDeskripsiekskul());
            $stmt -> bindValue(3, $ekskul ->getJammulai());
            $stmt -> bindValue(4, $ekskul ->getJamselesai());
            $stmt -> bindValue(5, $ekskul ->getHari());
            $stmt -> bindValue(6, $ekskul ->getPeriodeid());
            $stmt -> bindValue(7, $ekskul ->getTeacherid());
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
    
    public function get_ekskul_periode($periodeid)
    {
        $ekskuls = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM ekskul
                      WHERE periodeid = ?
                      ORDER BY namaekskul";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $periodeid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $ekskul = $this ->get_ekskul_row($row);
                    $ekskuls->append($ekskul);
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
        return $ekskuls;
    }
    
    public function get_ekskul_periode_teacher($periodeid,$teacherid)
    {
        $ekskuls = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM ekskul
                      WHERE periodeid = ? AND teacherid = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $periodeid);
            $stmt -> bindValue(2, $teacherid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $ekskul = $this ->get_ekskul_row($row);
                    $ekskuls->append($ekskul);
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
        return $ekskuls;
    }
    
}
