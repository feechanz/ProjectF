<?php
include_once 'Registration.php';

class RegistrationDao {
    
    public function get_registration_row($row)
    {
        $registration = new Registration();
        
    }
    
    public function insert_registration($registration)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO registration(fullname,gender,birthplace,birthdate,religion,disability,
                        address,transport,stay,phone,email,fathername,fatherbirthyear,fatherjob,fatherschool,
                        fathermontly,mothername,motherbirthyear,motherjob,motherschool,mothermontly,height,
                        weight,distanceschool,timeschool,brothercount)  
                    VALUES(?,?,?,?,?,?
                           ,?,?,?,?,?,?,?,?,?
                           ,?,?,?,?,?,?,?
                           ,?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $registration ->getFullname());
            $stmt -> bindValue(2, $registration ->getGender());
            $stmt -> bindValue (3, $registration ->getBirthplace());
            $stmt -> bindValue(4, $registration ->getBirthdate());
            $stmt -> bindValue(5, $registration ->getReligion());
            $stmt -> bindValue(6, $registration ->getDisability());

            $stmt -> bindValue(7, $registration ->getAddress());
            $stmt -> bindValue(8, $registration ->getTransport());
            $stmt -> bindValue(9, $registration ->getStay());
            $stmt -> bindValue(10, $registration ->getPhone());
            $stmt -> bindValue(11, $registration ->getEmail());
            $stmt -> bindValue(12, $registration ->getFathername());
            $stmt -> bindValue(13, $registration ->getFatherbirthyear());
            $stmt -> bindValue(14, $registration ->getFatherjob());
            $stmt -> bindValue(15, $registration ->getFatherschool());
            
            $stmt -> bindValue(16, $registration ->getFathermontly());
            $stmt -> bindValue(17, $registration ->getMothername());
            $stmt -> bindValue(18, $registration ->getMotherbirthyear());
            $stmt -> bindValue(19, $registration ->getMotherjob());
            $stmt -> bindValue(20, $registration ->getMotherschool());
            $stmt -> bindValue(21, $registration ->getMothermontly());
            $stmt -> bindValue(22, $registration ->getHeight());
            
            $stmt -> bindValue(23, $registration ->getWeight());
            $stmt -> bindValue(24, $registration ->getDistanceschool());
            $stmt -> bindValue(25, $registration ->getTimeschool());
            $stmt -> bindValue(26, $registration ->getBrothercount());
            
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
}
?>