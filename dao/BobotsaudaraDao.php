<?php
include_once 'Bobotsaudara.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BobotsaudaraDao
 *
 * @author Fenita
 */
class BobotsaudaraDao {
    //put your code here
    public function get_bobotsaudara_row($row)
    {
        $bobotsaudara = new Bobotsaudara();
        $bobotsaudara ->setBobotsaudaraid($row['bobotsaudaraid']);
        $bobotsaudara ->setBatasjumlahbawah($row['batasjumlahbawah']);
        $bobotsaudara ->setBobot($row['bobot']);
        return $bobotsaudara;
    }
    
    public function get_bobotsaudara()
    {
        $bobotsaudaras = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM bobotsaudara";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $bobotsaudara = $this ->get_bobotsaudara_row($row);
                    $bobotsaudaras->append($bobotsaudara);
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
        return $bobotsaudaras;
    }
    
    public function update_bobot($bobot, $bobotsaudaraid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE bobotsaudara  
                    SET 
                        bobot = ?
                    WHERE bobotsaudaraid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $bobot );
            $stmt -> bindValue(2, $bobotsaudaraid );
            
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
