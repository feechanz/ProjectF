<?php
include_once '../function/config.php';
include_once '../function/koneksi.php';
include_once '../dao/StudentDao.php';
include_once '../dao/KelasDao.php';
include_once '../dao/PeriodeDao.php';

function getStudentStatus($status)
{
    $result = "Drop Out";
    if($status == 1)
    {
        $result = "Aktif";
    }
    else if($status == 2)
    {
        $result = "Lulus";
    }
    else if($status == 3)
    {
        $result = "Alumni";
    }
    return $result;
}

require_once('TCPDF-master/tcpdf.php');
$kelasid = $_GET['kelasid'];
$kelasdao = new KelasDao();
$studentdao = new StudentDao();
$kelas = $kelasdao ->get_one_kelasid($kelasid);
$periode = $kelas->getPeriode();

class PDF extends TCPDF {

    function Header() {
        //Pilih font Arial bold 20
        $this->SetFont('Helvetica', 'B', 18);
        //Judul dalam bingkai
        $this->Cell(0, 5, 'Daftar Siswa', 0, 1, 'C');
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
$pdf->SetTitle('Daftar Siswa');

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
$pdf->AddPage();

$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 0, 'Daftar Siswa Kelas '.$kelas->getClasslevel().$kelas->getNamakelas()." ".$periode->getPeriodename(), 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 9);
//Header Tabel
$tbl = '<table cellspacing="0" cellpadding="3" border="1">';
$tbl .= '<tr bgcolor="lightblue" style="font-weight:bold; text-align:center;">';
$tbl .= '<th style="width: 5%;">No</th>';
$tbl .= '<th style="width: 20%;">NISN </th>';
$tbl .= '<th style="width: 20%;">Nama </th>';
$tbl .= '<th style="width: 15%;">Jenis Kelamin</th>';
$tbl .= '<th style="width: 15%;">Tanggal Lahir </th>';
$tbl .= '<th style="width: 15%;">Disabilitas </th>';
$tbl .= '<th style="width: 10%;">Status </th>';
$tbl .= '</tr>';
//Header Tabel


$iterator = $studentdao->get_student_kelasid($kelasid)->getIterator();
$no = 1;
while ($iterator -> valid()) 
{
    $tbl .= '<tr style="text-align:center;">';
    $tbl .= "<td>" . $no . "</td>";
    $tbl .= "<td>" . $iterator->current()->getRegistration()->getNisn() . "</td>";
    $tbl .= "<td>" . $iterator->current()->getRegistration()->getFullname() . "</td>";
    $gender ="Perempuan";
    if($iterator->current()->getRegistration()->getGender() == "male")
    {
        $gender = "Laki-Laki";
    }
    $tbl .= "<td>" . $gender . "</td>";
    $tbl .= "<td>" . $iterator->current()->getRegistration()->getBirthdate() . "</td>";
    $tbl .= "<td>" . $iterator->current()->getRegistration()->getDisability() . "</td>";
    $status = $iterator->current()->getStatus();
    $status = getStudentStatus($status);
    $tbl .= "<td>" . $status . "</td>";
    $tbl .= "</tr>";

    $no++;
    $iterator->next();
}
$tbl .= '</table>';
$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output();
?>
