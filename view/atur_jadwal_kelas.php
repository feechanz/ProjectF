<?php
    if(isset($_GET['kelasid']))
    {
        $message = "";
        $kelasid = $_GET['kelasid'];
        $kelas = $kelasdao -> get_one_kelasid($kelasid);
        $classlevel = $kelas->getClasslevel();
        $periode = $kelas->getPeriode();
        if(isset($_POST['submit']))
        {
            $awal = $_POST['awal'];
            $akhir = $_POST['akhir'];
            
            if($awal >= $akhir)
            {
                $message = "Waktu awal harus lebih kecil daripada waktu akhir!";
            }
            else
            {
                $slotjadwal = new Slotjadwal();
                $slotjadwal ->setAwal($awal);
                $slotjadwal ->setAkhir($akhir);
                $slotjadwal ->setKelasid($kelasid);
                
                if($slotjadwaldao ->insert_slotjadwal($slotjadwal))
                {
                    echo "<script>alert('Slot jadwal berhasil ditambah');</script>";
                }
                else
                {
                    echo "<script>alert('Slot jadwal gagal ditambah');</script>";
                }
            }
        }
        if(isset($_POST['mapelsubmit']))
        {
            $mapelkelasid = $_POST['mapelkelasid'];
            $slotjadwalid = $_POST['slotjadwalid'];
            $hari = $_POST['hari'];
            
            $jadwalpelajaran = new Jadwalpelajaran();
            $jadwalpelajaran ->setMapelkelasid($mapelkelasid);
            $jadwalpelajaran ->setSlotjadwalid($slotjadwalid);
            $jadwalpelajaran ->setHari($hari);
            if($jadwalpelajarandao->insert_jadwalpelajaran($jadwalpelajaran))
            {
                echo "<script>alert('Jadwal Pelajaran berhasil ditambahkan!');</script>";
            }
            else
            {
                echo "<script>alert('Jadwal Pelajaran gagal ditambahkan!');</script>";
            }
        }
        if(isset($_POST['deletesubmit']))
        {
            $slotjadwalid = $_POST['slotjadwalid'];
            $hari = $_POST['hari'];
            
            $jadwalpelajarandao = new JadwalpelajaranDao();
            if($jadwalpelajarandao->delete_jadwalpelajaran($slotjadwalid, $hari))
            {
                echo "<script>alert('Jadwal Pelajaran berhasil dihapus!');</script>";
            }
            else
            {
                echo "<script>alert('Jadwal Pelajaran gagal dihapus!');</script>";
            }
            //echo "<script>alert('Hapus Jadwal ".$slotjadwalid."|".$hari."');</script>";
        }
        if(isset($_POST['deleteslotsubmit']))
        {
            $slotjadwalid = $_POST['slotjadwalid'];
            $jmlh = $jadwalpelajarandao->get_count_by_slotjadwalid($slotjadwalid);
            if($jmlh > 0)
            {
                echo "<script>alert('Slot jadwal tidak dapat dihapus karena masih ada jadwal yang terdaftar dalam slot!');</script>";
            }
            else
            {
                if($slotjadwaldao->delete_slotjadwal($slotjadwalid))
                {
                    echo "<script>alert('Slot jadwal telah dihapus!');</script>";
                }
                else
                {
                    echo "<script>alert('Slot jadwal gagal dihapus!');</script>";
                }
            }
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
</style>

<div class="main_btm">
    <div class="wrap">
        <div class="main">
             <div class="col span_2_of_4">
                <div class="adddata-form">
                    <p style="color:red;" align="center">
                        <?php echo $message;?>
                    </p>
                    <h2 class="style" align="center">Menambah Slot Jadwal</h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>Waktu Awal</label></span>
                            <span><input name="awal" type = "time" class="textbox" required style=" text-align: center;" width="10%" value="07:00"></span>
                            
                        </div>
                        <div>
                            <span><label>Waktu Akhir</label></span>
                            <span><input name="akhir" type = "time" class="textbox" required style="text-align: center;" width="10%" value="10:00"></span>
                         
                        </div>
                       
                        <div>
                            <div><input type="submit" name="submit" value="Tambah Slot Jadwal" ></div>
                        </div>
                    </form>
                </div>
            </div>
            
            
            
            <table style="width: 100%;">
                <tr class='days'>
                    <th style="width: 10%;"></th>
                    <th class="text-center" style="width: 15%;">Senin</th>
                    <th class="text-center" style="width: 15%;">Selasa</th>
                    <th class="text-center" style="width: 15%;">Rabu</th>
                    <th class="text-center" style="width: 15%;">Kamis</th>
                    <th class="text-center" style="width: 15%;">Jumat</th>
                    <th class="text-center" style="width: 15%;">Sabtu</th>
                </tr>
                
<!--                <tr>
                    <td >9.00</td>
                    <td class='timetable-col blue'>
                        <button class="btn btn-primary" data-toggle="modal" onclick="showModal('senin')">+</button>
                    </td>
                    <td class='timetable-col blue'>
                        <button class="btn btn-primary" data-toggle="modal" onclick="showModal('selasa')">+</button>
                    </td>
                    <td class='timetable-col blue'>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#timeTableModal">+</button>
                    </td>
                    <td class='timetable-col blue'>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#timeTableModal">+</button>
                    </td>
                    <td class='timetable-col blue'>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#timeTableModal">+</button>
                    </td>
                    <td class='timetable-col blue'>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#timeTableModal">+</button>
                    </td>
                </tr>-->
                <?php
                    
                    $iterator = $slotjadwaldao->get_slotjadwal_by_kelasid($kelasid)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        
                        $time = $iterator->current()->getAwal()."-".$iterator->current()->getAkhir();
                        $time2 = $iterator->current()->getAwal()." - ".$iterator->current()->getAkhir();
                        echo "<td> <button class='btn btn-success' data-toggle='modal' onclick='deleteSlotJadwal(\"".$iterator->current()->getSlotjadwalid()."\",\"".$time2."\")'>".$time2." </button></td>";
                        
                       
                        $jadwalsenin = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Senin');
                        if(isset($jadwalsenin))
                        {
                            echo "
                            <td class='timetable-col'>
                                <button class='btn btn-warning' data-toggle='modal' onclick=deleteJadwal('".$iterator->current()->getSlotjadwalid()."','Senin','".$time."','".$jadwalsenin->getMapelkelas()->getLesson()->getLessonname()."','".str_replace(' ', '_',$jadwalsenin->getMapelkelas()->getTeacher()->getFullname())."')>".$jadwalsenin->getMapelkelas()->getLesson()->getLessonname()."</button>
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Senin','".$time."')>+</button>
                            </td>";
                        }
                        
                     
                        $jadwalselasa = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Selasa');
                        if(isset($jadwalselasa))
                        {
                            echo "
                            <td class='timetable-col'>
                                <button class='btn btn-warning' data-toggle='modal' onclick=deleteJadwal('".$iterator->current()->getSlotjadwalid()."','Selasa','".$time."','".$jadwalselasa->getMapelkelas()->getLesson()->getLessonname()."','".str_replace(' ', '_',$jadwalselasa->getMapelkelas()->getTeacher()->getFullname())."')>".$jadwalselasa->getMapelkelas()->getLesson()->getLessonname()."</button>
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Selasa','".$time."')>+</button>
                            </td>";
                        }
                        
                        $jadwalrabu = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Rabu');
                        if(isset($jadwalrabu))
                        {
                            echo "
                            <td class='timetable-col'>
                                <button class='btn btn-warning' data-toggle='modal' onclick=deleteJadwal('".$iterator->current()->getSlotjadwalid()."','Rabu','".$time."','".$jadwalrabu->getMapelkelas()->getLesson()->getLessonname()."','".str_replace(' ', '_',$jadwalrabu->getMapelkelas()->getTeacher()->getFullname())."')>".$jadwalrabu->getMapelkelas()->getLesson()->getLessonname()."</button>
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Rabu','".$time."')>+</button>
                            </td>";
                        }
                        
                        $jadwalkamis = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Kamis');
                        if(isset($jadwalkamis))
                        {
                            echo "
                            <td class='timetable-col'>
                                <button class='btn btn-warning' data-toggle='modal' onclick=deleteJadwal('".$iterator->current()->getSlotjadwalid()."','Kamis','".$time."','".$jadwalkamis->getMapelkelas()->getLesson()->getLessonname()."','".str_replace(' ', '_',$jadwalkamis->getMapelkelas()->getTeacher()->getFullname())."')>".$jadwalkamis->getMapelkelas()->getLesson()->getLessonname()."</button>
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Kamis','".$time."')>+</button>
                            </td>";
                        }
                        
                        $jadwaljumat = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Jumat');
                        if(isset($jadwaljumat))
                        {
                            echo "
                            <td class='timetable-col'>
                                <button class='btn btn-warning' data-toggle='modal' onclick=deleteJadwal('".$iterator->current()->getSlotjadwalid()."','Jumat','".$time."','".$jadwaljumat->getMapelkelas()->getLesson()->getLessonname()."','".str_replace(' ', '_',$jadwaljumat->getMapelkelas()->getTeacher()->getFullname())."')>".$jadwaljumat->getMapelkelas()->getLesson()->getLessonname()."</button>
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Jumat','".$time."')>+</button>
                            </td>";
                        }
                        
                        $jadwalsabtu = $jadwalpelajarandao->get_jadwalpelajaran_slotjadwalid_hari($iterator->current()->getSlotjadwalid(), 'Sabtu');
                        if(isset($jadwalsabtu))
                        {
                            echo "
                            <td class='timetable-col'>
                                <button class='btn btn-warning' data-toggle='modal' onclick=deleteJadwal('".$iterator->current()->getSlotjadwalid()."','Sabtu','".$time."','".$jadwalsabtu->getMapelkelas()->getLesson()->getLessonname()."','".str_replace(' ', '_',$jadwalsabtu->getMapelkelas()->getTeacher()->getFullname())."')>".$jadwalsabtu->getMapelkelas()->getLesson()->getLessonname()."</button>
                            </td>";
                        }
                        else
                        {
                            echo "
                            <td class='timetable-col blue'>
                                <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Sabtu','".$time."')>+</button>
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


            
<script>
function showModal(slotjadwalid,hari,time)
{
   //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    $("#timeTableModal .slotjadwalid").val(slotjadwalid)
    $("#timeTableModal .hari").val(hari)
    $("#timeTableModal .modal-title").html("Pilih Jadwal untuk "+hari+" pukul "+time)
    $("#timeTableModal").modal();
}

function deleteSlotJadwal(slotjadwalid,time)
{
   //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    $("#deleteSlotModal .slotjadwalid").val(slotjadwalid)
    $("#deleteSlotModal .waktu").val(time)
    $("#deleteSlotModal").modal();
}

function deleteJadwal(slotjadwalid,hari,time,lessonname,fullname)
{
   //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    $("#deleteModal .slotjadwalid").val(slotjadwalid)
    $("#deleteModal .lessonname").val(lessonname)
    $("#deleteModal .fullname").val(fullname)
    $("#deleteModal .hari").val(hari)
    $("#deleteModal .modal-title").html("Hapus Jadwal untuk "+hari+" pukul "+time)
    $("#deleteModal").modal();
}
</script>



<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap.js"></script>

<div class="modal fade" id="timeTableModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Pilih Jadwal</h4>
	  </div>
            
            
        <div class="modal-body">
            <form action='' method='post'>
                <div class="row">
                    <div class="col-md-8">
                        <h2>Pilih Mata Pelajaran</h2>
                        <select name="mapelkelasid" class="form-control" >

                            <?php
                               
                                $iterator = $mapelkelasdao->get_mapelkelas_kelasid($kelasid)->getIterator();
                                while ($iterator -> valid()) 
                                {
                                   

                                    echo "<option value='".$iterator->current()->getMapelkelasid()."'>";
                                    echo $iterator->current()->getLesson()->getLessonname()
                                    ." - ".
                                    $iterator->current()->getTeacher()->getFullname();
                                    echo "</option>";

                                    
                                    $iterator->next();
                                }
                            ?>
                            </tbody>
                        </select>
                        <br>
                        <input type="hidden" class="slotjadwalid" name="slotjadwalid"/>
                        <input type="hidden" class="hari" name="hari"/>
<!--                        <input type="text" class="form-control" placeholder="Name" required>
                        <input type="text" class="form-control" placeholder="Email" required>
                        <textarea placeholder="Message" class="form-control" required></textarea>-->
                        <input type="submit" name="mapelsubmit" class="btn blue medium" value="Pilih Jadwal">
                        <button type="button" class="btn medium" data-dismiss="modal" aria-label="Close">Batal</button>
                    </div>
                    <div class="col-md-4">
                        <img src="images/schedule.png" alt="Schedule" class="hidden-xs hidden-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>




<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Hapus Jadwal</h4>
	  </div>
            
            
        <div class="modal-body">
            <form action='' method='post'>
                <div class="row">
                    <div class="col-md-8">
                        <h2>Mata Pelajaran</h2>
                        <input type="text" class="form-control lessonname" placeholder="Mata Pelajaran" required readonly="readonly">
                        <input type="text" class="form-control fullname" placeholder="Pengajar"  required readonly="readonly">
                        <br>
                        <input type="hidden" class="slotjadwalid" name="slotjadwalid"/>
<!--                        <input type="text" class="form-control" placeholder="Name" required>
                        <input type="text" class="form-control" placeholder="Email" required>
                        <textarea placeholder="Message" class="form-control" required></textarea>-->
                        <input type="submit" name="deletesubmit" class="btn blue medium" value="Hapus Jadwal">
                        <button type="button" class="btn medium" data-dismiss="modal" aria-label="Close">Batal</button>
                    </div>
                    <div class="col-md-4">
                        <img src="images/delete.png" alt="Schedule" class="hidden-xs hidden-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>



<div class="modal fade" id="deleteSlotModal" tabindex="-1" role="dialog" aria-labelledby="Book">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
            
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Hapus Slot Jadwal</h4>
	  </div>
        <div class="modal-body">
            <form action='' method='post'>
                <div class="row">
                    <div class="col-md-8">
                        <h2>Waktu Slot</h2>
                        <input type="text" class="form-control waktu" placeholder="Waktu Slot" required readonly="readonly">
                       
                        <br>
                        <input type="hidden" class="slotjadwalid" name="slotjadwalid"/>
<!--                        <input type="text" class="form-control" placeholder="Name" required>
                        <input type="text" class="form-control" placeholder="Email" required>
                        <textarea placeholder="Message" class="form-control" required></textarea>-->
                        <input type="submit" name="deleteslotsubmit" class="btn blue medium" value="Hapus Slot">
                        <button type="button" class="btn medium" data-dismiss="modal" aria-label="Close">Batal</button>
                    </div>
                    <div class="col-md-4">
                        <img src="images/delete.png" alt="Schedule" class="hidden-xs hidden-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>