<?php
    if(isset($_GET['periodeid']))
    {
        $periodeid = $_GET['periodeid'];
        $periode = $periodedao ->get_one_periode($periodeid);
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
                            . "<a class='btn btn-primary' href='index.php?page=pilih_mapel&kelasid=".$iterator->current()->getKelasid()."'><span > Atur Jadwal Pelajaran </span></a>"
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