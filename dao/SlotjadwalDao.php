<?php
include_once 'Slotjadwal.php';
include_once 'KelasDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SlotjadwalDao
 *
 * @author Feechan
 */
class SlotjadwalDao {
    //put your code here
    public function get_slotjadwal_row($row)
    {
        $slotjadwal = new Slotjadwal();
        $slotjadwal ->setSlotjadwalid($row['slotjadwalid']);
        $slotjadwal ->setAwal($row['awal']);
        $slotjadwal ->setAkhir($row['akhir']);
        
        $kelasid = $row['kelasid'];
        $kelasdao = new KelasDao();
        $kelas = $kelasdao ->get_one_kelasid($kelasid);
        
        $slotjadwal ->setKelasid($kelasid);
        $slotjadwal ->setKelas($kelas);
        return $slotjadwal;
    }
    
    public function get_slotjadwal_by_kelasid($kelasid)
    {
        $slotjadwals = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from slotjadwal
                      WHERE kelasid = ?
                      ORDER BY awal";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $kelasid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $slotjadwal = $this ->get_slotjadwal_row($row);
                    $slotjadwals->append($slotjadwal);
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
        return $slotjadwals;
    }
    
    public function insert_slotjadwal($slotjadwal)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO slotjadwal(awal,akhir,kelasid)  
                    VALUES(?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $slotjadwal ->getAwal());
            $stmt -> bindValue(2, $slotjadwal ->getAkhir());
            $stmt -> bindValue(3, $slotjadwal ->getKelasid());
            
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
    
    public function delete_slotjadwal($slotjadwalid)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "DELETE FROM slotjadwal
                    WHERE slotjadwalid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $slotjadwalid);
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
    
    public function get_one_slotjadwal($slotjadwalid)
    {
        $slotjadwal = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM slotjadwal 
                    WHERE slotjadwalid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $slotjadwalid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $slotjadwal = $this->get_slotjadwal_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $slotjadwal;
    }
}
