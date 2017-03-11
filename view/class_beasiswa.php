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
                        echo "Tabel Calon Beasiswa Kelas ".$classlevel;
                    }
                    
                    ?>
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 15%;">Nama </th>
                        <th style="width: 5%;">Kelas </th>
                        <th style="width: 10%;">Jarak Rumah</th>
                        <th style="width: 10%;">Jumlah Saudara </th>
                        <th style="width: 10%;">Nilai Rata-Rata</th>
                        <th style="width: 10%;">Gaji Orang Tua</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 0;
                    $iterator = $studentdao ->get_class_student($classlevel)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        $calonbeasiswa = new Calonbeasiswa();
                        
                        $calonbeasiswa->setNama($iterator->current()->getRegistration()->getFullname());
                        $calonbeasiswa->setKelas($iterator->current()->getNamakelas());
                        $calonbeasiswa->setJarakrumah($iterator->current()->getRegistration()->getDistanceschool());
                        $calonbeasiswa->setJumlahsaudara($iterator->current()->getRegistration()->getBrothercount());
                        $calonbeasiswa->setNilairatarata(0);
                        $gajiorangtua = $iterator->current()->getRegistration()->getFathermontly()+$iterator->current()->getRegistration()->getMothermontly();
                        $calonbeasiswa->setGajiorangtua($gajiorangtua);
                        $calonbeasiswas[$number] = $calonbeasiswa;
//                        

                        $number++;
                        $iterator->next();
                    }
                    
                    for ($i = 0; $i < $number; $i++)
                    {
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNama()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getKelas()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJarakrumah()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                       
                        echo "<td>".$calonbeasiswas[$i]->getGajiorangtua()."</td>";

                       
                        echo "</tr>";
                    }
                ?>
                </tbody>
             </table>
        </div>
    </div> 
</div> 