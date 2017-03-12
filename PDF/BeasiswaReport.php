<?php
include_once '../dao/Calonbeasiswa.php';    
session_start();
include_once '../function/config.php';
include_once '../function/koneksi.php';

function numberToRupiah($number)
{
    return 'Rp. ' . number_format( $number, 0 , '' , '.' ) . ',-'; 
}
require_once('TCPDF-master/tcpdf.php');
$calonbeasiswas = $_SESSION['calonbeasiswas'];

$number = $_SESSION['number'];
class PDF extends TCPDF {

    function Header() {
        //Pilih font Arial bold 20
        $this->SetFont('Helvetica', 'B', 18);
        //Judul dalam bingkai
        $this->Cell(0, 5, 'Daftar Calon Penerima Beasiswa', 0, 1, 'C');
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
$pdf->SetTitle('Daftar Calon Penerima Beasiswa');

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
$pdf->AddPage('L','A4');

$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(0, 0, 'Calon Penerima Beasiswa', 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 9);
//Header Tabel
$tbl = '<table cellspacing="0" cellpadding="3" border="1">';
$tbl .= '<tr style="text-align:center;">';
$tbl .= '<th style="width: 5%;" rowspan="2">Rank</th>';
$tbl .= '<th style="width: 15%;" rowspan="2">Nama </th>';
$tbl .= '<th style="width: 10%;" rowspan="2">Kelas </th>';
$tbl .= '<th style="width: 10%;" rowspan="2">Total Bobot </th>';
$tbl .= '<th style="width: 14%;" colspan="2">Jarak Rumah</th>';
$tbl .= '<th style="width: 14%;" colspan="2">Jumlah Saudara </th>';
$tbl .= '<th style="width: 14%;" colspan="2">Nilai Rata-Rata</th>';
$tbl .= '<th style="width: 20%;" colspan="2">Gaji Orang Tua</th>';
$tbl .= '</tr>';

$tbl .= '<tr style="text-align:center;">';
$tbl .= '<th style="width: 7%;" >Jarak</th>';
$tbl .= '<th style="width: 7%;" >Bobot</th>';
$tbl .= '<th style="width: 7%;" >Saudara </th>';
$tbl .= '<th style="width: 7%;" >Bobot </th>';
$tbl .= '<th style="width: 7%;" >Nilai</th>';
$tbl .= '<th style="width: 7%;" >Bobot</th>';
$tbl .= '<th style="width: 13%;" >Gaji</th>';
$tbl .= '<th style="width: 7%;" >Bobot</th>';
$tbl .= '</tr>';
//Header Tabel

for ($i = 0; $i < $number; $i++)
{
    $totalbobot = $calonbeasiswas[$i]->getTotalbobot();
    $tbl .= '<tr style="text-align:center;">';
    $tbl .= "<td>".($i+1)."</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getNama()."</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getKelas()."</td>";
    $tbl .= "<td>".number_format((float)$totalbobot,3,'.', '')."</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getJarakrumah()." km </td>";
    
    $tbl .= "<td>".$calonbeasiswas[$i]->getBobotjarakkriteria()."</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getJumlahsaudara()." orang</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getBobotsaudarakriteria()."</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getNilairatarata()."</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getBobotnilaikriteria()."</td>";
    $tbl .= "<td>".numberToRupiah($calonbeasiswas[$i]->getGajiorangtua()) ."</td>";
    $tbl .= "<td>".$calonbeasiswas[$i]->getBobotgajikriteria()."</td>";
    $tbl .= "</tr>";

}
$tbl .= '</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output();
?>
