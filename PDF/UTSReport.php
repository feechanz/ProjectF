<?php
include_once '../function/config.php';
include_once '../function/koneksi.php';
include_once '../dao/StudentDao.php';
include_once '../dao/KelasDao.php';
include_once '../dao/PeriodeDao.php';
include_once '../dao/NilaiDao.php';
include_once '../dao/NilaiekskulDao.php';
include_once '../dao/StudentkelasDao.php';

require_once('TCPDF-master/tcpdf.php');
$kelasid = $_POST['kelasid'];
$studentid = $_POST['studentid'];
$kelakuan = $_POST['kelakuan'];
$kerajinan = $_POST['kerajinan'];
$kerapihan = $_POST['kerapihan'];
$catatan = $_POST['catatan'];
$kelasdao = new KelasDao();
$periodedao = new PeriodeDao();
$ekskuldao = new EkskulDao();
$studentdao = new StudentDao();
$nilaidao = new NilaiDao();
$studentkelasdao = new StudentkelasDao();
$nilaiekskuldao = new NilaiekskulDao();

 

$studentkelas = $studentkelasdao ->get_one_studentkelas($studentid, $kelasid);
$student = $studentdao->get_one_student($studentid);
$kelas = $kelasdao->get_one_kelasid($kelasid);
$periodeid = $kelas->getPeriodeid();
$periode = $periodedao->get_one_periode($periodeid);

$gender = "L";
if($student->getRegistration()->getGender() != "male")
{
    $gender = "P";
}

$kelasromawi = "VI";
$kelashuruf = "Enam";
if($kelas->getClasslevel() == 1)
{
    $kelasromawi = "I";
    $kelashuruf = "Satu";
}
else if($kelas->getClasslevel() == 2)
{
    $kelasromawi = "II";
    $kelashuruf = "Dua";
}
else if($kelas->getClasslevel() == 3)
{
    $kelasromawi = "III";
    $kelashuruf = "Tiga";
}
else if($kelas->getClasslevel() == 4)
{
    $kelasromawi = "IV";
    $kelashuruf = "Empat";
}
else if($kelas->getClasslevel() == 5)
{
    $kelasromawi = "V";
    $kelashuruf = "Lima";
}

///fungsi mencari nilai AKHIR UTS
function cariNilaiAkhirUTS($nilai)
{
    $ulanganpct = $nilai->getMapelkelas()->getLesson()->getUlanganpct();
    $quizpct = $nilai->getMapelkelas()->getLesson()->getQuizpct();
    $ujianpct = $nilai->getMapelkelas()->getLesson()->getUjianpct();
    
    //ulangan
    if($nilai->getUts_ulangan1() != null )
    {
        $nilaiUlangans[0] = $nilai->getUts_ulangan1();
    }
    else
    {
        $nilaiUlangans[0] = 0;
    }
   
    if($nilai->getUts_ulangan2() != null)
    {
        $nilaiUlangans[1] = $nilai->getUts_ulangan2();
    }
    else
    {
        $nilaiUlangans[1] = 0;
    }
    
    if($nilai->getUts_ulangan3() != null )
    {
        $nilaiUlangans[2] = $nilai->getUts_ulangan3();
    }
    else
    {
        $nilaiUlangans[2] = 0;
    }
    
    if($nilai->getUts_ulangan4() != null)
    {
        $nilaiUlangans[3] = $nilai->getUts_ulangan4();
    }
    else
    {
        $nilaiUlangans[3] = 0;
    }
    
    if($nilai->getUts_ulangan5() != null)
    {
        $nilaiUlangans[4] = $nilai->getUts_ulangan5();
    }
    else
    {
        $nilaiUlangans[4] = 0;
    }
    
    rsort($nilaiUlangans);
    $nilaiulangan = ($nilaiUlangans[0] + $nilaiUlangans[1] + $nilaiUlangans[2])/3;
    $nilaiulangan *= ($ulanganpct/100);
    $nilaiulangan = round($nilaiulangan);
    //quiz
    if($nilai->getUts_quiz1() != null )
    {
        $nilaiQuizs[0] = $nilai->getUts_quiz1();
    }
    else
    {
        $nilaiQuizs[0] = 0;
    }
   
    if($nilai->getUts_quiz2() != null)
    {
        $nilaiQuizs[1] = $nilai->getUts_quiz2();
    }
    else
    {
        $nilaiQuizs[1] = 0;
    }
    
    if($nilai->getUts_quiz3() != null)
    {
        $nilaiQuizs[2] = $nilai->getUts_quiz3();
    }
    else
    {
        $nilaiQuizs[2] = 0;
    }
    
    if($nilai->getUts_quiz4() != null)
    {
        $nilaiQuizs[3] = $nilai->getUts_quiz4();
    }
    else
    {
        $nilaiQuizs[3] = 0;
    }
    
    if($nilai->getUts_quiz5() != null)
    {
        $nilaiQuizs[4] = $nilai->getUts_quiz5();
    }
    else
    {
        $nilaiQuizs[4] = 0;
    }
    
    rsort($nilaiQuizs);
    $nilaiquiz = ($nilaiQuizs[0] + $nilaiQuizs[1] + $nilaiQuizs[2])/3;
    $nilaiquiz *= ($quizpct/100);
    $nilaiquiz = round($nilaiquiz);
    
    //nilai UJIAN
    $nilaiuts = round($nilai->getUts() * ($ujianpct/100));
    return $nilaiulangan + $nilaiquiz + $nilaiuts;
}

//fungsi mengubah angka 1-10 dari angka menjadi huruf
function numberToNameOneToTen($number)
{
    switch ($number)
    {
        case 1:
            $result = "Satu";
            break;
        case 2:
            $result = "Dua";
            break;
        case 3:
            $result = "Tiga";
            break;
        case 4:
            $result = "Empat";
            break;
        case 5:
            $result = "Lima";
            break;
        case 6:
            $result = "Enam";
            break;
        case 7:
            $result = "Tujuh";
            break;
        case 8:
            $result = "Delapan";
            break;
        case 9:
            $result = "Sembilan";
            break;
        default:
            $result = "Nol";
    }
    return $result;
}

//fungsi mencari nama angka
function numberToName($number)
{
    if(floor($number / 10) >= 10)
    {
        //100
        $result = "Seratus";
    }
    else if(floor($number / 10) > 0)
    {
        //10-99
        if($number < 20)
        {
            //10 sampai 19
            if($number == 10)
            {
                $result = "Sepuluh";
            }
            else if($number == 11)
            {
                $result = "Sebelas";
            }
            else
            {
                //12-19
                $angka = $number % 10;
                $result = numberToNameOneToTen($angka)." Belas";
                
            }
        }
        else
        {
            //20-99
            $angka = floor($number / 10);
            $result = numberToNameOneToTen($angka)." Puluh";
            $angka = $number % 10;
            if($angka != 0)
            {
                $result.= " ".numberToNameOneToTen($angka);
            }
        }
    }
    else
    {
        //dibawah 10
        $result = numberToNameOneToTen($number);
    }
    
    return $result;
}
class PDF extends TCPDF {

    function Header() {
        //Pilih font Arial bold 20
        $this->SetFont('Helvetica', 'B', 18);
        //Judul dalam bingkai
        $this->Cell(0, 5, 'Laporan Hasil Penilaian Semester Ganjil', 0, 1, 'C');
        $this->SetFont('Helvetica', 'B', 16);
        $this->Cell(0, 15, 'Sekolah Dasar', 0, 0, 'C');
        //Ganti baris
        $this->Ln(20);
    }

    function Footer() {
        //Geser posisi ke 1,5 cm dari bawah
        $this->SetY(-15);
        //Pilih font Arial italic 8
        $this->SetFont('Helvetica', 'I', 8);
        //Tampilkan nomor halaman rata tengah
        $this->Cell(0, 10, 'Halaman ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}

$pdf = new PDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Laporan Hasil Penilaian Semester Ganjil '.$periode->getPeriodename());

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 048', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
// add a page
$pdf->AddPage('P', 'A4');

$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 0, 'Laporan Hasil Penilaian Semester Ganjil '.$periode->getPeriodename(), 1, 1, 'C');
$pdf->Cell(0, 0, '', 0, 1, 'C');
$pdf->SetFont('Helvetica', '', 9);



//Header Tabel
$tbl = '<table cellspacing="0" cellpadding="3" border="1">';
$tbl .= '<tr style="text-align:center;">';
$tbl .= '<th style="width: 10%;"><b>No</b></th>';
$tbl .= '<th style="width: 35%;"><b>Nama Lengkap Siswa </b></th>';
$tbl .= '<th style="width: 10%;"><b>L/P</b></th>';
$tbl .= '<th style="width: 25%;"><b>NISN</b></th>';
$tbl .= '<th style="width: 20%;"><b>Kelas</b></th>';
$tbl .= '</tr>';
//Header Tabel
$tbl .= '<tr style="text-align:center;">';
$tbl .= '<th style="width: 10%;">1</th>';
$tbl .= '<th style="width: 35%;">'.$student->getRegistration()->getFullname().'</th>';
$tbl .= '<th style="width: 10%;">'.$gender.'</th>';
$tbl .= '<th style="width: 25%;">'.$student->getRegistration()->getNisn().'</th>';
$tbl .= '<th style="width: 20%;">'.$kelasromawi.' ('.$kelashuruf.')'.'</th>';
$tbl .= '</tr>';
$tbl .= '</table><br><br>';

//Report Header Tabel
$tbl .= '<table cellspacing="0" cellpadding="3" border="1" cellpadding="5">';
$tbl .= '<tr style="text-align:center;" >';
$tbl .= '<th style="width: 10%;" rowspan="2" ><b>No</b></th>';
$tbl .= '<th style="width: 25%;" rowspan="2"><b>Mata Pelajaran </b></th>';
$tbl .= '<th style="width: 10%;" rowspan="2"><b>KKM </b></th>';
$tbl .= '<th style="width: 35%;" colspan="2"><b>Nilai</b></th>';
$tbl .= '<th style="width: 20%;" rowspan="2"><b>Deskripsi Kemajuan Belajar</b></th>';
$tbl .= '</tr>';

$tbl .= '<tr style="text-align:center;">';
$tbl .= '<th style="width: 10%;"><b>Angka</b></th>';
$tbl .= '<th style="width: 25%;"><b>Huruf</b></th>';
$tbl .= '</tr>';
//Report Body Tabel
$number=1;
$jumlah = 0;
$iterator = $nilaidao->get_nilai_by_studentid($studentid, $kelasid)->getIterator();
while ($iterator -> valid()) 
{
    $tbl .= '<tr style="text-align:center;">';
    $tbl .= '<td>'.$number.'.</td>';
    $tbl .= '<td >'.$iterator->current()->getMapelkelas()->getLesson()->getLessonname().'</td>';
    //KKM
    $kkm = $iterator->current()->getMapelkelas()->getLesson()->getMinimumscore();
    $tbl .= '<td>'.$kkm.'</td>';
    //nilai angka
    $nilai = cariNilaiAkhirUTS($iterator->current());
    //$nilai = 100;
    if($nilai < $kkm)
    {
        $tbl .= '<td style="color:red;">'.$nilai.'</td>';
    }
    else
    {
        $tbl .= '<td>'.$nilai.'</td>';
    }
    //nilai huruf
    $nilaihuruf = numberToName($nilai);
    if($nilai < $kkm)
    {
        $tbl .= '<td style="color:red;">'.$nilaihuruf.'</td>';
    }
    else
    {
        $tbl .= '<td>'.$nilaihuruf.'</td>';
    }
    //Kemajuan
    $kemajuanbelajar = "KKM Tidak Tercapai";
    if($kkm == $nilai)
    {
        $kemajuanbelajar = "KKM Tercapai / Tuntas";
    }
    else if($kkm < $nilai)
    {
        $kemajuanbelajar = "KKM Terlampaui";
    }
    if($nilai < $kkm)
    {
        $tbl .= '<td style="color:red;">'.$kemajuanbelajar.'</td>';
    }
    else
    {
        $tbl .= '<td>'.$kemajuanbelajar.'</td>';
    }
    $tbl .= '</tr>';
    
    $jumlah += $nilai;
    $number++;
    $iterator->next();
}
//Jumlah Nilai
$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td colspan="2">Jumlah </td>';
$tbl .= '<td>'.$jumlah.'</td>';
$tbl .= '<td colspan="3"> </td>';
$tbl .= '</tr>';


//Rata-Rata Nilai
$ratarata = $jumlah/($number-1);
$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td colspan="2">Nilai Rata-Rata </td>';
$tbl .= '<td>'.round($ratarata).'</td>';
$tbl .= '<td colspan="3"> </td>';
$tbl .= '</tr>';


//Peringkat 
$students = $studentdao->get_student_kelasid($kelasid)->getIterator();


$index=0;


$totalrank = $students->count();

$rank = 1;
while($students->valid())
{
    $iterator = $nilaidao->get_nilai_by_studentid($students->current()->getStudentid(), $kelasid)->getIterator();
    $tmp = 0;
    while($iterator->valid())
    {
        $totalnilai = cariNilaiAkhirUTS($iterator->current());
        $tmp += $totalnilai;
        $iterator->next();
    }
    if($tmp > $jumlah)
    {
        $rank++;
    }

    $students->next();
}


$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td colspan="6">Peringkat Kelas ke : '.$rank.' dari '.$totalrank.' siswa </td>';
$tbl .= '</tr>';

$tbl .= '</table><br><br>';

//Kegiatan Ekskul
$tbl .= '<table cellspacing="0" cellpadding="3" border="1" cellpadding="5">';
$tbl .= '<tr style="text-align:center;" >';
$tbl .= '<th style="width: 100%;" colspan="3" ><b>Kegiatan Ekstrakurikuler dan Kepribadian</b></th>';
$tbl .= '</tr>';
//Isi
$tbl .= '<tr >';
$tbl .= '<td style="width: 35%; text-align:center;" rowspan="3"><b>Kegiatan Ekstrakurikuler</b></td>';

//list ekskul 
$iterator = $nilaiekskuldao->get_nilaiekskul_studentid($studentid)->getIterator();

//1
$ekskuldiambil = "";
if($iterator->valid())
{
    $ekskuldiambil = $iterator->current()->getEkskul()->getNamaekskul();
    //$nilaiekskul = $iterator->current()->getNilaimutu();
    $iterator->next();
}

$tbl .= '<td style="width: 65%;" colspan="2">1. '.$ekskuldiambil.'</td>';
$tbl .= '</tr>';

$ekskuldiambil = "";
if($iterator->valid())
{
    $ekskuldiambil = $iterator->current()->getEkskul()->getNamaekskul();
    $iterator->next();
}
//2
$tbl .= '<tr>';
$tbl .= '<td style="width: 65%;" colspan="2">2. '.$ekskuldiambil.'</td>';
$tbl .= '</tr>';

$ekskuldiambil = "";
if($iterator->valid())
{
    $ekskuldiambil = $iterator->current()->getEkskul()->getNamaekskul();
    $iterator->next();
}
//3
$tbl .= '<tr>';
$tbl .= '<td style="width: 65%;" colspan="2">3. '.$ekskuldiambil.'</td>';
$tbl .= '</tr>';

//Kepribadian   

//Isi
$tbl .= '<tr >';
$tbl .= '<td style="width: 35%; text-align:center;" rowspan="3"><b>Kepribadian</b></td>';

$tbl .= '<td style="width: 25%;" >1. Kelakuan</td>';
$tbl .= '<td style="width: 40%;" >Nilai : '.$kelakuan.'</td>';
$tbl .= '</tr>';

//2
$tbl .= '<tr>';
$tbl .= '<td style="width: 25%;" >2. Kerajinan</td>';
$tbl .= '<td style="width: 40%;" >Nilai : '.$kerajinan.'</td>';
$tbl .= '</tr>';
//2
$tbl .= '<tr>';
$tbl .= '<td style="width: 25%;" >3. Kerapihan</td>';
$tbl .= '<td style="width: 40%;" >Nilai : '.$kerapihan.'</td>';
$tbl .= '</tr>';

//Ketidak Hadiran
$tbl .= '<tr >';
$tbl .= '<td style="width: 35%; text-align:center;" rowspan="3"><b>Ketidakhadiran</b></td>';

$tbl .= '<td style="width: 25%;" >1. Sakit</td>';
$tbl .= '<td style="width: 40%;" >'.$studentkelas->getSakit().' hari</td>';
$tbl .= '</tr>';

//2
$tbl .= '<tr>';
$tbl .= '<td style="width: 25%;" >2. Izin</td>';
$tbl .= '<td style="width: 40%;" >'.$studentkelas->getIzin().' hari</td>';
$tbl .= '</tr>';
//2
$tbl .= '<tr>';
$tbl .= '<td style="width: 25%;" >3. Tanpa Keterangan</td>';
$tbl .= '<td style="width: 40%;" >'.$studentkelas->getTanpaketerangan().' hari</td>';
$tbl .= '</tr>';


//Catatan untuk orangtua wali
$tbl .= '<tr>';
$tbl .= '<td style="width: 100%;">Catatan untuk diperhatikan Orang Tua / Wali : <br>'.$catatan.'</td>';

$tbl .= '</tr>';
$tbl .= '</table><br><br>';


//header ttd
$tbl .= '<table>';

$tbl .= '<tr>';
$tbl .= '<td style="width: 60%;"></td>';
$tbl .= '<td style="width: 15%;">Diberikan di</td>';
$tbl .= '<td style="width: 3%;">:</td>';
$tbl .= '<td style="width: 22%;">______________________</td>';
$tbl .= '</tr>';

$tbl .= '<tr>';
$tbl .= '<td style="width: 60%;"></td>';
$tbl .= '<td style="width: 15%;">Tanggal</td>';
$tbl .= '<td style="width: 3%;">:</td>';
$tbl .= '<td style="width: 22%;">______________________</td>';
$tbl .= '</tr>';

//ttd
$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td style="width: 50%;" colspan="2">Mengetahui : </td>';
$tbl .= '<td style="width: 50%;" colspan="2"></td>';
$tbl .= '</tr>';

$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td style="width: 50%;" colspan="2">Orang Tua / Wali *)</td>';
$tbl .= '<td style="width: 50%;" colspan="2">Wali Kelas</td>';
$tbl .= '</tr>';

$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td style="width: 50%;" colspan="2"><br><br><br><br></td>';
$tbl .= '<td style="width: 50%;" colspan="2"><br><br><br><br></td>';
$tbl .= '</tr>';

$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td style="width: 50%;" colspan="2">[....................................]</td>';
$tbl .= '<td style="width: 50%;" colspan="2">[ '.$kelas->getTeacher()->getFullname().' ]</td>';
$tbl .= '</tr>';
$tbl .= '<tr style="text-align:center;">';
$tbl .= '<td style="width: 50%;" colspan="2"></td>';
$tbl .= '<td style="width: 50%;" colspan="2">NIP : '.$kelas->getTeacher()->getNip().'</td>';
$tbl .= '</tr>';
$tbl .= '</table><br>';


$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output();
?>
