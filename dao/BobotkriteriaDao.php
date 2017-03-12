<?php

include_once 'Bobotkriteria.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BobotkriteriaDao
 *
 * @author Fenita
 */
class BobotkriteriaDao {
    //put your code here
    public function get_bobotkriteria_row($row)
    {
        $bobotkriteria = new Bobotkriteria();
        $bobotkriteria->setBobotkriteriaid($row['bobotkriteriaid']);
        $bobotkriteria->setIdkriteria($row['idkriteria']);
        $bobotkriteria->setNamakriteria($row['namakriteria']);
        $bobotkriteria->setBobot($row['bobot']);
        return $bobotkriteria;
    }
    
    public function get_bobotkriteria()
    {
        $bobotkriterias = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT *
                      FROM bobotkriteria";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $bobotkriteria = $this ->get_bobotkriteria_row($row);
                    $bobotkriterias->append($bobotkriteria);
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
        return $bobotkriterias;
    }
    
    public function update_bobot($bobot, $bobotkriteriaid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE bobotkriteria  
                    SET 
                        bobot = ?
                    WHERE bobotkriteriaid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $bobot );
            $stmt -> bindValue(2, $bobotkriteriaid );
            
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
