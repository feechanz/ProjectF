<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if(isset($_GET['kelasid']))
    {
        $kelasid = $_GET['kelasid'];
        $studentid = $_GET['studentid'];
        $kelas = $kelasdao ->get_one_kelasid($kelasid);
        $student = $studentdao->get_one_student($studentid);
        $studentkelas = $studentkelasdao ->get_one_studentkelas($studentid, $kelasid);
        $gender = $student ->getRegistration()->getGender();
        
        if($gender == "male")
        {
            $gender = "Laki-Laki";
        }
        else 
        {
            $gender = "Perempuan";
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
        padding-left: 0;
        padding-right: 0;
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
        width:100%;
        text-align: center;
        margin-left: 0;
        margin-right: 0;
    }
</style>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    
                    <h2 class="style" align="center">Data Nilai Kelas </h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Nama Lengkap</label></span>
                            <span><?php echo $student ->getRegistration()->getFullname();?></span>
                        </div>
                        <div>
                            <span><label>NISN</label></span>
                            <span><?php echo $student ->getRegistration()->getNisn();?></span>
                       
                            <span><label>Jenis Kelamin</label></span>
                            <span><?php echo $gender;?></span>
                            
                            <span><label>Kelas</label></span>
                            <span><?php echo $kelas ->getClasslevel().$kelas->getNamakelas();?></span>
                        </div>
                        <div>
                            <span><label>Sakit</label></span>
                            <span><?php echo $studentkelas->getSakit();?></span>
                        </div>
                        <div>
                            <span><label>Izin</label></span>
                            <span><?php echo $studentkelas->getIzin();?></span>
                        </div>
                        <div>
                            <span><label>Tanpa Keterangan</label></span>
                            <span><?php echo $studentkelas->getTanpaketerangan();?></span>
                        </div>
                    </form>
                </div>
                <table align="center" class="table" style="border:2px solid brown">
                   <legend>
                       Tabel Nilai Siswa 
                   </legend>
                   <thead>
                        <tr >
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Nama Pelajaran</th>
<!--                            <th style="width: 10%;">Jenis Kelamin</th>-->
                            <th style="width: 5%;">KKM</th>
                            <th style="width: 30%;" colspan="5">Semester Ganjil (1) </th>
                            <th style="width: 30%;" colspan="5">Semester Genap (2) </th>
                        </tr>
                    </thead>
                   <tbody>
                        <?php
                           $number = 1;
                           $iterator = $nilaidao->get_nilai_by_studentid($studentid, $kelasid)->getIterator();
                           while ($iterator -> valid()) 
                           {
                                
                                if($number%2)
                                {
                                    echo "<tr style='background-color:cornsilk;'>";
                                }
                                else 
                                {
                                    echo "<tr style='background-color:mistyrose;'>";
                                }
                                echo "<td rowspan='6'><b>".$number." <input type='hidden' name='nilaiid' value='".$iterator->current()->getNilaiid()."'></b></td>";
                                echo "<td rowspan='6'><b>".$iterator->current()->getMapelkelas()->getLesson()->getLessonname()." <input type='hidden' name='studentid' value='".$iterator->current()->getStudentid()."'></b></td>";
//                                $gender ="Perempuan";
//                                if($iterator->current()->getRegistration()->getGender() == "male")
//                                {
//                                    $gender = "Laki-Laki";
//                                }
//                                echo "<td rowspan='2'>".$gender."</td>";
                                echo "<td rowspan='6'><b>".$iterator->current()->getMapelkelas()->getLesson()->getMinimumscore()."</b></td>";
                                //semester1
                                echo "<td colspan='5' style='background-color:lightgreen;'>Nilai Ulangan Harian (".$iterator->current()->getMapelkelas()->getLesson()->getUlanganpct().")%</td>";
                                //semester2
                                echo "<td colspan='5' style='background-color:lightgreen;'>Nilai Ulangan Harian (".$iterator->current()->getMapelkelas()->getLesson()->getUlanganpct().")%</td>";
                               
                                echo "</tr>";
                                
                                //ULANGAN
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td><input name='uts_ulangan1' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan1()."></td>";
                                echo "<td><input name='uts_ulangan2' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan2()."></td>";
                                echo "<td><input name='uts_ulangan3' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan3()."></td>";
                                echo "<td><input name='uts_ulangan4' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan4()."></td>";
                                echo "<td><input name='uts_ulangan5' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan5()."></td>";
                                //semester2
                                echo "<td><input name='uas_ulangan1' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan1()."></td>";
                                echo "<td><input name='uas_ulangan2' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan2()."></td>";
                                echo "<td><input name='uas_ulangan3' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan3()."></td>";
                                echo "<td><input name='uas_ulangan4' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan4()."></td>";
                                echo "<td><input name='uas_ulangan5' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan5()."></td>";
                                echo "</tr>";
                                
                                //END ULANGAN
                                
                                //QUIZ
                                
                                echo "<tr style='background-color:pink;'>";
                                //semester1
                                echo "<td colspan='5'>Nilai Quiz Harian (".$iterator->current()->getMapelkelas()->getLesson()->getQuizpct().")%</td>";
                                //semester2
                                echo "<td colspan='5'>Nilai Quiz Harian (".$iterator->current()->getMapelkelas()->getLesson()->getQuizpct().")%</td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td><input name='uts_quiz1' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz1()."></td>";
                                echo "<td><input name='uts_quiz2' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz2()."></td>";
                                echo "<td><input name='uts_quiz3' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz3()."></td>";
                                echo "<td><input name='uts_quiz4' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz4()."></td>";
                                echo "<td><input name='uts_quiz5' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz5()."></td>";
                                //semester2
                                echo "<td><input name='uas_quiz1' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz1()."></td>";
                                echo "<td><input name='uas_quiz2' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz2()."></td>";
                                echo "<td><input name='uas_quiz3' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz3()."></td>";
                                echo "<td><input name='uas_quiz4' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz4()."></td>";
                                echo "<td><input name='uas_quiz5' readonly='readonly' type='text' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz5()."></td>";
                                echo "</tr>";
                                
                                
                                //END QUIZ
                                
                                //UJIAN
                                
                                echo "<tr style='background-color:lightyellow;'>";
                                //semester1
                                echo "<td colspan='5'>Nilai UTS (".$iterator->current()->getMapelkelas()->getLesson()->getUjianpct().")%</td>";
                                //semester2
                                echo "<td colspan='5'>Nilai UAS (".$iterator->current()->getMapelkelas()->getLesson()->getUjianpct().")</td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td colspan='5'><input readonly='readonly' name='uts'  type='text' style='width:25%;' min='0' max='100' value=".$iterator->current()->getUts()."></td>";
                                //semester2
                                echo "<td colspan='5'><input readonly='readonly' name='uas'  type='text' style='width:25%;' min='0' max='100' value=".$iterator->current()->getUts()."></td>";
                                echo "</tr>";
                                
                                
                                //END UJIAN
                             
                               $number++;
                               $iterator->next();
                           }
                       ?>
                   </tbody>
                </table>
            </div>
        </div>
    </div>            
</div>