<?php

    if(isset($_GET['classlevel']))
    {
        $classlevel = $_GET['classlevel'];
//query
//SELECT s.studentid, COALESCE(MAX(classlevel),0) FROM `studentkelas` sk 
//JOIN `student` s
//ON s.studentid = sk.studentid
//JOIN `kelas` k 
//ON k.kelasid = sk.kelasid
//WHERE s.studentid = 2
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
                    <?php if($classlevel != 0)
                    {
                        echo "Tabel Siswa Kelas ".$classlevel;
                    }
                    else
                    {
                        echo "Tabel Siswa Baru";
                    }
                    ?>
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
                    $iterator = $studentdao ->get_class_student($classlevel)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getRegistration()->getFullname()."</td>";
                        $gender ="Perempuan";
                        if($iterator->current()->getRegistration()->getGender() == "male")
                        {
                            $gender = "Laki-Laki";
                        }
                        echo "<td>".$gender."</td>";
                        echo "<td>".$iterator->current()->getRegistration()->getBirthdate()."</td>";
                        echo "<td>".$iterator->current()->getRegistration()->getDisability()."</td>";
                        $status = $iterator->current()->getStatus();
                        $status = getStudentStatus($status);
                        echo "<td>".$status."</td>";

                        echo "<td> "
                        . "<a class='btn btn-primary' href='index.php?page=add_student_class&studentid=".$iterator->current()->getStudentid()."&classlevel=".$classlevel."' ><span > Atur Kelas </span></a>"
                        . "<a href='index.php?page=detail_student&studentid=".$iterator->current()->getStudentid()."' class='btn btn-info'><span> Detail </span></a>"
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