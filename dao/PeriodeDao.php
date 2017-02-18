<?php
include_once 'Periode.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PeriodeDao
 *
 * @author Feechan
 */
class PeriodeDao
{
    //put your code here
    public function get_periode_row($row)
    {
        $periode = new Periode();
        $periode ->setPeriodeid($row['periodeid']);
        $periode ->setPeriodename($row['periodename']);
        $periode ->setStatus($row['status']);
        $periode ->setDatecreated($row['datecreated']);
        
        return $periode;
    }
    
    public function get_one_periode($periodeid)
    {
        $periode = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM periode 
                    WHERE periodeid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $periodeid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $periode = $this->get_periode_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $periode;
    }
    
    public function get_active_periode()
    {
        $periodes = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from periode
                      WHERE status = 1
                      ORDER BY periodename DESC";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $periode = $this ->get_periode_row($row);
                    $periodes->append($periode);
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
        return $periodes;
    }
    
    public function insert_periode($periode)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO periode(periodename)  
                    VALUES(?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $periode ->getPeriodename());
            
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
    
    public function update_status($status, $periodeid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE periode  
                    SET 
                        status = ?
                    WHERE periodeid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $status );
            $stmt -> bindValue(2, $periodeid );
            
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


?>