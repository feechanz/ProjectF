<?php
function numberToRupiah($number)
{
    return 'Rp. ' . number_format( $number, 0 , '' , '.' ) . ',-'; 
}
if(isset($_POST['submitjarak']))
{
    $bobotjarakid = $_POST['bobotjarakid'];
    $bobot = $_POST['bobot'];
    
    
    if($bobotjarakdao->update_bobot($bobot, $bobotjarakid))
    {
        echo "<script>alert('Ubah bobot jarak berhasil!');</script>";
    }
    else
    {
        echo "<script>alert('Ubah bobot jarak gagal!');</script>";
    }
}

if(isset($_POST['submitsaudara']))
{
    $bobotsaudaraid = $_POST['bobotsaudaraid'];
    $bobot = $_POST['bobot'];
    
    if($bobotsaudaradao->update_bobot($bobot, $bobotsaudaraid))
    {
        echo "<script>alert('Ubah bobot saudara berhasil!');</script>";
    }
    else
    {
        echo "<script>alert('Ubah bobot saudara gagal!');</script>";
    }
}

if(isset($_POST['submitnilai']))
{
    $bobotnilaiid = $_POST['bobotnilaiid'];
    $bobot = $_POST['bobot'];
    
    if($bobotnilaidao->update_bobot($bobot, $bobotnilaiid))
    {
        echo "<script>alert('Ubah bobot nilai berhasil!');</script>";
    }
    else
    {
        echo "<script>alert('Ubah bobot nilai gagal!');</script>";
    }
}

if(isset($_POST['submitgaji']))
{
    $bobotgajiid = $_POST['bobotgajiid'];
    $bobot = $_POST['bobot'];
    
    if($bobotgajidao->update_bobot($bobot, $bobotgajiid))
    {
        echo "<script>alert('Ubah bobot gaji berhasil!');</script>";
    }
    else
    {
        echo "<script>alert('Ubah bobot gaji gagal!');</script>";
    }
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
    input
    {
        text-align:  center;
    }
</style>


<div class="main_btm">
    <div class="wrap">
        <div class="main">
             <table align="center" class="table table-hover bodytcalonbeasiswa" style="border:2px solid brown">
                <legend>Bobot Jarak Rumah</legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Jarak Rumah </th>
                        <th style="width: 20%;">Bobot </th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                        $jarakprev = 0;
                        $no = 1;
                        $iterator = $bobotjarakdao->get_bobotjarak()->getIterator();
                        while($iterator->valid())
                        {
                            echo "<form method='post' action=''>";
                            
                            echo "<tr>";
                            echo "<td>".$no."<input type='hidden' name='bobotjarakid' value='".$iterator->current()->getBobotjarakid()."'/></td>";
                            
                            echo "<td>";
                            $jarakprev = $iterator->current()->getBatasjarakbawah();
                            $bobot = $iterator->current()->getBobot();
                            $iterator->next();
                            if($iterator->valid())
                            {
                                $jaraknext = $iterator->current()->getBatasjarakbawah();
                                if($jarakprev == 0)
                                {
                                    //awal
                                    echo $jarakprev." <= Jarak <= ".$jaraknext;
                                }
                                else
                                {
                                    echo $jarakprev." < Jarak <= ".$jaraknext;
                                }
                            }
                            else
                            {
                                echo "> ".$jarakprev;
                            }
                            echo "</td>";
                            
                            
                            echo "<td>";
                            echo "<input type='number' name='bobot' value='".$bobot."' min='0' max='1' step='0.01'/>";
                            echo "<input type='submit' name='submitjarak' value='Simpan Bobot' class='btn btn-info'>";
                            echo "</td>";
                            echo "</tr>";
                            
                            echo "</form>";
                            $no++;
                        }
                    ?>
                </tbody>
            </table>
    
            <table align="center" class="table table-hover bodytkriteriabeasiswa" style="border:2px solid brown">
                <legend>Bobot Jumlah Saudara</legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Jumlah Saudara </th>
                        <th style="width: 20%;">Bobot </th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                       
                        $no = 1;
                        $bobotsaudaradao = new BobotsaudaraDao();
                        $iterator = $bobotsaudaradao->get_bobotsaudara()->getIterator();
                        while($iterator->valid())
                        {
                            echo "<form method='post' action=''>";
                            
                            echo "<tr>";
                            echo "<td>".$no."<input type='hidden' name='bobotsaudaraid' value='".$iterator->current()->getBobotsaudaraid()."'/></td>";
                            
                            $batasjumlahbawah = $iterator ->current()->getBatasjumlahbawah();
                            $bobot = $iterator->current()->getBobot();
                            
                            $iterator->next();
                            if($iterator->valid())
                            {
                               echo "<td>";
                               echo $batasjumlahbawah." orang";
                               echo "</td>";
                            }
                            else
                            {
                               echo "<td>";
                               echo ">= ".$batasjumlahbawah." orang";
                               echo "</td>";
                            }
                            
                            
                            echo "<td>";
                            echo "<input type='number' name='bobot' value='".$bobot."' min='0' max='1' step='0.01'/>";
                            echo "<input type='submit' name='submitsaudara' value='Simpan Bobot' class='btn btn-info'>";
                            echo "</td>";
                            echo "</tr>";
                            
                            echo "</form>";
                            $no++;
                        }
                    ?>
                </tbody>
             </table>
           
            <table align="center" class="table table-hover bodytnormalisasibeasiswa" style="border:2px solid brown">
                <legend>Bobot Nilai Rata-Rata</legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Nilai Rata-Rata </th>
                        <th style="width: 20%;">Bobot </th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                        $nilaiprev = 0;
                        $no = 1;
                        $iterator = $bobotnilaidao->get_bobotnilai()->getIterator();
                        while($iterator->valid())
                        {
                            echo "<form method='post' action=''>";
                            
                            echo "<tr>";
                            echo "<td>".$no."<input type='hidden' name='bobotnilaiid' value='".$iterator->current()->getBobotnilaiid()."'/></td>";
                            
                            echo "<td>";
                            if($nilaiprev == 0)
                            {
                                //awal
                                echo $nilaiprev." <= Nilai <= ".$iterator->current()->getBatasnilaiatas();
                            }
                            else
                            {
                                echo $nilaiprev." < Nilai <= ".$iterator->current()->getBatasnilaiatas();
                            }
                            echo "</td>";
                            
                            
                            echo "<td>";
                            echo "<input type='number' name='bobot' value='".$iterator->current()->getBobot()."' min='0' max='1' step='0.01'/>";
                            echo "<input type='submit' name='submitnilai' value='Simpan Bobot' class='btn btn-info'>";
                            echo "</td>";
                            echo "</tr>";
                            
                            echo "</form>";
                            $no++;
                            $nilaiprev = $iterator->current()->getBatasnilaiatas();
                            $iterator->next();
                            
                        }
                    ?>
                </tbody>
             </table>
            
            <table align="center" class="table table-hover bodytresultbeasiswa" style="border:2px solid brown">
                <legend>Bobot Gaji Orang Tua</legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Gaji Orang Tua </th>
                        <th style="width: 20%;">Bobot </th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                        $gajiprev = 0;
                        $no = 0;
                        $iterator = $bobotgajidao->get_bobotgaji()->getIterator();
                        while($iterator->valid())
                        {
                            $no++;
                            $gajiprev = $iterator->current()->getBatasgajibawah();
                            $bobot = $iterator->current()->getBobot();
                            $bobotgajiid = $iterator->current()->getBobotgajiid();
                            $iterator->next();
                            echo "<form method='post' action=''>";
                            
                            echo "<tr>";
                            echo "<td>".$no."<input type='hidden' name='bobotgajiid' value='".$bobotgajiid."'/></td>";
                            echo "<td>";
                            if($iterator->valid())
                            {
                                //belum terakhir
                                if($gajiprev == 0)
                                {
                                    //awal
                                    echo "Gaji < ".numberToRupiah($iterator->current()->getBatasgajibawah());
                                }
                                else
                                {
                                    echo numberToRupiah($gajiprev) ." < Gaji <= ". numberToRupiah($iterator->current()->getBatasgajibawah());
                                }
                            }
                            else
                            {
                                //terakhir
                                echo "Gaji > ".numberToRupiah($gajiprev);
                            }
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='number' name='bobot' value='".$bobot."' min='0' max='1' step='0.01'/>";
                            echo "<input type='submit' name='submitgaji' value='Simpan Bobot' class='btn btn-info'>";
                            echo "</td>";
                            echo "</tr>";
                            
                            echo "</form>";
                        }
                    ?>
                </tbody>
             </table>
        </div>
    </div> 
</div> 