<?php
    if(isset($_GET['kelasid']))
    {
        $message = "";
        $kelasid = $_GET['kelasid'];
        $kelas = $kelasdao -> get_one_kelasid($kelasid);
        $periodeid = $kelas->getPeriodeid();
        $periode = $periodedao->get_one_periode($periodeid);
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
            <h1 align="center">Jadwal Kelas <?php echo $kelas->getClasslevel().$kelas->getNamakelas()." ".$periode->getPeriodename();?></h1>
            <table style="width: 100%;">
                <legend>
                    <a class='btn btn-info' href="PDF/JadwalPelajaranReport.php?kelasid=<?php echo $kelasid;?>" target="_blank">Print Jadwal Pelajaran</a>
                </legend>
                <tr class='days'>
                    <th style="width: 10%;"></th>
                    <th class="text-center" style="width: 15%;">Senin</th>
                    <th class="text-center" style="width: 15%;">Selasa</th>
                    <th class="text-center" style="width: 15%;">Rabu</th>
                    <th class="text-center" style="width: 15%;">Kamis</th>
                    <th class="text-center" style="width: 15%;">Jumat</th>
                    <th class="text-center" style="width: 15%;">Sabtu</th>
                </tr>
                
                <?php
                    
                    $iterator = $slotjadwaldao->get_slotjadwal_by_kelasid($kelasid)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        
                        $time = $iterator->current()->getAwal()."-".$iterator->current()->getAkhir();
                        $time2 = $iterator->current()->getAwal()." - ".$iterator->current()->getAkhir();
                        echo "<td> ".$time2." </td>";
                        
                       
                        $jadwalsenin = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Senin');
                        if(isset($jadwalsenin))
                        {
                            echo "
                            <td class='timetable-col'>
                                ".$jadwalsenin->getMapelkelas()->getLesson()->getLessonname()."
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                
                            </td>";
                        }
                        
                     
                        $jadwalselasa = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Selasa');
                        if(isset($jadwalselasa))
                        {
                            echo "
                            <td class='timetable-col'>
                                ".$jadwalselasa->getMapelkelas()->getLesson()->getLessonname()."
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                
                            </td>";
                        }
                        
                        $jadwalrabu = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Rabu');
                        if(isset($jadwalrabu))
                        {
                            echo "
                            <td class='timetable-col'>
                                ".$jadwalrabu->getMapelkelas()->getLesson()->getLessonname()."
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                
                            </td>";
                        }
                        
                        $jadwalkamis = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Kamis');
                        if(isset($jadwalkamis))
                        {
                            echo "
                            <td class='timetable-col'>
                                ".$jadwalkamis->getMapelkelas()->getLesson()->getLessonname()."
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                
                            </td>";
                        }
                        
                        $jadwaljumat = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Jumat');
                        if(isset($jadwaljumat))
                        {
                            echo "
                            <td class='timetable-col'>
                                ".$jadwaljumat->getMapelkelas()->getLesson()->getLessonname()."
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                
                            </td>";
                        }
                        
                        $jadwalsabtu = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Sabtu');
                        if(isset($jadwalsabtu))
                        {
                            echo "
                            <td class='timetable-col'>
                                ".$jadwalsabtu->getMapelkelas()->getLesson()->getLessonname()."
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                
                            </td>";
                        }
                        
                        echo "</tr>";
                        $iterator->next();
                    }
                ?>
                
            </table>
        </div>
    </div>
</div>
