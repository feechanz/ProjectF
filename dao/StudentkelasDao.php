<?php
include_once 'Studentkelas.php';
include_once 'StudentDao.php';
include_once 'KelasDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StudentkelasDao
 *
 * @author Fenita
 */
class StudentkelasDao {
    //put your code here
    public function get_studentkelas_row($row)
    {
        $studentkelas = new Studentkelas();
        $studentkelas ->setStudentkelasid($row['studentkelasid']);
        $studentkelas ->setSakit($row['sakit']);
        $studentkelas ->setIzin($row['izin']);
        $studentkelas ->setTanpaketerangan($row['tanpaketerangan']);
        
        $studentid = $row['studentid'];
        $studentdao = new StudentDao();
        $student = $studentdao->get_one_student($studentid);
        
        $studentkelas ->setStudentid($studentid);
        $studentkelas ->setStudent($student);
        
        $kelasid = $row['kelasid'];
        $kelasdao = new KelasDao();
        $kelas = $kelasdao->get_one_kelasid($kelasid);
        
        $studentkelas ->setKelasid($kelasid);
        $studentkelas ->setKelas($kelas);
        
        $studentkelas ->setCreatedate($row['createdate']);
        
        return $studentkelas;
    }
    
    
    public function get_one_studentkelas($studentid,$kelasid)
    {
        $studentkelas = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM studentkelas 
                    WHERE studentid = ? AND kelasid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $studentid);
            $stmt -> bindValue(2, $kelasid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $studentkelas = $this->get_studentkelas_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $studentkelas;
    }
    
    public function update_studentkelas($studentkelas)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE studentkelas  
                    SET 
                        sakit = ?,izin = ?,tanpaketerangan = ?
                    WHERE studentkelasid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $studentkelas ->getSakit());
            $stmt -> bindValue(2, $studentkelas ->getIzin());
            $stmt -> bindValue(3, $studentkelas ->getTanpaketerangan());
            $stmt -> bindValue(4, $studentkelas ->getStudentkelasid());
            
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
