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
                
                <table align="center" class="table table-hover" style="border:2px solid brown">
                   <legend>
                       Tabel Nilai Siswa 
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
                
                
            </div>
        </div>
    </div>
</div> 
