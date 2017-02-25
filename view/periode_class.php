<?php
    if(isset($_GET['periodeid']))
    {
        $periodeid = $_GET['periodeid'];
        $periode = $periodedao->get_one_periode($periodeid);
        $teacherid = $_SESSION['teacherid'];
        $fullname = $_SESSION['fullname'];
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
            <h1 align="center">Welcome, <?php echo $fullname;?></h1>
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Wali Kelas Periode <?php echo $periode->getPeriodename();?>
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 10%;">Kelas </th>
                        <th style="width: 10%;">Jumlah Siswa</th>
                        <th style="width: 17%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $iterator = $kelasdao->get_my_kelas($teacherid,$periodeid)->getIterator();
                    
                    while ($iterator -> valid()) 
                    {
                        $teacher = new Teacher();
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getClasslevel().$iterator->current()->getNamakelas()."</td>";
                        echo "<td>".$iterator->current()->getJumlahsiswa()."</td>";
                        echo "<td> "
                        . "<a href='' class='btn btn-success'><span > Lihat Siswa </span></a>"
                        . "<button class='btn btn-info'><span> Lihat Nilai </span></button>"
                       
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