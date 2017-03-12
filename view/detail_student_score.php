<?php
    if(isset($_GET['studentid']))
    {
        
        $studentid = $_GET['studentid'];
        $kelasid = $_GET['kelasid'];
        
        if(isset($_POST['submit']))
        {
            //update kehadiran siswa
            $studentkelasid = $_POST['studentkelasid'];
            $izin = $_POST['izin'];
            $sakit = $_POST['sakit'];
            $tanpaketerangan = $_POST['tanpaketerangan'];
            
            $studentkelas = new Studentkelas();
            $studentkelas ->setStudentkelasid($studentkelasid);
            $studentkelas ->setIzin($izin);
            $studentkelas ->setSakit($sakit);
            $studentkelas ->setTanpaketerangan($tanpaketerangan);
            
            if($studentkelasdao ->update_studentkelas($studentkelas))
            {
                echo "<script>alert('Ubah data kehadiran siswa berhasil!');</script>";
            }
            else
            {
                echo "<script>alert('Ubah data kehadiran siswa gagal!');</script>";
            }
        }
        
        $kelas = $kelasdao->get_one_kelasid($kelasid);  
        $student = $studentdao->get_one_student($studentid);
        $studentkelas = $studentkelasdao ->get_one_studentkelas($studentid, $kelasid);
        
        
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
                    
                    <h2 class="style" align="center">Detail Nilai Siswa Kelas <?php echo $kelas->getClasslevel().$kelas->getNamakelas();?></h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Nama Lengkap</label></span>
                            <span><?php echo $student->getRegistration()->getFullname();?></span>
                       
                            <span><label>Jenis Kelamin</label></span>
                            <span><?php echo $gender;?></span>
                        </div>
                        <div>
                            <span><label>Tanggal Lahir</label></span>
                            <span><?php echo $student->getRegistration()->getBirthdate();?></span>
                        </div>
                        <div>
                            <span><label>Disabilitas</label></span>
                            <span><?php echo $student->getRegistration()->getDisability();?></span>
                        </div>
                        <div>
                            <span><label>Email</label></span>
                            <span><?php echo $student->getRegistration()->getEmail();?></span>
                        </div>
                        <div>
                            <span><label>Status Siswa</label></span>
                            <span><?php $status =  $student->getStatus();
                                        $status = getStudentStatus($status);
                                        echo $status;?>
                            </span>
                        </div>
                        <div>
                            <span><label>Sakit</label></span>
                            <span><input name="sakit" type="number" class="textbox" required style="text-align: center;" max="100" min="0" value="<?php echo $studentkelas->getSakit();?>"></span>
                        </div>
                        <div>
                            <span><label>Izin</label></span>
                            <span><input name="izin" type="number" class="textbox" required style="text-align: center;" max="100" min="0" value="<?php echo $studentkelas->getIzin();?>"></span>
                        </div>
                        <div>
                            <span><label>Tanpa Keterangan</label></span>
                            <span><input name="tanpaketerangan" type="number" class="textbox" required style="text-align: center;" max="100" min="0" value="<?php echo $studentkelas->getTanpaketerangan();?>"></span>
                        </div>
                        <input type="hidden" name="studentkelasid" value="<?php echo $studentkelas->getStudentkelasid();?>"/>
                        <div>
                            <div><input type="submit" name="submit" value="Simpan Data" ></div>
                        </div>
                    </form>
                </div>
                
                <table align="center" class="table" style="border:2px solid brown">
                   <legend>
                       Tabel Nilai Siswa <br>
                       <a class='btn btn-info' href="index.php?page=UTSReport&studentid=<?php echo $studentid;?>&kelasid=<?php echo $kelasid;?>">Print Raport Semester Ganjil</a>
                       <a class='btn btn-primary' href="index.php?page=UASReport&studentid=<?php echo $studentid;?>&kelasid=<?php echo $kelasid;?>">Print Raport Semester Genap</a>
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
