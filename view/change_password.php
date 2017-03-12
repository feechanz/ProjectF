<?php
    function getRoleName($role)
    {
        switch($role)
        {
            case "admin":
                $role = "Admin Pendaftaran";
                break;
            case "beasiswa":
                $role = "Admin Beasiswa";
                break;
            
            case "staff":
                $role = "Tata Usaha";
                break;
            case "teacher":
                $role = "Guru";
                break;
            default:
                $role = "Orang Tua";
        }
        return $role;
    }
    
    
        $userid = $_SESSION['userid'];
        
        $user = $userdao->get_one_userid($userid);
        
    
    
    $message = "";
    
    if(isset($_POST['submit']))
    {
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if($password != $repassword)
        {
            $message = "Password dan Konfirmasi Password harus sama!";
        }
        else if($password == "" || $password == null)
        {
            $message = "Password tidak boleh kosong!";
        }
        else if(md5($oldpassword) != $user->getPassword())
        {
            $message = "Password lama salah!";
        }
        else
        {
            $userdao = new UserDao();
            if($userdao->update_password(md5($password), $userid))
            {
                echo "<script>"
                . "alert('Password berhasil diganti!');"
                . "window.location='index.php?page=change_password';"
                . "</script>";
            }
            else
            {
                echo "<script>alert('Password gagal diganti!');</script>";
            }
        }
        
    }
?>

<style>
    .btn
    {
        margin-left: 2px;
    }
    th,td
    {
        border:2px solid brown;
        text-align: center;
        
    }
    
    th
    {
        background: gray;
        color : white;
        font: bold 12px/30px Georgia, serif;
    }
    form
    {
        text-align: center;
    }
</style>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    <p align="center" style="color:red;">
                        <?php echo $message;?>
                    </p>
                    <h2 class="style" align="center">Ubah Password</h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Email</label></span>
                            <span><?php echo $user->getEmail();?></span>
                       
                            <span><label>Role</label></span>
                            <span><?php echo getRoleName($user->getRole());?></span>
                        </div>
                        <div>
                            <span><label>Password Lama</label></span>
                            <span><input name="oldpassword" type="password" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <span><label>Password Baru</label></span>
                            <span><input name="password" type="password" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <span><label>Konfirmasi Password Baru</label></span>
                            <span><input name="repassword" type="password" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        
                        <div>
                            <div><input type="submit" name="submit" value="Ubah" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
