<?php
    if(isset($_GET['studentid']) && isset($_GET['periodeid']) && isset($_GET['classlevel']))
    {
        
        $studentid = $_GET['studentid'];
        $student = $studentdao->get_one_student($studentid);
        
        $periodeid = $_GET['periodeid'];
        $periode = $periodedao->get_one_periode($periodeid);
        
        $classlevel = $_GET['classlevel'];
        
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
                    
                    <h2 class="style" align="center">Data Kelas Siswa</h2>
                    
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
                        
                    </form>
                </div>
                
                <table align="center" class="table table-hover" style="border:2px solid brown">
                   <legend>
                       Tabel Kelas Siswa 
                   </legend>
                   <thead>
                       <tr >
                           <th style="width: 5%;">No</th>
                           <th style="width: 25%;">Nama Periode</th>
                           <th style="width: 25%;">Nama Kelas</th>
                           <th style="width: 15%;">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                        <?php
                           $number = 1;
                           
                           $iterator = $kelasdao->get_kelas_by_studentid($studentid)->getIterator();
                           while ($iterator -> valid()) 
                           {
                               echo "<tr>";
                               echo "<td>".$number."</td>";
                               echo "<td>".$iterator->current()->getPeriode()->getPeriodename()."</td>";
                               echo "<td>".$iterator->current()->getClasslevel().$iterator->current()->getNamakelas()."</td>";
                               echo "<td> "
                               . "<a class='btn btn-primary' href='index.php?page=detailkelas&kelasid=".$iterator->current()->getKelasid()."'><span > Detail Kelas </span></a>"
                               . "</td>";
                               echo "</tr>";
                               $number++;
                               $iterator->next();
                           }
                       ?>
                   </tbody>
                </table>
                
                <table align="center" class="table table-hover" style="border:2px solid brown">
                    <legend>
                        Tabel Kelas <?php echo $periode ->getPeriodename(); ?>
                    </legend>
                    <thead>
                        <tr >
                            <th style="width: 5%;">No</th>
                            <th style="width: 25%;">Kelas</th>
                            <th style="width: 15%;">Wali Kelas</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                            $number = 1;
                            $iterator = $kelasdao->get_kelas_by_periodeid($periodeid)->getIterator();
                            while ($iterator -> valid()) 
                            {
                                echo "<tr>";
                                echo "<td>".$number."</td>";
                                echo "<td>".$iterator->current()->getClasslevel().$iterator->current()->getNamakelas()."</td>";
                                echo "<td>".$iterator->current()->getTeacher()->getFullname()."</td>";
                                echo "<td> "
                                . "<button class='btn btn-primary' onclick='chooseClass(\"".$iterator->current()->getKelasid()."\",\"".$studentid."\",\"".$classlevel."\")'><span > Pilih Kelas Untuk Siswa </span></button>"
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
