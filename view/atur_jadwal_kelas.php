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
                
                <tr>
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
                </tr>
                <?php
                    
                    $iterator = $slotjadwaldao->get_slotjadwal_by_kelasid($kelasid)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        $time = $iterator->current()->getAwal()."-".$iterator->current()->getAkhir();
                        $time2 = $iterator->current()->getAwal()." - ".$iterator->current()->getAkhir();
                        echo "<td>".$time2."</td>";
                        
                        
                        echo "
                        <td class='timetable-col blue'>
                            <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Senin','".$time."')>+</button>
                        </td>";
                        
                        echo "
                        <td class='timetable-col blue'>
                            <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Selasa','".$time."')>+</button>
                        </td>";
                        
                        echo "
                        <td class='timetable-col blue'>
                            <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Rabu','".$time."')>+</button>
                        </td>";
                        
                        echo "
                        <td class='timetable-col blue'>
                            <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Kamis','".$time."')>+</button>
                        </td>";
                        
                        echo "
                        <td class='timetable-col blue'>
                            <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Jumat','".$time."')>+</button>
                        </td>";
                        
                        echo "
                        <td class='timetable-col blue'>
                            <button class='btn btn-primary' data-toggle='modal' onclick=showModal('".$iterator->current()->getSlotjadwalid()."','Sabtu','".$time."')>+</button>
                        </td>";
                        $iterator->next();
                    }
                ?>
                
            </table>
        </div>
    </div>
</div>


            
<script>
function showModal(jadwalid,hari,time)
{
   //you can do anything with data, or pass more data to this function. i set this data to modal header for example
    $("#timeTableModal .jadwalid").val(jadwalid)
    $("#timeTableModal .hari").val(hari)
    $("#timeTableModal .modal-title").html("Pilih Jadwal untuk "+hari+" pukul "+time)
    $("#timeTableModal").modal();
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
		<form action="" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <table align="center" class="table table-hover" style="border:2px solid brown">
                                <legend>
                                    Mata Pelajaran Kelas <?php echo $kelas->getClasslevel().$kelas->getNamakelas();?>
                                </legend>
                                <thead>
                                    <tr >
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 50%;">Mata Pelajaran </th>
                                        <th style="width: 10%;">KKM</th>
                                        <th style="width: 20%;">Pengajar</th>
                                        <th style="width: 20%;">Aksi</th>
                                    </tr>
                                </thead>

                                <?php
                                    $number = 1;

                                    $iterator = $mapelkelasdao->get_mapelkelas_kelasid($kelasid)->getIterator();
                                    while ($iterator -> valid()) 
                                    {

                                        echo "<tr>";
                                        echo "<td>".$number."</td>";
                                        echo "<td>".$iterator->current()->getLesson()->getLessonname()." </td>";
                                        echo "<td>".$iterator->current()->getLesson()->getMinimumscore()."</td>";
                                        //teacher
                                        echo "<td>";
                                        echo $iterator->current()->getTeacher()->getFullname();
                                        echo "</td>";
                                        //--teacher
                                        echo "<td> "
                                        . "<a class='btn btn-warning' href=''><span>Pilih Jadwal</span> </a>"
                                        . "</td>";
                                        echo "</tr>";

                                        $number++;
                                        $iterator->next();
                                    }
                                ?>
                                </tbody>
                            </table>
                            <input type="hidden" class="jadwalid"/>
                            <input type="hidden" class="hari"/>
<!--                            <input type="text" class="form-control" placeholder="Name" required>
                            <input type="text" class="form-control" placeholder="Email" required>
                            <textarea placeholder="Message" class="form-control" required></textarea>
                            <input type="submit" class="btn blue medium" value="Submit">-->
                            <button type="button" class="btn medium" data-dismiss="modal" aria-label="Close">Cancel</button>
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