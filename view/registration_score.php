<?php

    if(isset($_GET['registrationid']))
    {
        $registrationid = $_GET['registrationid'];
        $registration = $registrationdao->get_one_registration($registrationid);
        
        if(isset($_POST['submit']))
        {
            $registrationscore = $_POST['registrationscore'];
            $pass = $_POST['pass'];
            
            $registrationdao ->update_score($registrationscore, $registrationid);
            if($pass == 1)
            {
               echo "<script>window.location='function/pass_registration.php?registrationid=".$registrationid."'; </script>";
            }
            else
            {
                echo "<script>window.location='function/fail_registration.php?registrationid=".$registrationid."'; </script>";
            }
        }
    }
?>
<style>
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
                    <h2 class="style" align="center">Masukkan Nilai Seleksi <?php echo $registration->getFullname();?></h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>Nilai Seleksi</label></span>
                            <span><input name="registrationscore" value="<?php echo $registration->getRegistrationscore(); ?>" type="number" class="textbox" required style=" text-align: center;" width="10%" min = 0 max = 100></span>
                        </div>
                        <div>
                            <div>
                            <span><label>Status Lulus / Tidak Lulus</label></span>
                            <span>
                                <select name="pass">
                                    <option value="1">Lulus</option>
                                    <option value="0">Tidak Lulus</option>
                                </select>
                            </span>
                        </div>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Simpan Nilai" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>