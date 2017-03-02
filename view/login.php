<?php

    $message="";
    if(isset($_POST['login']))
    {	
        $email = $_POST['email'];
        $password = $_POST['password'];
      
        $user = $userdao->get_one_user($email, md5($password));
        if( isset($user) )
        {
            
            $_SESSION['status'] = $user -> getStatus();
            if($_SESSION['status'] == 1)
            {
                $_SESSION['isLogin'] = true;
                $_SESSION['role'] = $user -> getRole();
                $_SESSION['userid'] = $user -> getUserid();
                if($_SESSION['role']=="teacher")
                {
                    $userid = $user -> getUserid();
                    $teacher = $teacherdao -> get_one_teacher_user($userid);
                    $_SESSION['teacherid'] = $teacher -> getTeacherid();
                    $_SESSION['fullname'] = $teacher -> getFullname();
                }
                echo "<script>window.location='index.php?page=home'; </script>";
            }
            else
            {
                $message = "Pengguna sudah tidak aktif, mohon hubungi Tata Usaha!";
            }
            
        }
        else
        {
            $message = "Email atau password salah!";
        }
    }
    

?>
<h1 align="center"><div class="col span_2_of_4">
    <div class="login-form">
        <p style="color:red;">
           <?php echo $message;?>
        </p>
        <form method="post" action="">
            
            <div>
                <span><label>E-MAIL</label></span>
                <span><input name="email" type="text" placeholder="Email"></span>
            </div>
            <div>
                <span><label>Password</label></span>
                <span><input name="password" type="password" placeholder="Password"></span>
            </div>

            <div>
                <span><input type="submit" name="login" value="Login"></span>
            </div>
        </form>
      </div>
    </div>	
</h1>