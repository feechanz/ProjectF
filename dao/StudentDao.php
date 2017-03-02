<?php
include_once 'Student.php';
include_once 'RegistrationDao.php';
include_once 'UserDao.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StudentDao
 *
 * @author Feechan
 */
class StudentDao {
    
    public function get_student_row($row)
    {
        $student = new Student();
        $student ->setStudentid($row['studentid']);
        
        $registrationid = $row['registrationid'];
        $registrationdao = new RegistrationDao();
        $registration = $registrationdao->get_one_registration($registrationid);
        
        $student ->setRegistrationid($registrationid);
        $student ->setRegistration($registration);
        
        $userid = $row['userid'];
        $userdao = new UserDao();
        $user = $userdao->get_one_userid($userid);
        
        $student ->setUserid($userid);
        $student ->setUser($user);
        
        $student ->setStatus($row['status']);
        $student ->setCreatedate($row['createdate']);
        
        if(isset($row['classlevel']))
        {
            $student ->setNamakelas($row['classlevel'].$row['namakelas']);
        }
        
        return $student;
    }
    //put your code here
    public function get_one_student($studentid)
    {
        $student = null;
        try {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM student 
                    WHERE studentid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $studentid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0) 
            {
                while ($row = $stmt -> fetch()) 
                {
                    $student = $this->get_student_row($row);
                }
            }
            
        } catch (PDOException $e) {
            echo $e -> getMessage();
            die();
        }
        $conn = null;
        return $student;
    }
    
    public function get_student_kelasid($kelasid)
    {
        $students = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * 
                      FROM student
                      WHERE studentid IN
                        (SELECT studentid
                         FROM studentkelas
                         WHERE kelasid = ?)";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $kelasid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $student = $this ->get_student_row($row);
                    $students->append($student);
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
        return $students;
    }
    
    public function get_childrens($userid)
    {
        $students = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * 
                      FROM student
                      WHERE userid = ?";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $userid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $student = $this ->get_student_row($row);
                    $students->append($student);
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
        return $students;
    }
    
    public function get_class_student($classlevel)
    {
        $students = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT s.studentid as studentid, s.registrationid as registrationid, s.userid as userid, s.status as status, s.createdate as createdate, COALESCE(MAX(classlevel),0) as kelas , k.classlevel as classlevel, k.namakelas as namakelas
                      FROM `studentkelas` sk 
                      RIGHT JOIN `student` s
                      ON s.studentid = sk.studentid
                      LEFT JOIN `kelas` k 
                      ON k.kelasid = sk.kelasid
                      GROUP BY s.studentid, s.registrationid, s.userid, s.status, s.createdate, k.classlevel, k.namakelas
                      HAVING COALESCE(MAX(classlevel),0) = ?
                      ORDER BY COALESCE(MAX(classlevel),0),k.namakelas";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $classlevel);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $student = $this ->get_student_row($row);
                    $students->append($student);
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
        return $students;
    }
    
    public function get_class_mapelkelasid($mapelkelasid)
    {
        $students = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * 
                     FROM student
                     WHERE studentid IN
                     (SELECT studentid
                      FROM studentkelas
                      WHERE kelasid IN
                        (SELECT kelasid
                         FROM mapelkelas
                         WHERE mapelkelasid = ?))";
            $stmt = $conn -> prepare($query);
            $stmt -> bindValue(1, $mapelkelasid);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $student = $this ->get_student_row($row);
                    $students->append($student);
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
        return $students;
    }
    
    public function insert_student($student)
    {
        $result = 0;
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "INSERT INTO student(registrationid,userid)  
                    VALUES(?,?)";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);
            $stmt -> bindValue(1, $student ->getRegistrationid());
            $stmt -> bindValue(2, $student ->getUserid());
            
            $stmt -> execute();
            $result = $conn ->lastInsertId();
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
    
    public function update_status($status, $studentid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE student  
                    SET 
                        status = ?
                    WHERE studentid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $status );
            $stmt -> bindValue(2, $studentid );
            
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
