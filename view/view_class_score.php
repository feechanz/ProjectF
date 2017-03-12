<?php
    if(isset($_GET['kelasid']))
    {
        $kelasid = $_GET['kelasid'];
        $kelas = $kelasdao->get_one_kelasid($kelasid);
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
                    
                    <h2 class="style" align="center">Data Nilai Kelas </h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Periode</label></span>
                            <span><?php echo $kelas->getPeriode()->getPeriodename();?></span>
                        </div>
                        <div>
                            <span><label>Nama Kelas</label></span>
                            <span><?php echo $kelas->getClasslevel().$kelas->getNamakelas();?></span>
                       
                            <span><label>Wali Kelas</label></span>
                            <span><?php echo $kelas->getTeacher()->getFullName();?></span>
                        </div>
                        
                    </form>
                </div>
                
                <table align="center" class="table table-hover" style="border:2px solid brown">
                   <legend>
                       Tabel Siswa <br>
                       <a class='btn btn-info' href="PDF/NilaiKelasReport.php?kelasid=<?php echo $kelasid;?>" target="_blank">Print Nilai Kelas</a>
                   </legend>
                   <thead>
                        <tr >
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Nama </th>
                            <th style="width: 10%;">Jenis Kelamin</th>
                            <th style="width: 10%;">Tanggal Lahir </th>
                            <th style="width: 10%;">Disabilitas </th>
                            <th style="width: 10%;">Status </th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                   <tbody>
                        <?php
                           $number = 1;
                           $iterator = $studentdao->get_student_kelasid($kelasid)->getIterator();
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
                                echo "<td>".$iterator->current()->getRegistration()->getBirthdate()."</td>";
                                echo "<td>".$iterator->current()->getRegistration()->getDisability()."</td>";
                                $status = $iterator->current()->getStatus();
                                $status = getStudentStatus($status);
                                echo "<td>".$status."</td>";

                                echo "<td> "
                                . "<a href='index.php?page=detail_student_score&studentid=".$iterator->current()->getStudentid()."&kelasid=".$kelasid."' class='btn btn-primary'><span> Lihat Nilai Siswa </span></a>"
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