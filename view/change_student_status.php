<?php
    if(isset($_GET['studentid']))
    {
        
        $studentid = $_GET['studentid'];
        
      
        if(isset($_POST['submit']))
        {
            $status = $_POST['status'];
            if($studentdao->update_status($status, $studentid))
            {
                echo "<script>alert('Status siswa berhasil diubah');</script>";
            }
            else
            {
                echo "<script>alert('Status siswa gagal diubah');</script>";
            }
        }
        
        $student = $studentdao->get_one_student($studentid);
        $gender ="Perempuan";
        if($student->getRegistration()->getGender() == "male")
        {
            $gender = "Laki-Laki";
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
<script type="text/javascript" src="js/function.js"></script>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    <form method="post" action="" >
                        <div>
                            <span><label>Nama Lengkap</label></span>
                            <span><?php echo $student->getRegistration()->getFullname();?></span>
                       
                            <span><label>Jenis Kelamin</label></span>
                            <span><?php echo $gender;?></span>
                        </div>
                        <div>
                           <span><label>Status Siswa</label></span>
                           <span>
                               <select name="status">
                                   <?php 
                                   $status =  $student->getStatus();
                                   if($status == 0)
                                   {
                                       echo 
                                        "<option value='0' selected>Drop Out</option>"
                                       ."<option value='1'>Aktif</option>"
                                       ."<option value='2'>Lulus</option>"
                                       ."<option value='3'>Alumni</option>";
                                   }
                                   else if($status == 1)
                                   {
                                       echo 
                                        "<option value='0'>Drop Out</option>"
                                       ."<option value='1' selected>Aktif</option>"
                                       ."<option value='2'>Lulus</option>"
                                       ."<option value='3'>Alumni</option>";
                                   }
                                   else if($status == 2)
                                   {
                                       echo 
                                        "<option value='0'>Drop Out</option>"
                                       ."<option value='1'>Aktif</option>"
                                       ."<option value='2' selected>Lulus</option>"
                                       ."<option value='3'>Alumni</option>";
                                   }
                                   else
                                   {
                                       echo 
                                        "<option value='0'>Drop Out</option>"
                                       ."<option value='1'>Aktif</option>"
                                       ."<option value='2'>Lulus</option>"
                                       ."<option value='3' selected>Alumni</option>";
                                   }
                                      ?>
                               </select>
                               
                           </span>
                       </div>
                        <div>
                            <span><input type="submit" name="submit" class="btn btn-success" value="Ganti Status"></input></span>
                      
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>