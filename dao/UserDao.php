<?php
include_once 'User.php';

class UserDao {
    public function get_user_row($row)
    {
        $user = new User();
        $user -> setUserid($row['userid']);
        $user -> setEmail($row['email']);
        $user -> setPassword($row['password']);
        $user -> setRole($row['role']);
        $user -> setStatus($row['status']);
        return $user;
    }


    public function get_one_user($email,$password)
    {
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM user 
            WHERE email = ? AND password = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(1, $email);
            $stmt -> bindParam(2, $password);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0)
            {
                while ($row = $stmt -> fetch())
                {
                   $user = $this -> get_user_row($row);
                }
            }
            else
            {
                $user = NULL;
            }
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            die();
        }
        $conn = null;

        return $user;
    }
    public function get_one_userid($userid)
    {
        try
        {
            $conn = Koneksi::get_connection();
            $sql = "SELECT * FROM user 
            WHERE userid = ?";
            $stmt = $conn -> prepare($sql);
            $stmt -> bindParam(1, $userid);
            $result = $stmt -> execute();
            if ($stmt -> rowCount() > 0)
            {
                while ($row = $stmt -> fetch())
                {
                   $user = $this -> get_user_row($row);
                }
            }
            else
            {
                $user = NULL;
            }
        }
        catch (PDOException $e)
        {
            echo $e -> getMessage();
            die();
        }
        $conn = null;

        return $user;
    }
    public function get_user()
    {
        $users = new ArrayObject();
        try 
        {
            $conn = Koneksi::get_connection();
            $query = "SELECT * from user
                      ORDER BY role,status";
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            if ($stmt -> rowCount() > 0) {
                while ($row = $stmt -> fetch()) {
                    $user = $this ->get_user_row($row);
                    $users->append($user);
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
        return $users;
    }
    
    public function update_password($password, $userid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE user  
                    SET 
                        password = ?
                    WHERE userid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $password );
            $stmt -> bindValue(2, $userid );
            
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
    
    public function update_status($status, $userid)
    {
        $result = FALSE;
        try {
            $conn = Koneksi::get_connection();
            $sql = "UPDATE user  
                    SET 
                        status = ?
                    WHERE userid = ?";
            $conn -> beginTransaction();
            $stmt = $conn -> prepare($sql);

            $stmt -> bindValue(1, $status );
            $stmt -> bindValue(2, $userid );
            
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