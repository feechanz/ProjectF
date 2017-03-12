<?php
include_once '../function/config.php';
include_once '../function/koneksi.php';
include_once '../dao/MapelkelasDao.php';
include_once '../dao/NilaiDao.php';
include_once '../dao/StudentDao.php';
include_once '../dao/KelasDao.php';
include_once '../dao/PeriodeDao.php';


require_once('TCPDF-master/tcpdf.php');
$kelasid = $_GET['kelasid'];
$mapelkelasdao = new MapelkelasDao();
$nilaidao = new NilaiDao();
$kelasdao = new KelasDao();
$studentdao = new StudentDao();
$kelas = $kelasdao ->get_one_kelasid($kelasid);
$periode = $kelas->getPeriode();


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

///fungsi mencari nilai AKHIR UAS
function cariNilaiAkhirUAS($nilai)
{
    $ulanganpct = $nilai->getMapelkelas()->getLesson()->getUlanganpct();
    $quizpct = $nilai->getMapelkelas()->getLesson()->getQuizpct();
    $ujianpct = $nilai->getMapelkelas()->getLesson()->getUjianpct();
    
    //ulangan
    if($nilai->getUas_ulangan1() != null )
    {
        $nilaiUlangans[0] = $nilai->getUas_ulangan1();
    }
    else
    {
        $nilaiUlangans[0] = 0;
    }
   
    if($nilai->getUas_ulangan2() != null)
    {
        $nilaiUlangans[1] = $nilai->getUas_ulangan2();
    }
    else
    {
        $nilaiUlangans[1] = 0;
    }
    
    if($nilai->getUas_ulangan3() != null )
    {
        $nilaiUlangans[2] = $nilai->getUas_ulangan3();
    }
    else
    {
        $nilaiUlangans[2] = 0;
    }
    
    if($nilai->getUas_ulangan4() != null)
    {
        $nilaiUlangans[3] = $nilai->getUas_ulangan4();
    }
    else
    {
        $nilaiUlangans[3] = 0;
    }
    
    if($nilai->getUas_ulangan5() != null)
    {
        $nilaiUlangans[4] = $nilai->getUas_ulangan5();
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
    if($nilai->getUas_quiz1() != null )
    {
        $nilaiQuizs[0] = $nilai->getUas_quiz1();
    }
    else
    {
        $nilaiQuizs[0] = 0;
    }
   
    if($nilai->getUas_quiz2() != null)
    {
        $nilaiQuizs[1] = $nilai->getUas_quiz2();
    }
    else
    {
        $nilaiQuizs[1] = 0;
    }
    
    if($nilai->getUas_quiz3() != null)
    {
        $nilaiQuizs[2] = $nilai->getUas_quiz3();
    }
    else
    {
        $nilaiQuizs[2] = 0;
    }
    
    if($nilai->getUas_quiz4() != null)
    {
        $nilaiQuizs[3] = $nilai->getUas_quiz4();
    }
    else
    {
        $nilaiQuizs[3] = 0;
    }
    
    if($nilai->getUas_quiz5() != null)
    {
        $nilaiQuizs[4] = $nilai->getUas_quiz5();
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
    $nilaiuas = round($nilai->getUas() * ($ujianpct/100));
    return $nilaiulangan + $nilaiquiz + $nilaiuas;
}

class PDF extends TCPDF {

    function Header() {
        //Pilih font Arial bold 20
        $this->SetFont('Helvetica', 'B', 18);
        //Judul dalam bingkai
        $this->Cell(0, 5, 'Daftar Nilai Kelas Siswa', 0, 1, 'C');
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
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}

$pdf = new PDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Daftar Nilai Kelas Siswa');

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
//"P" = Portrait, "L" = Landscape
//"A4" = paper size , ex : A5, B4, B5, etc
$pdf->AddPage("L","A4");
$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 0, 'Daftar Nilai Siswa Kelas '.$kelas->getClasslevel().$kelas->getNamakelas()." ".$periode->getPeriodename(), 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 9);
//Header Tabel
$tbl = '<table cellspacing="0" cellpadding="3" border="1">';
$tbl .= '<tr bgcolor="lightblue" style="font-weight:bold; text-align:center;">';
$tbl .= '<th style="width: 5%;" rowspan="2">No</th>';
$tbl .= '<th style="width: 10%;" rowspan="2">NISN </th>';
$tbl .= '<th style="width: 15%;" rowspan="2">Nama </th>';

$iterator = $mapelkelasdao->get_mapelkelas_kelasid($kelasid)->getIterator();
$width = 70 / $iterator->count();
while($iterator->valid())
{
    $nama = $iterator->current()->getLesson()->getLessonname();
    $tbl .= '<th style="width: '.$width.'%;" colspan="2">'.$nama.'</th>';
    $iterator->next();
}
$tbl .= '</tr>';

$tbl .= '<tr bgcolor="lightblue" style="font-weight:bold; text-align:center;">';
$iterator = $mapelkelasdao->get_mapelkelas_kelasid($kelasid)->getIterator();
while($iterator->valid())
{
    $tbl .= '<th style="width: '.($width/2).'%">UTS</th>';
    $tbl .= '<th style="width: '.($width/2).'%">UAS</th>';
    $iterator->next();
}

$tbl .= '</tr>';
//Header Tabel


$iterator = $studentdao->get_student_kelasid($kelasid)->getIterator();
$no = 1;
while ($iterator -> valid()) 
{
    if($no % 2)
    {
        $tbl .= '<tr style="text-align:center;">';
    }
    else
    {
        $tbl .= '<tr style="text-align:center;background-color:bisque;">';
    }
    $tbl .= "<td>" . $no . "</td>";
    $tbl .= "<td>" . $iterator->current()->getRegistration()->getNisn() . "</td>";
    $tbl .= "<td>" . $iterator->current()->getRegistration()->getFullname() . "</td>";
    
    $studentid = $iterator->current()->getStudentid();
    $mapelkelass = $mapelkelasdao->get_mapelkelas_kelasid($kelasid)->getIterator();
  
    while($mapelkelass->valid())
    {
        $nilai = $nilaidao->get_one_nilai($mapelkelass->current()->getMapelkelasid(), $studentid);
        $nilaiuts= cariNilaiAkhirUTS($nilai);
        $nilaiuas= cariNilaiAkhirUAS($nilai);
        
        $kkm = $mapelkelass->current()->getLesson()->getMinimumscore();
        
        if($nilaiuts < $kkm)
        {
            $tbl .= '<td style="width:'.($width/2).'%; color:red;">' . $nilaiuts . '</td>';
        }
        else
        {
            $tbl .= '<td style="width:'.($width/2).'%;">' . $nilaiuts . '</td>';
        }
        if($nilaiuas < $kkm)
        {
            $tbl .= '<td style="width:'.($width/2).'%; color:red;">' . $nilaiuas . '</td>';
        }
        else 
        {
            $tbl .= '<td style="width:'.($width/2).'%;">' . $nilaiuas . '</td>';
        }
        $mapelkelass->next();
    }
    
    $tbl .= "</tr>";

    $no++;
    $iterator->next();
}
$tbl .= '</table>';
$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output();
?>
