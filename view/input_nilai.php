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
                
                <table align="center" class="table table-hover" style="border:2px solid brown">
                   <legend>
                       Tabel Penilaian Siswa 
                   </legend>
                   <thead>
                        <tr >
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Nama </th>
                            <th style="width: 10%;">Jenis Kelamin</th>
                            <th style="width: 10%;">KKM</th>
                            <th style="width: 10%;">Nilai Semester 1 </th>
                            <th style="width: 10%;">Nilai Semester 2 </th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                   <tbody>
                        <?php
                           $number = 1;
                           $iterator = $studentdao->get_class_mapelkelasid($mapelkelasid)->getIterator();
                           while ($iterator -> valid()) 
                           {
                                echo "<tr>";
                                echo "<td>".$number."</td>";
                                echo "<td>".$iterator->current()->getRegistration()->getFullname()."</td>";
                                $gender ="Perempuan";
                                if($iterator->current()->getRegistration()->getGender() == "male")
                                {
                                    $gender = "Laki-Laki";
                                }
                                echo "<td>".$gender."</td>";
                                echo "<td>".$mapelkelas->getLesson()->getMinimumscore()."</td>";
                                echo "<td><input type='number' style='width:50%;' min='0' max='100'></td>";
                                echo "<td><input type='number' style='width:50%;' min='0' max='100'></td>";

                                echo "<td> "
                                . "<a href='' class='btn btn-primary'><span> Simpan Nilai </span></a>"
                                . "</td>";
                                echo "</tr>";
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