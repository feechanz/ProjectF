<?php

    $message="";
    if(isset($_POST['login']))
    {	
        $email = $_POST['email'];
        $password = $_POST['password'];
      
        $user = $userdao->get_one_user($email, md5($password));
        if( isset($user) )
        {
            $_SESSION['isLogin'] = true;
            $_SESSION['role'] = $user -> getRole();
            echo "<script>window.location='index.php?page=home'; </script>";
            
        }
        else
        {
            $message = "Invalid email or password!";
        }
    }
    

?>
<h1 align="center"><div class="col span_2_of_4">
    <div class="login-form">
        <h2 class="style">Login</h2>
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