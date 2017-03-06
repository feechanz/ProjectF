<?php
    $mapelkelasid = $_GET['mapelkelasid'];
    $mapelkelas = $mapelkelasdao->get_one_mapelkelas($mapelkelasid);
    
    if(isset($_POST['scoresubmit']))
    {
        $nilaiid = $_POST['nilaiid'];
        
        $uts_ulangan1 = $_POST['uts_ulangan1'];
        $uts_ulangan2 = $_POST['uts_ulangan2'];
        $uts_ulangan3 = $_POST['uts_ulangan3'];
        $uts_ulangan4 = $_POST['uts_ulangan4'];
        $uts_ulangan5 = $_POST['uts_ulangan5'];
        
        $uts_quiz1 = $_POST['uts_quiz1'];
        $uts_quiz2 = $_POST['uts_quiz2'];
        $uts_quiz3 = $_POST['uts_quiz3'];
        $uts_quiz4 = $_POST['uts_quiz4'];
        $uts_quiz5 = $_POST['uts_quiz5'];
        $uts = $_POST['uts'];
        ///UAS
        $uas_ulangan1 = $_POST['uas_ulangan1'];
        $uas_ulangan2 = $_POST['uas_ulangan2'];
        $uas_ulangan3 = $_POST['uas_ulangan3'];
        $uas_ulangan4 = $_POST['uas_ulangan4'];
        $uas_ulangan5 = $_POST['uas_ulangan5'];
        
        $uas_quiz1 = $_POST['uas_quiz1'];
        $uas_quiz2 = $_POST['uas_quiz2'];
        $uas_quiz3 = $_POST['uas_quiz3'];
        $uas_quiz4 = $_POST['uas_quiz4'];
        $uas_quiz5 = $_POST['uas_quiz5'];
        $uas = $_POST['uas'];
        
        $studentid = $_POST['studentid'];
        
        $nilai = new Nilai();
        $nilai ->setUts_ulangan1($uts_ulangan1);
        $nilai ->setUts_ulangan2($uts_ulangan2);
        $nilai ->setUts_ulangan3($uts_ulangan3);
        $nilai ->setUts_ulangan4($uts_ulangan4);
        $nilai ->setUts_ulangan5($uts_ulangan5);
        
        $nilai ->setUts_quiz1($uts_quiz1);
        $nilai ->setUts_quiz2($uts_quiz2);
        $nilai ->setUts_quiz3($uts_quiz3);
        $nilai ->setUts_quiz4($uts_quiz4);
        $nilai ->setUts_quiz5($uts_quiz5);
        
        $nilai ->setUts($uts);
        
        $nilai ->setUas_ulangan1($uas_ulangan1);
        $nilai ->setUas_ulangan2($uas_ulangan2);
        $nilai ->setUas_ulangan3($uas_ulangan3);
        $nilai ->setUas_ulangan4($uas_ulangan4);
        $nilai ->setUas_ulangan5($uas_ulangan5);
        
        $nilai ->setUas_quiz1($uas_quiz1);
        $nilai ->setUas_quiz2($uas_quiz2);
        $nilai ->setUas_quiz3($uas_quiz3);
        $nilai ->setUas_quiz4($uas_quiz4);
        $nilai ->setUas_quiz5($uas_quiz5);
        
        $nilai ->setUas($uas);
        
        $nilai ->setNilaiid($nilaiid);
        $nilai ->setMapelkelasid($mapelkelasid);
        $nilai ->setStudentid($studentid);
        
        if($nilai->getNilaiid() == null || $nilai ->getNilaiid() == "")
        {
            //tambah nilai
            if($nilaidao->insert_nilai($nilai))
            {
                echo "<script>alert('Nilai berhasil diinput!');</script>";
            }
            else
            {
                echo "<script>alert('Nilai gagal diinput!');</script>";
            }
        }
        else
        {
            //update nilai
            if($nilaidao->update_nilai($nilai))
            {
                echo "<script>alert('Nilai berhasil diinput!');</script>";
            }
            else
            {
                echo "<script>alert('Nilai gagal diinput!');</script>";
            }
        }
        //echo "<script>alert('".$uts_ulangan1."');</script>";
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
                    
                    <h2 class="style" align="center">Data Nilai Kelas <?php echo $mapelkelas->getKelas()->getClasslevel().$mapelkelas->getKelas()->getNamakelas()." ".$mapelkelas->getKelas()->getPeriode()->getPeriodename();?></h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Nama Pelajaran</label></span>
                            <span><?php echo $mapelkelas->getLesson()->getLessonname();?></span>
                        </div>
                        <div>
                            <span><label>Nilai KKM</label></span>
                            <span><?php echo $mapelkelas->getLesson()->getMinimumscore();?></span>
                       
                            <span><label>Kelas</label></span>
                            <span><?php echo $mapelkelas->getKelas()->getClasslevel().$mapelkelas->getKelas()->getNamakelas();?></span>
                        </div>
                        
                    </form>
                </div>
                
                <table align="center" class="table" style="border:2px solid brown">
                   <legend>
                       Tabel Penilaian Siswa 
                   </legend>
                   <thead>
                        <tr >
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Nama </th>
<!--                            <th style="width: 10%;">Jenis Kelamin</th>-->
                            <th style="width: 5%;">KKM</th>
                            <th style="width: 30%;" colspan="5">Semester Ganjil (1) </th>
                            <th style="width: 30%;" colspan="5">Semester Genap (2) </th>
                            <th style="width: 5%;">Aksi</th>
                        </tr>
                    </thead>
                   <tbody>
                        <?php
                           $number = 1;
                           $iterator = $nilaidao->get_nilai_by_mapelkelasid($mapelkelasid)->getIterator();
                           while ($iterator -> valid()) 
                           {
                                echo "<form method='post' action='' >";
                                if($number%2)
                                {
                                    echo "<tr style='background-color:cornsilk;'>";
                                }
                                else 
                                {
                                    echo "<tr style='background-color:mistyrose;'>";
                                }
                                echo "<td rowspan='6'><b>".$number." <input type='hidden' name='nilaiid' value='".$iterator->current()->getNilaiid()."'></b></td>";
                                echo "<td rowspan='6'><b>".$iterator->current()->getStudent()->getRegistration()->getFullname()." <input type='hidden' name='studentid' value='".$iterator->current()->getStudentid()."'></b></td>";
//                                $gender ="Perempuan";
//                                if($iterator->current()->getRegistration()->getGender() == "male")
//                                {
//                                    $gender = "Laki-Laki";
//                                }
//                                echo "<td rowspan='2'>".$gender."</td>";
                                echo "<td rowspan='6'><b>".$mapelkelas->getLesson()->getMinimumscore()."</b></td>";
                                //semester1
                                echo "<td colspan='5' style='background-color:lightgreen;'>Nilai Ulangan Harian (".$mapelkelas->getLesson()->getUlanganpct().")%</td>";
                                //semester2
                                echo "<td colspan='5' style='background-color:lightgreen;'>Nilai Ulangan Harian (".$mapelkelas->getLesson()->getUlanganpct().")%</td>";
                                echo "<td rowspan='6'> "
                                . "<input type='submit' name='scoresubmit' class='btn btn-primary' value='Simpan'/>"
                                . "</td>";
                                echo "</tr>";
                                
                                //ULANGAN
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td><input name='uts_ulangan1' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan1()."></td>";
                                echo "<td><input name='uts_ulangan2' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan2()."></td>";
                                echo "<td><input name='uts_ulangan3' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan3()."></td>";
                                echo "<td><input name='uts_ulangan4' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan4()."></td>";
                                echo "<td><input name='uts_ulangan5' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_ulangan5()."></td>";
                                //semester2
                                echo "<td><input name='uas_ulangan1' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan1()."></td>";
                                echo "<td><input name='uas_ulangan2' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan2()."></td>";
                                echo "<td><input name='uas_ulangan3' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan3()."></td>";
                                echo "<td><input name='uas_ulangan4' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan4()."></td>";
                                echo "<td><input name='uas_ulangan5' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_ulangan5()."></td>";
                                echo "</tr>";
                                
                                //END ULANGAN
                                
                                //QUIZ
                                
                                echo "<tr style='background-color:pink;'>";
                                //semester1
                                echo "<td colspan='5'>Nilai Quiz Harian (".$mapelkelas->getLesson()->getQuizpct().")%</td>";
                                //semester2
                                echo "<td colspan='5'>Nilai Quiz Harian (".$mapelkelas->getLesson()->getQuizpct().")%</td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td><input name='uts_quiz1' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz1()."></td>";
                                echo "<td><input name='uts_quiz2' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz2()."></td>";
                                echo "<td><input name='uts_quiz3' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz3()."></td>";
                                echo "<td><input name='uts_quiz4' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz4()."></td>";
                                echo "<td><input name='uts_quiz5' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUts_quiz5()."></td>";
                                //semester2
                                echo "<td><input name='uas_quiz1' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz1()."></td>";
                                echo "<td><input name='uas_quiz2' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz2()."></td>";
                                echo "<td><input name='uas_quiz3' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz3()."></td>";
                                echo "<td><input name='uas_quiz4' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz4()."></td>";
                                echo "<td><input name='uas_quiz5' type='number' style='width:100%;' min='0' max='100' value=".$iterator->current()->getUas_quiz5()."></td>";
                                echo "</tr>";
                                
                                
                                //END QUIZ
                                
                                //UJIAN
                                
                                echo "<tr style='background-color:lightyellow;'>";
                                //semester1
                                echo "<td colspan='5'>Nilai UTS (".$mapelkelas->getLesson()->getUjianpct().")%</td>";
                                //semester2
                                echo "<td colspan='5'>Nilai UAS (".$mapelkelas->getLesson()->getUjianpct().")%</td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td colspan='5'><input name='uts'  type='number' style='width:25%;' min='0' max='100' value=".$iterator->current()->getUts()."></td>";
                                //semester2
                                echo "<td colspan='5'><input name='uas'  type='number' style='width:25%;' min='0' max='100' value=".$iterator->current()->getUts()."></td>";
                                echo "</tr>";
                                
                                
                                //END UJIAN
                                echo "</form>";
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