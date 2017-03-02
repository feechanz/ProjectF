<?php

    if(isset($_GET['kelasid']))
    {
        $kelasid = $_GET['kelasid'];
        $kelas = $kelasdao->get_one_kelasid($kelasid);
        
        $studentid = $_GET['studentid'];
        $student = $studentdao->get_one_student($studentid);
      
        
        $gender ="Perempuan";
        if($student->getRegistration()->getGender() == "male")
        {
            $gender = "Laki-Laki";
        }
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
    input
    {
        text-align: center;
    }
</style>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    
                    <h2 class="style" align="center">Data Kelas </h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Periode</label></span>
                            <span><?php echo $kelas->getPeriode()->getPeriodename();?></span>
                        </div>
                        <div>
                            <span><label>Nama Kelas</label></span>
                            <span><?php echo $kelas->getClasslevel().$kelas->getNamakelas();?></span>
                       
                            <span><label>Wali Kelas</label></span>
                            <span><?php echo $kelas->getTeacher()->getFullName();?></span>
                        </div>
                        
                    </form>
                </div>
                
                <table style="width: 100%;">
                    <legend>
                        Jadwal Kelas <?php echo $kelas->getClasslevel().$kelas->getNamakelas();?>
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
</div> 