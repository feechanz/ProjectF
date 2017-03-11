<?php
include_once '../function/config.php';
include_once '../function/koneksi.php';
include_once '../dao/SlotjadwalDao.php';
include_once '../dao/JadwalpelajaranDao.php';
include_once '../dao/KelasDao.php';
include_once '../dao/PeriodeDao.php';

require_once('TCPDF-master/tcpdf.php');
$kelasid = $_GET['kelasid'];
$slotjadwaldao = new SlotjadwalDao();
$kelasdao = new KelasDao();
$jadwalpelajarandao = new JadwalpelajaranDao();
$kelas = $kelasdao ->get_one_kelasid($kelasid);
$periode = $kelas->getPeriode();

class PDF extends TCPDF {

    function Header() {
        //Pilih font Arial bold 20
        $this->SetFont('Helvetica', 'B', 18);
        //Judul dalam bingkai
        $this->Cell(0, 5, 'Jadwal Pelajaran', 0, 1, 'C');
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
$pdf->SetTitle('Jadwal Pelajaran');

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
$pdf->Cell(0, 0, 'Jadwal Kelas '.$kelas->getClasslevel().$kelas->getNamakelas()." ".$periode->getPeriodename(), 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 9);
//Header Tabel
$tbl = '<table cellspacing="0" cellpadding="3" border="1">';
$tbl .= '<tr bgcolor="lightblue" style="font-weight:bold; text-align:center;">';
$tbl .= '<th style="width: 10%;" >Waktu</th>';
$tbl .= '<th style="width: 15%;" >Senin</th>';
$tbl .= '<th style="width: 15%;" >Selasa</th>';
$tbl .= '<th style="width: 15%;" >Rabu</th>';
$tbl .= '<th style="width: 15%;" >Kamis</th>';
$tbl .= '<th style="width: 15%;" >Jumat</th>';
$tbl .= '<th style="width: 15%;" >Sabtu</th>';
$tbl .= '</tr>';
//Header Tabel


$iterator = $slotjadwaldao->get_slotjadwal_by_kelasid($kelasid)->getIterator();
while ($iterator -> valid()) 
{
    $time = $iterator->current()->getAwal()." - ".$iterator->current()->getAkhir();
    $tbl .= '<tr style="text-align:center;">';
    $tbl .= "<td>" . $time . "</td>";
    $jadwalsenin = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Senin');
    if(isset($jadwalsenin))
    {
        $tbl .= "<td>" .$jadwalsenin->getMapelkelas()->getLesson()->getLessonname(). "</td>";
    }
    else
    {
        $tbl .= "<td></td>";
    }
    $jadwalselasa = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Selasa');
    if(isset($jadwalselasa))
    {
        $tbl .= "<td>" .$jadwalselasa->getMapelkelas()->getLesson()->getLessonname(). "</td>";
    }
    else
    {
        $tbl .= "<td></td>";
    }
    $jadwalrabu = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Rabu');
    if(isset($jadwalrabu))
    {          
        $tbl .= "<td>" . $jadwalrabu->getMapelkelas()->getLesson()->getLessonname() . "</td>";
    }
    else
    {
        $tbl .= "<td></td>";
    }
    
    $jadwalkamis = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Kamis');
    if(isset($jadwalkamis))
    {
        $tbl .= "<td>" .$jadwalkamis->getMapelkelas()->getLesson()->getLessonname(). "</td>";
    }
    else
    {
        $tbl .= "<td></td>";
    }
    
    $jadwaljumat = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Jumat');
    if(isset($jadwaljumat))
    {
        $tbl .= "<td>" .$jadwaljumat->getMapelkelas()->getLesson()->getLessonname(). "</td>";
    }
    else
    {
        $tbl .= "<td></td>";
    }
    $jadwalsabtu = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Sabtu');
    if(isset($jadwalsabtu))
    {
        $tbl .= "<td>" .$jadwalsabtu->getMapelkelas()->getLesson()->getLessonname(). "</td>";
    }
    else
    {
        $tbl .= "<td></td>";
    }
    $tbl .= "</tr>";

   
    $iterator->next();
}
$tbl .= '</table>';
$pdf->writeHTML($tbl, true, false, false, false, '');
ob_end_clean();
$pdf->Output();
?>
