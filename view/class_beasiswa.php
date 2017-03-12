<?php

function numberToRupiah($number)
{
    return 'Rp. ' . number_format( $number, 0 , '' , '.' ) . ',-'; 
}

function cmp($a, $b)
{
    return $a->getTotalbobot() <  $b->getTotalbobot();
}

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
<?php
    //bobot kriteria dll

//bobot jarak
$iterator = $bobotjarakdao->get_bobotjarak()->getIterator();
$no = 0;
while($iterator->valid())
{
    $bobotjaraks[$no]=$iterator->current();
    $no++;
    $iterator->next();
}

//bobot saudara
$iterator = $bobotsaudaradao->get_bobotsaudara()->getIterator();
$no = 0;
while($iterator->valid())
{
    $bobotsaudaras[$no]=$iterator->current();
    $no++;
    $iterator->next();
}

//bobot nilai
$iterator = $bobotnilaidao->get_bobotnilai()->getIterator();
$no = 0;
while($iterator->valid())
{
    $bobotnilais[$no]=$iterator->current();
    $no++;
    $iterator->next();
}

//bobot gaji
$iterator = $bobotgajidao->get_bobotgaji()->getIterator();
$no = 0;
while($iterator->valid())
{
    $bobotgajis[$no]=$iterator->current();
    $no++;
    $iterator->next();
}

//bobot kriteria
$iterator = $bobotkriteriadao->get_bobotkriteria()->getIterator();
$no = 0;
while($iterator->valid())
{
    $bobotkriterias[$no]=$iterator->current();
    $no++;
    $iterator->next();
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
                    $maxbobotjarak = 0;
                    $maxbobotsaudara = 0;
                    $maxbobotnilai = 0;
                    $maxbobotgaji = 0;
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

                        
                        //bobot jarak
                        for($j = 3;$j >= 0;$j-- )
                        {
                            //kalau batas bawah udah lebih kecil daripada jarak
                            if($bobotjaraks[$j]->getBatasjarakbawah() < $calonbeasiswas[$i]->getJarakrumah())
                            {
                                $bobotjarak = $bobotjaraks[$j]->getBobot();
                                $calonbeasiswas[$i]->setBobotjarak($bobotjarak);
                                
                                if($maxbobotjarak < $bobotjarak)
                                {
                                    $maxbobotjarak = $bobotjarak;
                                }
                                break;
                            }
                        }
                        
                        //bobot saudara
                        for($j = 4;$j >= 0;$j-- )
                        {
                            if($bobotsaudaras[$j]->getBatasjumlahbawah() <= $calonbeasiswas[$i]->getJumlahsaudara())
                            {
                                $bobotsaudara = $bobotsaudaras[$j]->getBobot();
                                $calonbeasiswas[$i]->setBobotsaudara($bobotsaudara);
                                
                                if($maxbobotsaudara < $bobotsaudara)
                                {
                                    $maxbobotsaudara = $bobotsaudara;
                                }
                                break;
                            }
                        }
                        
                        //bobot nilai
                        for($j = 0;$j < 4;$j++ )
                        {
                            //kalau nilai batas atas udah lebih besar atau sama daripada nilai rata-rata
                            if($bobotnilais[$j]->getBatasnilaiatas() >= $calonbeasiswas[$i]->getNilairatarata())
                            {
                                $bobotnilai = $bobotnilais[$j]->getBobot();
                                $calonbeasiswas[$i]->setBobotnilai($bobotnilai);
                                
                                if($maxbobotnilai < $bobotnilai)
                                {
                                    $maxbobotnilai = $bobotnilai;
                                }
                                break;
                            }
                        }
                        for($j = 3;$j >= 0;$j-- )
                        {
                            //kalau gaji batas bawah uda lebih kecil dari pada gaji orang tua
                            if($bobotgajis[$j]->getBatasgajibawah() < $calonbeasiswas[$i]->getGajiorangtua())
                            {
                                $bobotgaji = $bobotgajis[$j]->getBobot();
                                $calonbeasiswas[$i]->setBobotgaji($bobotgaji);
                                
                                if($maxbobotgaji < $bobotgaji)
                                {
                                    $maxbobotgaji = $bobotgaji;
                                }
                                break;
                            }
                        }
                        //bobot gaji
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
                        echo "<td>".$calonbeasiswas[$i]->getBobotjarak()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotsaudara()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotnilai()."</td>";
                       
                        echo "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotgaji()."</td>";

                        
                        echo "</tr>";
                        
                        //set bobot normalisasi
                        $bobotjaraknormalisasi = $calonbeasiswas[$i]->getBobotjarak()/$maxbobotjarak;
                        $calonbeasiswas[$i]->setBobotjaraknormalisasi(number_format((float)$bobotjaraknormalisasi,2,'.', ''));
                        
                        $bobotsaudaranormalisasi = $calonbeasiswas[$i]->getBobotsaudara() / $maxbobotsaudara;
                        $calonbeasiswas[$i]->setBobotsaudaranormalisasi(number_format((float)$bobotsaudaranormalisasi,2,'.', ''));
                        
                        $bobotnilainormalisasi = $calonbeasiswas[$i]->getBobotnilai() / $maxbobotnilai;
                        $calonbeasiswas[$i]->setBobotnilainormalisasi(number_format((float)$bobotnilainormalisasi,2,'.', ''));
                       
                        $bobotgajinormalisasi = $calonbeasiswas[$i]->getBobotgaji() / $maxbobotgaji;
                        $calonbeasiswas[$i]->setBobotgajinormalisasi(number_format((float)$bobotgajinormalisasi,2,'.', ''));
                        
                        //set bobot normalisasi * kriteria
                        $bobotgajikriteria = $bobotgajinormalisasi * $bobotkriterias[0]->getBobot();
                        $calonbeasiswas[$i]->setBobotgajikriteria(number_format((float)$bobotgajikriteria,2,'.', ''));
                        $bobotjarakkriteria = $bobotjaraknormalisasi * $bobotkriterias[1]->getBobot();
                        $calonbeasiswas[$i]->setBobotjarakkriteria(number_format((float)$bobotjarakkriteria,2,'.', ''));
                        $bobotnilaikriteria = $bobotnilainormalisasi * $bobotkriterias[2]->getBobot();
                        $calonbeasiswas[$i]->setBobotnilaikriteria(number_format((float)$bobotnilaikriteria,2,'.', ''));
                        $bobotsaudarakriteria = $bobotsaudaranormalisasi * $bobotkriterias[3]->getBobot();
                        $calonbeasiswas[$i]->setBobotsaudarakriteria(number_format((float)$bobotsaudarakriteria,2,'.', ''));
                        
                        
                        //set total bobot
                        $totalbobot = $bobotgajikriteria+ $bobotjarakkriteria + $bobotnilaikriteria + $bobotsaudarakriteria;
                        $calonbeasiswas[$i]->setTotalbobot($totalbobot);
                        
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
                        echo "<td>".$calonbeasiswas[$i]->getBobotjaraknormalisasi()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotsaudaranormalisasi()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotnilainormalisasi()."</td>";
                       
                        echo "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotgajinormalisasi()."</td>";

                       
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
                <legend>Semakin atas hasil perhitungan, maka semakin diprioritaskan untuk beasiswa<br>
                    <a class='btn btn-info' href="PDF/BeasiswaReport.php" target="_blank">Print Hasil Perhitungan Beasiswa</a>
                </legend>
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
                   
                    
                    usort($calonbeasiswas,"cmp");
                    for ($i = 0; $i < $number; $i++)
                    {
                        $totalbobot = $calonbeasiswas[$i]->getTotalbobot();
                        echo "<tr>";
                        echo "<td>".($i+1)."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNama()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getKelas()."</td>";
                        echo "<td>".number_format((float)$totalbobot,3,'.', '')."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJarakrumah()." km </td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotjarakkriteria()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotsaudarakriteria()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotnilaikriteria()."</td>";
                       
                        echo "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";
                        echo "<td>".$calonbeasiswas[$i]->getBobotgajikriteria()."</td>";

                       
                        echo "</tr>";
                    }
                    $_SESSION['calonbeasiswas']= $calonbeasiswas;
                    $_SESSION['number']=$number;
                ?>
                </tbody>
             </table>
        </div>
    </div> 
</div> 