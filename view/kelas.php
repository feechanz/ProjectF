<?php
    if(isset($_POST['submit']))
    {
        $periodename = $_POST['periodename'];
        
        $periode = new Periode();
        $periode ->setPeriodename($periodename);
        
        if($periodedao ->insert_periode($periode))
        {
            echo "<script> alert('data periode berhasil ditambahkan!'); </script>";
        }
        else
        {
            echo "<script> alert('data periode gagal ditambahkan!'); </script>";
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
</style>
<script type="text/javascript" src="js/function.js"></script>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    <h2 class="style" align="center">Menambah Mata Pelajaran</h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>Nama Periode</label></span>
                            <span><input name="periodename" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="ex: Periode 2015/2016"></span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Tambah Periode" ></div>
                        </div>
                    </form>
                </div>
            </div>
             <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Periode 
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Nama Periode</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        $number = 1;
                        $iterator = $periodedao->get_active_periode()->getIterator();
                        while ($iterator -> valid()) 
                        {
                            echo "<tr>";
                            echo "<td>".$number."</td>";
                            echo "<td>".$iterator->current()->getPeriodename()."</td>";
                            echo "<td> "
                            . "<a class='btn btn-primary' href='index.php?page=setting_kelas&periodeid=".$iterator->current()->getPeriodeid()."'><span > Atur Kelas </span></a>"
                            . "<button class='btn btn-danger' onclick='deactivePeriode(\"".$iterator->current()->getPeriodeid()."\")'><span > Non-Aktifkan </span></button>"
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