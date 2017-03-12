<?php
include_once 'Bobotnilai.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BobotnilaiDao
 *
 * @author Fenita
 */
class BobotnilaiDao {
    //put your code here
    public function get_bobotnilai_row($row)
    {
        $bobotnilai = new Bobotnilai();
        $bobotnilai ->setBobotnilaiid($row['bobotnilaiid']);
        $bobotnilai ->setBatasnilaiatas($row['batasnilaiatas']);
        $bobotnilai ->setBobot($row['bobot']);
        return $bobotnilai;
    }
    
    public function get_bobotnilai()
    {
        $bobotnilais = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM bobotnilai";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $bobotnilai = $this ->get_bobotnilai_row($row);
                    $bobotnilais->append($bobotnilai);
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
        return $bobotnilais;
    }
    
    public function update_bobot($bobot, $bobotnilaiid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE bobotnilai  
                    SET 
                        bobot = ?
                    WHERE bobotnilaiid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $bobot );
            $stmt -> bindValue(2, $bobotnilaiid );
            
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
