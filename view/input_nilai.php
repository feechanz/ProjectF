<?php
    $mapelkelasid = $_GET['mapelkelasid'];
    $mapelkelas = $mapelkelasdao->get_one_mapelkelas($mapelkelasid);
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
                           $iterator = $studentdao->get_class_mapelkelasid($mapelkelasid)->getIterator();
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
                                echo "<td rowspan='6'><b>".$number."</b></td>";
                                echo "<td rowspan='6'><b>".$iterator->current()->getRegistration()->getFullname()."</b></td>";
//                                $gender ="Perempuan";
//                                if($iterator->current()->getRegistration()->getGender() == "male")
//                                {
//                                    $gender = "Laki-Laki";
//                                }
//                                echo "<td rowspan='2'>".$gender."</td>";
                                echo "<td rowspan='6'><b>".$mapelkelas->getLesson()->getMinimumscore()."</b></td>";
                                //semester1
                                echo "<td colspan='5' style='background-color:lightgreen;'>Nilai Ulangan Harian </td>";
                                //semester2
                                echo "<td colspan='5' style='background-color:lightgreen;'>Nilai Ulangan Harian </td>";
                                echo "<td rowspan='6'> "
                                . "<input type='submit' class='btn btn-primary' value='Simpan'/>"
                                . "</td>";
                                echo "</tr>";
                                
                                //ULANGAN
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td><input name='uts_ulangan1' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_ulangan2' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_ulangan3' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_ulangan4' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_ulangan5' type='number' style='width:100%;' min='0' max='100'></td>";
                                //semester2
                                echo "<td><input name='uas_ulangan1' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_ulangan2' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_ulangan3' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_ulangan4' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_ulangan5' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "</tr>";
                                
                                //END ULANGAN
                                
                                //QUIZ
                                
                                echo "<tr style='background-color:pink;'>";
                                //semester1
                                echo "<td colspan='5'>Nilai Quiz Harian </td>";
                                //semester2
                                echo "<td colspan='5'>Nilai Quiz Harian </td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td><input name='uts_quiz1' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_quiz2' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_quiz3' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_quiz4' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uts_quiz5' type='number' style='width:100%;' min='0' max='100'></td>";
                                //semester2
                                echo "<td><input name='uas_quiz1' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_quiz2' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_quiz3' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_quiz4' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "<td><input name='uas_quiz5' type='number' style='width:100%;' min='0' max='100'></td>";
                                echo "</tr>";
                                
                                
                                //END QUIZ
                                
                                //UJIAN
                                
                                echo "<tr style='background-color:lightyellow;'>";
                                //semester1
                                echo "<td colspan='5'>Nilai UTS </td>";
                                //semester2
                                echo "<td colspan='5'>Nilai UAS </td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                 //semester1
                                echo "<td colspan='5'><input name='uts'  type='number' style='width:25%;' min='0' max='100'></td>";
                                //semester2
                                echo "<td colspan='5'><input name='uas'  type='number' style='width:25%;' min='0' max='100'></td>";
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