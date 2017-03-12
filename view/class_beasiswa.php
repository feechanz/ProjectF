<?php
function numberToRupiah($number)
{
    return 'Rp. ' . number_format( $number, 0 , '' , '.' ) . ',-'; 
}

//function cmp($a, $b)
//{
//    return $a->getNilairatarata() <  $b->getNilairatarata();
//}

function nilaiRataRata($studentid)
{
    $result = 0;
    //mencari nilai
    $nilaidao = new NilaiDao();
    $nilais = $nilaidao->get_all_nilai_by_studentid($studentid)->getIterator();
    $jumlah = 0;
    while($nilais->valid())
    {
        $temp_total = 0;
        //uts
        $temp_total += $nilais->current()->getUts_ulangan1();
        $temp_total += $nilais->current()->getUts_ulangan2();
        $temp_total += $nilais->current()->getUts_ulangan3();
        $temp_total += $nilais->current()->getUts_ulangan4();
        $temp_total += $nilais->current()->getUts_ulangan5();
        $temp_total += $nilais->current()->getUts_quiz1();
        $temp_total += $nilais->current()->getUts_quiz2();
        $temp_total += $nilais->current()->getUts_quiz3();
        $temp_total += $nilais->current()->getUts_quiz4();
        $temp_total += $nilais->current()->getUts_quiz5();
        $temp_total += $nilais->current()->getUts();
        
        //uas
        $temp_total += $nilais->current()->getUas_ulangan1();
        $temp_total += $nilais->current()->getUas_ulangan2();
        $temp_total += $nilais->current()->getUas_ulangan3();
        $temp_total += $nilais->current()->getUas_ulangan4();
        $temp_total += $nilais->current()->getUas_ulangan5();
        $temp_total += $nilais->current()->getUas_quiz1();
        $temp_total += $nilais->current()->getUas_quiz2();
        $temp_total += $nilais->current()->getUas_quiz3();
        $temp_total += $nilais->current()->getUas_quiz4();
        $temp_total += $nilais->current()->getUas_quiz5();
        $temp_total += $nilais->current()->getUas();
        
        $temp_total = $temp_total/22;
        $result+=$temp_total;
        $jumlah++;
        $nilais->next();
    }
    $result = floor($result/$jumlah);
    return $result;
}
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
        vertical-align: middle;
    }
    form
    {
        text-align: center;
    }
    a
    {
        cursor:pointer;
    }
</style>
<script type="text/javascript">
        $(document).ready( function(){
              
            $(".headtcalonbeasiswa").click(function(){
                    $(".bodytcalonbeasiswa").fadeToggle();
            });
            $(".headtkriteriabeasiswa").click(function(){
                    $(".bodytkriteriabeasiswa").fadeToggle();
            });
            $(".headtnormalisasibeasiswa").click(function(){
                    $(".bodytnormalisasibeasiswa").fadeToggle();
            });
            $(".headtresultbeasiswa").click(function(){
                    $(".bodytresultbeasiswa").fadeToggle();
            });
            
        });
</script>

<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <h2 class="headtcalonbeasiswa">
                <a><?php if($classlevel != 0)
                    {
                        echo "Tabel Calon Beasiswa Kelas ".$classlevel;
                    }
                    
                    ?>
                </a>
            </h2>
             <table align="center" class="table table-hover bodytcalonbeasiswa" style="border:2px solid brown">
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
                <tbody >
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
                        
                        $nilairatarata= nilaiRataRata($iterator->current()->getStudentid());
                        $calonbeasiswa->setNilairatarata($nilairatarata);
                        $gajiorangtua = $iterator->current()->getRegistration()->getFathermontly()+$iterator->current()->getRegistration()->getMothermontly();
                        $calonbeasiswa->setGajiorangtua($gajiorangtua);
                        $calonbeasiswas[$number] = $calonbeasiswa;
//                        

                        $number++;
                        $iterator->next();
                    }
                    
//                    usort($calonbeasiswas,"cmp");
                    for ($i = 0; $i < $number; $i++)
                    {
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNama()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getKelas()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJarakrumah()." km </td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                       
                        echo "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";

                       
                        echo "</tr>";
                    }
                ?>
                </tbody>
           
             </table>
            <h2 class="headtkriteriabeasiswa">
                <a><?php if($classlevel != 0)
                    {
                        echo "Tabel Bobot Kriteria Beasiswa Kelas ".$classlevel;
                    }
                    
                    ?>
                </a>
            </h2>
            <table align="center" class="table table-hover bodytkriteriabeasiswa" style="border:2px solid brown">
                <thead>
                    <tr >
                        <th style="width: 5%;" rowspan="2">No</th>
                        <th style="width: 15%;" rowspan="2">Nama </th>
                        <th style="width: 5%;" rowspan="2">Kelas </th>
                        <th style="width: 10%;" colspan="2">Jarak Rumah</th>
                        <th style="width: 10%;" colspan="2">Jumlah Saudara </th>
                        <th style="width: 10%;" colspan="2">Nilai Rata-Rata</th>
                        <th style="width: 15%;" colspan="2">Gaji Orang Tua</th>
                       
                    </tr>
                    <tr>
                        <th style="width: 5%;" >Jarak</th>
                        <th style="width: 5%;" >Bobot</th>
                        <th style="width: 5%;" >Saudara </th>
                        <th style="width: 5%;" >Bobot </th>
                        <th style="width: 5%;" >Nilai</th>
                        <th style="width: 5%;" >Bobot</th>
                        <th style="width: 10%;" >Gaji</th>
                        <th style="width: 5%;" >Bobot</th>
                    </tr>
                </thead>
                <tbody >
                <?php
                   
                    
//                    usort($calonbeasiswas,"cmp");
                    for ($i = 0; $i < $number; $i++)
                    {
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNama()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getKelas()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJarakrumah()." km </td>";
                        echo "<td></td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
                        echo "<td></td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                        echo "<td></td>";
                       
                        echo "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";
                        echo "<td></td>";

                       
                        echo "</tr>";
                    }
                ?>
                </tbody>
             </table>
            
            
            <h2 class="headtnormalisasibeasiswa">
                <a><?php if($classlevel != 0)
                    {
                        echo "Tabel Bobot Normalisasi Beasiswa Kelas ".$classlevel;
                    }
                    
                    ?>
                </a>
            </h2>
            <table align="center" class="table table-hover bodytnormalisasibeasiswa" style="border:2px solid brown">
                <thead>
                    <tr >
                        <th style="width: 5%;" rowspan="2">No</th>
                        <th style="width: 15%;" rowspan="2">Nama </th>
                        <th style="width: 5%;" rowspan="2">Kelas </th>
                        <th style="width: 10%;" colspan="2">Jarak Rumah</th>
                        <th style="width: 10%;" colspan="2">Jumlah Saudara </th>
                        <th style="width: 10%;" colspan="2">Nilai Rata-Rata</th>
                        <th style="width: 15%;" colspan="2">Gaji Orang Tua</th>
                       
                    </tr>
                    <tr>
                        <th style="width: 5%;" >Jarak</th>
                        <th style="width: 5%;" >Bobot</th>
                        <th style="width: 5%;" >Saudara </th>
                        <th style="width: 5%;" >Bobot </th>
                        <th style="width: 5%;" >Nilai</th>
                        <th style="width: 5%;" >Bobot</th>
                        <th style="width: 10%;" >Gaji</th>
                        <th style="width: 5%;" >Bobot</th>
                    </tr>
                </thead>
                <tbody >
                <?php
                   
                    
//                    usort($calonbeasiswas,"cmp");
                    for ($i = 0; $i < $number; $i++)
                    {
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNama()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getKelas()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJarakrumah()." km </td>";
                        echo "<td></td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
                        echo "<td></td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                        echo "<td></td>";
                       
                        echo "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";
                        echo "<td></td>";

                       
                        echo "</tr>";
                    }
                ?>
                </tbody>
             </table>
            
            <h2 class="headtresultbeasiswa">
                <a><?php if($classlevel != 0)
                    {
                        echo "Tabel Hasil Hitung Beasiswa Kelas ".$classlevel;
                    }
                    
                    ?>
                </a>
            </h2>
            <table align="center" class="table table-hover bodytresultbeasiswa" style="border:2px solid brown">
                <legend>Semakin atas hasil perhitungan, maka semakin diprioritaskan untuk beasiswa</legend>
                <thead>
                    <tr >
                        <th style="width: 5%;" rowspan="2">Rank</th>
                        <th style="width: 15%;" rowspan="2">Nama </th>
                        <th style="width: 5%;" rowspan="2">Kelas </th>
                         <th style="width: 5%;" rowspan="2">Total Bobot </th>
                        <th style="width: 10%;" colspan="2">Jarak Rumah</th>
                        <th style="width: 10%;" colspan="2">Jumlah Saudara </th>
                        <th style="width: 10%;" colspan="2">Nilai Rata-Rata</th>
                        <th style="width: 15%;" colspan="2">Gaji Orang Tua</th>
                       
                    </tr>
                    <tr>
                        <th style="width: 5%;" >Jarak</th>
                        <th style="width: 5%;" >Bobot</th>
                        <th style="width: 5%;" >Saudara </th>
                        <th style="width: 5%;" >Bobot </th>
                        <th style="width: 5%;" >Nilai</th>
                        <th style="width: 5%;" >Bobot</th>
                        <th style="width: 10%;" >Gaji</th>
                        <th style="width: 5%;" >Bobot</th>
                    </tr>
                </thead>
                <tbody >
                <?php
                   
                    
//                    usort($calonbeasiswas,"cmp");
                    for ($i = 0; $i < $number; $i++)
                    {
                        $totalbobot = 0.894534;
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNama()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getKelas()."</td>";
                        echo "<td>".number_format((float)$totalbobot,2,'.', '')."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJarakrumah()." km </td>";
                        echo "<td></td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
                        echo "<td></td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                        echo "<td></td>";
                       
                        echo "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";
                        echo "<td></td>";

                       
                        echo "</tr>";
                    }
                ?>
                </tbody>
             </table>
        </div>
    </div> 
</div> 