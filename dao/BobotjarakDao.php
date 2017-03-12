<?php
include_once 'Bobotjarak.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BobotjarakDao
 *
 * @author Fenita
 */
class BobotjarakDao {
    //put your code here
    public function get_bobotjarak_row($row)
    {
        $bobotjarak = new Bobotjarak();
        $bobotjarak ->setBobotjarakid($row['bobotjarakid']);
        $bobotjarak ->setBatasjarakbawah($row['batasjarakbawah']);
        $bobotjarak ->setBobot($row['bobot']);
        return $bobotjarak;
    }
    
    public function get_bobotjarak()
    {
        $bobotjaraks = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM bobotjarak";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $bobotjarak = $this ->get_bobotjarak_row($row);
                    $bobotjaraks->append($bobotjarak);
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
        return $bobotjaraks;
    }
    
    public function update_bobot($bobot, $bobotjarakid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE bobotjarak  
                    SET 
                        bobot = ?
                    WHERE bobotjarakid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $bobot );
            $stmt -> bindValue(2, $bobotjarakid );
            
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
