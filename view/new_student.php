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
</style>
<script type="text/javascript" src="js/function.js"></script>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
             <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Siswa Baru <br>
                    <a class='btn btn-warning' href="PDF/PendaftarSiswaBaruReport.php" target="_blank">Print List Pendaftar Siswa Baru</a>
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
                        $iterator = $registrationdao ->get_pass_registration()->getIterator();
                        while ($iterator -> valid()) 
                        {
                            echo "<tr>";
                            echo "<td>".$number."</td>";
                            echo "<td>".$iterator->current()->getFullname()."</td>";
                            
                            $gender ="Perempuan";
                            if($iterator->current()->getGender() == "male")
                            {
                                $gender = "Laki-Laki";
                            }
                            echo "<td>".$gender."</td>";
                            
                            echo "<td>".$iterator->current()->getBirthdate()."</td>";
                            echo "<td>".$iterator->current()->getDisability()."</td>";
                            $status = "Lulus Seleksi";
                            if($iterator->current()->getStatus() != 3)
                            {
                                $status = "Tidak Lulus Seleksi";
                            }
                            echo "<td>".$status."</td>";
                            if($iterator->current()->getStatus() == 3)
                            {
                                echo "<td> "
                                . "<a class='btn btn-primary' href='index.php?page=proses_penerimaan&registrationid=".$iterator->current()->getRegistrationid()."'><span > Proses Penerimaan </span></a>"
                                . "</td>";
                            }
                            else
                            {
                                echo "<td>"
                                . "<button class='btn btn-danger' onclick='removeRegistration(\"".$iterator->current()->getRegistrationid()."\")'><span > Hilangkan Data </span></button>"
                                . "</td>";
                            }
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