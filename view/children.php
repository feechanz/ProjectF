<?php
    $userid = $_SESSION['userid'];
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
            <h1 align="center">Welcome</h1>
            <div class="col span_2_of_4">                
                <table align="center" class="table table-hover" style="border:2px solid brown">
                   <legend>
                       Tabel Siswa
                   </legend>
                   <thead>
                       <tr >
                           <th style="width: 5%;">No</th>
                           <th style="width: 10%;">NISN</th>
                           <th style="width: 25%;">Nama</th>
                           <th style="width: 15%;">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                        <?php
                           $number = 1;
                           $studentdao = new StudentDao();
                           $iterator = $studentdao->get_childrens($userid)->getIterator();
                           while ($iterator -> valid()) 
                           {
                               echo "<tr>";
                               echo "<td>".$number."</td>";
                               echo "<td>".$iterator->current()->getRegistration()->getNisn()."</td>";
                               echo "<td>".$iterator->current()->getRegistration()->getFullname()."</td>";
                               echo "<td> "
                               . "<a class='btn btn-primary' href='index.php?page=detail_siswa&studentid=".$iterator->current()->getStudentid()."'><span > Detail Siswa </span></a>"
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
