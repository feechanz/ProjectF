<?php
include_once 'Teacher.php';

class TeacherDao {
    public function get_teacher_row($row)
    {
        $teacher = new Teacher();
        $teacher ->setTeacherid($row['teacherid']);
        $teacher ->setNip($row['nip']);
        $teacher ->setFullname($row['fullname']);
        $teacher ->setGender($row['gender']);
        $teacher ->setPhone($row['phone']);
        $teacher ->setEmail($row['email']);
        $teacher ->setHiredate($row['hiredate']);
        $teacher ->setStatus($row['status']);
        return $teacher;
    }
    
    public function get_one_teacher($teacherid)
    {
        $teacher = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM teacher 
                    WHERE teacherid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $teacherid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $teacher = $this->get_teacher_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $teacher;
    }
    
    public function get_active_teacher()
    {
        $teachers = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from teacher
                      WHERE status = 1
                      ORDER BY fullname";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $teacher = $this ->get_teacher_row($row);
                    $teachers->append($teacher);
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
        return $teachers;
    }
    
    public function insert_teacher($teacher)
    {
        $result = FALSE;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO teacher(nip,fullname,gender,phone,email)  
                    VALUES(?,?,?,?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $teacher ->getNip());
            $stmt -> bindValue(2, $teacher ->getFullname());
            $stmt -> bindValue(3, $teacher ->getGender());
            $stmt -> bindValue(4, $teacher ->getPhone());
            $stmt -> bindValue(5, $teacher ->getEmail());
            
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
    
    public function update_teacher($teacher)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE teacher  
                    SET 
                        nip = ?,
                        fullname = ?,
                        gender = ?,
                        phone = ?,
                        email = ?
                    WHERE teacherid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $teacher ->getNip());
            $stmt -> bindValue(2, $teacher ->getFullname());
            $stmt -> bindValue(3, $teacher ->getGender());
            $stmt -> bindValue(4, $teacher ->getPhone());
            $stmt -> bindValue(5, $teacher ->getEmail());
            $stmt -> bindValue(6, $teacher ->getTeacherid());
            
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
    
    public function update_status($status, $teacherid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE teacher  
                    SET 
                        status = ?
                    WHERE teacherid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $status );
            $stmt -> bindValue(2, $teacherid );
            
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