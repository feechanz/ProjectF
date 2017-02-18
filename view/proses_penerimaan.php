<?php
    
    if(isset($_GET['registrationid']))
    {
        $registrationid = $_GET['registrationid'];
        
        $registration = $registrationdao->get_one_registration($registrationid);
        
        $gender ="Perempuan";
        if($registration->getGender() == "male")
        {
            $gender = "Laki-Laki";
        }
        
        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $tmp = $userdao->get_one_user_email($email);
            
            if(!isset($tmp) || $tmp == null)
            {
                $user = new User();
                $user ->setEmail($email);
                $user ->setPassword(md5($email));
                $user ->setRole("parent");
                
                $userdao = new UserDao();
                $userid = $userdao ->insert_user($user);
                $user->setUserid($userid);
                
                $student = new Student();
                $student ->setRegistrationid($registrationid);
                $student ->setUserid($user ->getUserid());
            
                //insert student
                
                $studentid = $studentdao->insert_student($student);
                $registrationdao->update_status(4, $registrationid);
                echo "<script>window.location='index.php?page=proses_registration_finish'; </script>";
                
                
            }
            else
            {
                $student = new Student();
                $student ->setRegistrationid($registrationid);
                $student ->setUserid($tmp->getUserid());
                
                //insert student
                $studentdao = new StudentDao();
                
                $studentid = $studentdao->insert_student($student);
                $registrationdao->update_status(4, $registrationid);
                echo "<script>window.location='index.php?page=proses_registration_finish'; </script>";
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
    input
    {
        text-align: center;
    }
</style>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    
                    <h2 class="style" align="center">Siswa Baru</h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Nama Lengkap</label></span>
                            <span><?php echo $registration->getFullname();?></span>
                       
                            <span><label>Jenis Kelamin</label></span>
                            <span><?php echo $gender;?></span>
                        </div>
                        <div>
                            <span><label>Tanggal Lahir</label></span>
                            <span><?php echo $registration->getBirthdate();?></span>
                        </div>
                        <div>
                            <span><label>Disabilitas</label></span>
                            <span><?php echo $registration->getDisability();?></span>
                        </div>
                        <div>
                            <span><label>Email Untuk User (Password default = email)</label></span>
                            <span><input name="email" type="text" class="textbox" required value="<?php echo $registration->getEmail(); ?>"></span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Selesai" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
