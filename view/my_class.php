<?php
    $teacherid = $_SESSION['teacherid'];
    $fullname = $_SESSION['fullname'];
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
            <h1 align="center">Welcome, <?php echo $fullname;?></h1>
            <div class="col span_2_of_4">                
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
                               . "<a class='btn btn-primary' href='index.php?page=periode_class&periodeid=".$iterator->current()->getPeriodeid()."'><span > Pilih Periode </span></a>"
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
