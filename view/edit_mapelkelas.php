<?php

    if(isset($_GET['kelasid']) )
    {
        $kelasid = $_GET['kelasid'];
        $mapelkelasid = $_GET['mapelkelasid'];
        $kelas = $kelasdao->get_one_kelasid($kelasid);
        $mapelkelas = $mapelkelasdao->get_one_mapelkelas($mapelkelasid);
        
        if(isset($_POST['submit']))
        {
            $teacherid = $_POST['teacherid'];
            if($mapelkelasdao->update_teacher($teacherid, $mapelkelasid))
            {
                echo "<script>window.location='index.php?page=pilih_mapel&kelasid=".$kelasid."'; </script>";
            }
            else
            {
                echo "<script>alert('ubah pengajar gagal!');</script>";
            }
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?><style>
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
            <div class="contact">
                <div class="section group">		
                    <div class="col span_2_of_4">
                        <div class="registration-form">
                            <h2 class="style" align="center">Ganti Pengajar Kelas <?php echo $kelas->getClasslevel().$kelas->getNamakelas();?></h2>
                            <form method="post" action="">
                                <div>
                                    <span><label>Nama Mata Pelajaran</label></span>
                                    <span><?php echo $mapelkelas->getLesson()->getLessonname(); ?></span>
                                </div>
                               
                                <div>
                                    <span><label>Guru Pengajar</label></span>
                                    <select name="teacherid">
                                        <?php
                                            $it = $teacherdao->get_active_teacher()->getIterator();
                                            while($it->valid())
                                            {
                                                if($it->current()->getTeacherid() != $mapelkelas->getTeacherid())
                                                {
                                                    echo "<option value='".$it->current()->getTeacherid()."'>";
                                                    echo $it->current()->getFullname();
                                                    echo "</option>";
                                                    $it->next();
                                                }
                                                else
                                                {
                                                    echo "<option value='".$it->current()->getTeacherid()."' selected>";
                                                    echo $it->current()->getFullname();
                                                    echo "</option>";
                                                    $it->next();
                                                }
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                
                                <div>
                                    <div><input type="submit" name="submit" value="Simpan Data" ></div>
                                </div>
                            </form>
                          </div>
                    </div>		
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>