<?php
include_once 'User.php';

class UserDao {
    public function get_user_row($row)
    {
        $user = new User();
        $user -> setUserid($row['userid']);
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
}
?>