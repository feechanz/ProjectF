<?php
include_once 'Bobotgaji.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BobotgajiDao
 *
 * @author Fenita
 */
class BobotgajiDao {
    //put your code here
    public function get_bobotgaji_row($row)
    {
        $bobotgaji = new Bobotgaji();
        $bobotgaji ->setBobotgajiid($row['bobotgajiid']);
        $bobotgaji ->setBatasgajibawah($row['batasgajibawah']);
        $bobotgaji ->setBobot($row['bobot']);
        return $bobotgaji;
    }
    
    public function get_bobotgaji()
    {
        $bobotgajis = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM bobotgaji";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $bobotgaji = $this ->get_bobotgaji_row($row);
                    $bobotgajis->append($bobotgaji);
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
        return $bobotgajis;
    }
    
    public function update_bobot($bobot, $bobotgajiid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE bobotgaji  
                    SET 
                        bobot = ?
                    WHERE bobotgajiid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $bobot );
            $stmt -> bindValue(2, $bobotgajiid );
            
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
