<?php
include_once 'Jadwalpelajaran.php';
include_once 'MapelkelasDao.php';
include_once 'SlotjadwalDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JadwalpelajaranDao
 *
 * @author Feechan
 */
class JadwalpelajaranDao {
    //put your code here
    public function get_jadwalpelajaran_row($row)
    {
        $jadwalpelajaran = new Jadwalpelajaran();
        $jadwalpelajaran ->setJadwalpelajaranid($row['jadwalpelajaranid']);
        
        $mapelkelasid = $row['mapelkelasid'];
        $mapelkelasdao = new MapelkelasDao();
        $mapelkelas = $mapelkelasdao ->get_one_mapelkelas($mapelkelasid);
        
        $slotjadwalid = $row['slotjadwalid'];
        $slotjadwaldao = new SlotjadwalDao();
        $slotjadwal = $slotjadwaldao ->get_one_slotjadwal($slotjadwalid);
        
        $jadwalpelajaran ->setMapelkelasid($mapelkelasid);
        $jadwalpelajaran ->setMapelkelas($mapelkelas);
        
        $jadwalpelajaran ->setSlotjadwalid($slotjadwalid);
        $jadwalpelajaran ->setSlotjadwal($slotjadwal);
        
        $jadwalpelajaran ->setHari($row['hari']);
        $jadwalpelajaran ->setCreatedate($row['createdate']);
        
        return $jadwalpelajaran;
    }
    
    public function get_jadwalpelajaran_slotjadwalid_hari($slotjadwalid,$hari)
    {
        $jadwalpelajaran = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM jadwalpelajaran 
                    WHERE slotjadwalid = ? AND hari = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $slotjadwalid);
            $stmt -> bindValue(2, $hari);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $jadwalpelajaran = $this->get_jadwalpelajaran_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $jadwalpelajaran;
    }
    
    public function insert_jadwalpelajaran($jadwalpelajaran)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO jadwalpelajaran(mapelkelasid,slotjadwalid,hari)  
                    VALUES(?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $jadwalpelajaran ->getMapelkelasid());
            $stmt -> bindValue(2, $jadwalpelajaran ->getSlotjadwalid());
            $stmt -> bindValue(3, $jadwalpelajaran ->getHari());
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
    
    public function get_count_by_slotjadwalid($slotjadwalid)
    {
        $result = 0;
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from jadwalpelajaran
                      WHERE slotjadwalid = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $slotjadwalid);
            $stmt -> execute();
            $result = $stmt -> rowCount();
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
        return $result;
    }
    
    public function delete_jadwalpelajaran($slotjadwalid,$hari)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "DELETE FROM jadwalpelajaran
                    WHERE slotjadwalid = ? AND hari = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $slotjadwalid);
            $stmt -> bindValue(2, $hari);
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
