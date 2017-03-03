<?php

    if(isset($_GET['registrationid']))
    {
        $registrationid = $_GET['registrationid'];
        $registration = $registrationdao->get_one_registration($registrationid);
        
        if(isset($_POST['submit']))
        {
            $readingscore = $_POST['readingscore'];
            $writingscore = $_POST['writingscore'];
            $mathscore = $_POST['mathscore'];
            $pass = $_POST['pass'];
            
            if($registrationdao ->update_score($readingscore, $writingscore, $mathscore, $registrationid))
            {
                if($pass == 1)
                {
                    echo "<script>window.location='function/pass_registration.php?registrationid=".$registrationid."'; </script>";
                }
                else
                {
                    echo "<script>window.location='function/fail_registration.php?registrationid=".$registrationid."'; </script>";
                }
            }
            else
            {
                echo "<script>alert('Update Nilai gagal dilakukan!');</script>";
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
                            <span><label>Nilai Membaca</label></span>
                            <span><input name="readingscore" value="<?php echo $registration->getReadingscore(); ?>" type="number" class="textbox" required style=" text-align: center;" width="10%" min = 0 max = 100></span>
                        </div>
                        <div>
                            <span><label>Nilai Menulis</label></span>
                            <span><input name="writingscore" value="<?php echo $registration->getWritingscore(); ?>" type="number" class="textbox" required style=" text-align: center;" width="10%" min = 0 max = 100></span>
                        </div>
                        <div>
                            <span><label>Nilai Menghitung</label></span>
                            <span><input name="mathscore" value="<?php echo $registration->getMathscore(); ?>" type="number" class="textbox" required style=" text-align: center;" width="10%" min = 0 max = 100></span>
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