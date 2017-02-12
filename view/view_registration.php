<script type="text/javascript" src="js/function.js"></script>
<?php
    $query = "SELECT * FROM
              information" ;
    $hasil = mysqli_query($con, $query);
    $dibuka = true;
    while($row = mysqli_fetch_array($hasil)){
        if( $row['pendaftaran']!=1 )
        {
            $dibuka = false;
        }
    }
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
            $status = "Ditolak";
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
</style>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <h2 class="style" align ="center">Status Pendaftaran : 
                    
                    <?php 
                        if($dibuka)
                        {
                            echo "Dibuka"; 
                        }
                        else 
                        {
                            echo "Ditutup"; 
                        }
                    ?>
                   
                </h2>
                <h1 align="center">
                    <?php
                        if($dibuka)
                        {
                            echo "<button class='btn btn-danger' onclick='closeRegistration()'>Tutup Pendaftaran</button>"; 
                        }
                        else 
                        {
                            echo "<button class='btn btn-primary' onclick='openRegistration()'>Buka Pendaftaran</button>"; 
                        }
                    ?>
                    
                </h1>
            </div>
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Pendaftaran
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
                    $iterator = $registrationdao ->get_pending_registration()->getIterator();
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
                        . "<button class='btn btn-primary' onclick='acceptRegistration(\"".$iterator->current()->getRegistrationid()."\")'><span > Terima </span></a>"
                        . "<button class='btn btn-danger' onclick='rejectRegistration(\"".$iterator->current()->getRegistrationid()."\")'><span> Tolak </span></button>"
                        . "<a href='index.php?page=detail_registration&registrationid=".$iterator->current()->getRegistrationid()."' class='btn btn-info'><span> Detail </span></a>"
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
                        . "<button class='btn btn-success' onclick='passRegistration(\"".$iterator->current()->getRegistrationid()."\")'><span > Lulus </span></button>"
                        . "<button class='btn btn-danger' onclick='rejectRegistration(\"".$iterator->current()->getRegistrationid()."\")'><span> Tolak </span></button>"
                        . "<a href='index.php?page=detail_registration&registrationid=".$iterator->current()->getRegistrationid()."' class='btn btn-info'><span> Detail </span></a>"
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
                    Tabel Pendaftaran yang Ditolak
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
                    $iterator = $registrationdao ->get_rejected_registration()->getIterator();
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
                        . "<button class='btn btn-primary' onclick='acceptRegistration(\"".$iterator->current()->getRegistrationid()."\")'><span > Terima </span></button>"
                        . "<button class='btn btn-danger' onclick='deleteRegistration(\"".$iterator->current()->getRegistrationid()."\")'><span> Hapus </span></button>"
                        . "<a href='index.php?page=detail_registration&registrationid=".$iterator->current()->getRegistrationid()."' class='btn btn-info'><span> Detail </span></a>"
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