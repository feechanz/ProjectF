<?php
include_once 'Registration.php';

class RegistrationDao {
    
    public function get_registration_row($row)
    {
        $registration = new Registration();
        
        $registration ->setRegistrationid($row['registrationid']);//1
        $registration ->setFullname($row['fullname']);//2
        $registration ->setGender($row['gender']);//3
        $registration ->setNisn($row['nisn']);
        $registration ->setStartschool($row['startschool']);//4
        $registration ->setBirthplace($row['birthplace']);//5
        $registration ->setBirthdate($row['birthdate']);//6
        $registration ->setReligion($row['religion']);//7
        $registration ->setDisability($row['disability']);//8
        $registration ->setAddress($row['address']);//9
        $registration ->setTransport($row['transport']);//10
        $registration ->setStay($row['stay']);//11
        $registration ->setPhone($row['phone']);//12
        $registration ->setEmail($row['email']);//13
        $registration ->setFathername($row['fathername']);//14
        $registration ->setFatherbirthyear($row['fatherbirthyear']);//15
        $registration ->setFatherjob($row['fatherjob']);//16
        $registration ->setFatherschool($row['fatherschool']);//17
        $registration ->setFathermontly($row['fathermontly']);//18
        $registration ->setMothername($row['mothername']);//19
        $registration ->setMotherbirthyear($row['motherbirthyear']);//20
        $registration ->setMotherjob($row['motherjob']);//21
        $registration ->setMotherschool($row['motherschool']);//22
        $registration ->setMothermontly($row['mothermontly']);//23
        $registration ->setHeight($row['height']);//24
        $registration ->setWeight($row['weight']);//25
        $registration ->setDistanceschool($row['distanceschool']);//26
        $registration ->setTimeschool($row['timeschool']);//27
        $registration ->setBrothercount($row['brothercount']);//28
        $registration ->setReadingscore($row['readingscore']);
        $registration ->setWritingscore($row['writingscore']);
        $registration ->setMathscore($row['mathscore']);
        $registration ->setRegistrationdate($row['registrationdate']);//29
        $registration ->setStatus($row['status']);//30
        return $registration;
    }
    public function get_one_registration($registrationid)
    {
        $registration = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM registration 
                    WHERE registrationid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $registrationid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $registration = $this->get_registration_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $registration;
    }
    
    public function get_accepted_registration()
    {
        $registrations = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from registration
                      WHERE status = 2";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $registration = $this ->get_registration_row($row);
                    $registrations->append($registration);
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
        return $registrations;
    }
    
    public function get_pending_registration()
    {
        $registrations = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from registration
                      WHERE status = 1";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $registration = $this ->get_registration_row($row);
                    $registrations->append($registration);
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
        return $registrations;
    }
    public function get_rejected_registration()
    {
        $registrations = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from registration
                      WHERE status = 0";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $registration = $this ->get_registration_row($row);
                    $registrations->append($registration);
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
        return $registrations;
    }
    
    public function get_pass_registration()
    {
        $registrations = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from registration
                      WHERE status = 3";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $registration = $this ->get_registration_row($row);
                    $registrations->append($registration);
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
        return $registrations;
    }
    
    public function insert_registration($registration)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO registration(fullname,gender,nisn,startschool,birthplace,birthdate,religion,disability,
                        address,transport,stay,phone,email,fathername,fatherbirthyear,fatherjob,fatherschool,
                        fathermontly,mothername,motherbirthyear,motherjob,motherschool,mothermontly,height,
                        weight,distanceschool,timeschool,brothercount)  
                    VALUES(?,?,?,?,?,?,?,?
                           ,?,?,?,?,?,?,?,?,?
                           ,?,?,?,?,?,?,?
                           ,?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $registration ->getFullname());
            $stmt -> bindValue(2, $registration ->getGender());
            $stmt -> bindValue(3, $registration ->getNisn());
            $stmt -> bindValue(4, $registration ->getStartschool());
            $stmt -> bindValue(5, $registration ->getBirthplace());
            $stmt -> bindValue(6, $registration ->getBirthdate());
            $stmt -> bindValue(7, $registration ->getReligion());
            $stmt -> bindValue(8, $registration ->getDisability());

            $stmt -> bindValue(9, $registration ->getAddress());
            $stmt -> bindValue(10, $registration ->getTransport());
            $stmt -> bindValue(11, $registration ->getStay());
            $stmt -> bindValue(12, $registration ->getPhone());
            $stmt -> bindValue(13, $registration ->getEmail());
            $stmt -> bindValue(14, $registration ->getFathername());
            $stmt -> bindValue(15, $registration ->getFatherbirthyear());
            $stmt -> bindValue(16, $registration ->getFatherjob());
            $stmt -> bindValue(17, $registration ->getFatherschool());
            
            $stmt -> bindValue(18, $registration ->getFathermontly());
            $stmt -> bindValue(19, $registration ->getMothername());
            $stmt -> bindValue(20, $registration ->getMotherbirthyear());
            $stmt -> bindValue(21, $registration ->getMotherjob());
            $stmt -> bindValue(22, $registration ->getMotherschool());
            $stmt -> bindValue(23, $registration ->getMothermontly());
            $stmt -> bindValue(24, $registration ->getHeight());
            
            $stmt -> bindValue(25, $registration ->getWeight());
            $stmt -> bindValue(26, $registration ->getDistanceschool());
            $stmt -> bindValue(27, $registration ->getTimeschool());
            $stmt -> bindValue(28, $registration ->getBrothercount());
            
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
    public function update_status($status,$registrationid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE registration  
                    SET status = ?
                    WHERE registrationid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $status);
            $stmt -> bindValue(2, $registrationid);
            
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
    
    public function update_score($readingscore, $writingscore, $mathscore, $registrationid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE registration  
                    SET readingscore = ?,
                        writingscore = ?,
                        mathscore = ?
                    WHERE registrationid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $readingscore);
            $stmt -> bindValue(2, $writingscore);
            $stmt -> bindValue(3, $mathscore);
            $stmt -> bindValue(4, $registrationid);
            
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
    
    public function update_registration($registration) {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE registration  
                    SET fullname = ?, 
                        gender = ?, 
                        nisn = ?,
                        startschool = ?,
                        birthplace = ?,
                        birthdate = ?,
                        religion = ?,
                        disability = ?,
                        address = ?,
                        transport = ?,
                        stay = ?,
                        phone = ?,
                        email = ?,
                        fathername = ?,
                        fatherbirthyear = ?,
                        fatherjob = ?,
                        fatherschool = ?,
                        fathermontly = ?,
                        mothername = ?,
                        motherbirthyear = ?,
                        motherjob = ?,
                        motherschool = ?,
                        mothermontly = ?,
                        height = ?,
                        weight = ?,
                        distanceschool = ?,
                        timeschool = ?,
                        brothercount = ?
                    WHERE registrationid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $registration ->getFullname());
            $stmt -> bindValue(2, $registration ->getGender());
            $stmt -> bindValue(3, $registration ->getNisn());
            $stmt -> bindValue(4, $registration ->getStartschool());
            $stmt -> bindValue(5, $registration ->getBirthplace());
            $stmt -> bindValue(6, $registration ->getBirthdate());
            $stmt -> bindValue(7, $registration ->getReligion());
            $stmt -> bindValue(8, $registration ->getDisability());

            $stmt -> bindValue(9, $registration ->getAddress());
            $stmt -> bindValue(10, $registration ->getTransport());
            $stmt -> bindValue(11, $registration ->getStay());
            $stmt -> bindValue(12, $registration ->getPhone());
            $stmt -> bindValue(13, $registration ->getEmail());
            $stmt -> bindValue(14, $registration ->getFathername());
            $stmt -> bindValue(15, $registration ->getFatherbirthyear());
            $stmt -> bindValue(16, $registration ->getFatherjob());
            $stmt -> bindValue(17, $registration ->getFatherschool());
            
            $stmt -> bindValue(18, $registration ->getFathermontly());
            $stmt -> bindValue(19, $registration ->getMothername());
            $stmt -> bindValue(20, $registration ->getMotherbirthyear());
            $stmt -> bindValue(21, $registration ->getMotherjob());
            $stmt -> bindValue(22, $registration ->getMotherschool());
            $stmt -> bindValue(23, $registration ->getMothermontly());
            $stmt -> bindValue(24, $registration ->getHeight());
            
            $stmt -> bindValue(25, $registration ->getWeight());
            $stmt -> bindValue(26, $registration ->getDistanceschool());
            $stmt -> bindValue(27, $registration ->getTimeschool());
            $stmt -> bindValue(28, $registration ->getBrothercount());
            $stmt -> bindValue(29, $registration ->getRegistrationid());
            
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