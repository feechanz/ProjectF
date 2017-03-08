<?php
    function getRegistrationStatus($status)
    {
        if($status == 1)
        {
            $status = "Menunggu Konfirmasi";
        }
        else if($status == 2)
        {
            $status = "Pendaftaran Diterima";
        }
        else
        {
            $status = "Pendaftaran Ditolak";
        }
        return $status;
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
    
</style>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    <h2 class="style" align="center">Kirim Pengumuman </h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>Isi Pesan</label></span>
                            <span>
                                <span>
                                    <textarea name="message"> </textarea>
                                </span>
                            </span>
                        </div>
                           
                        <div>
                            <div><input type="submit" name="submit" value="Kirim Email ke Semua" ></div>
                        </div>
                    </form>
                </div>
            </div>
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Pendaftaran yang Diterima
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Nama Lengkap </th>
                        <th style="width: 10%;">Jenis Kelamin</th>
                        <th style="width: 25%;">Asal Sekolah</th>
                        <th style="width: 10%;">Status </th>
                        <th style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $iterator = $registrationdao ->get_accepted_registration()->getIterator();
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
                        echo "<td>".$iterator->current()->getStartschool()."</td>";
                        $status = $iterator->current()->getStatus();
                        $status = getRegistrationStatus($status);
                        echo "<td>".$status."</td>";

                        echo "<td> "
                        . "<a href='index.php?page=detail_registration&registrationid=".$iterator->current()->getRegistrationid()."' class='btn btn-info'><span> Detail Pendaftaran </span></a>"
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