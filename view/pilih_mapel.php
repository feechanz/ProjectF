<?php
    if(isset($_GET['kelasid']))
    {
        $kelasid = $_GET['kelasid'];
        $kelas = $kelasdao -> get_one_kelasid($kelasid);
        $classlevel = $kelas->getClasslevel();
        $periode = $kelas->getPeriode();
        
        if(isset($_POST['submit']))
        {
            $lessonid = $_POST['lessonid'];
            $lessonname = $_POST['lessonname'];
            $minimumscore = $_POST['minimumscore'];
            $teacherid = $_POST['teacherid'];
            
            $mapelkelas = new Mapelkelas();
            $mapelkelas ->setLessonid($lessonid);
            $mapelkelas ->setLessonname($lessonname);
            $mapelkelas ->setMinimumscore($minimumscore);
            $mapelkelas ->setTeacherid($teacherid);
            $mapelkelas ->setKelasid($kelasid);
            
            
            $mapelkelasdao->insert_mapelkelas($mapelkelas);
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
<script type="text/javascript" src="js/function.js"></script>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    <h2 class="style" align="center">Kelas <?php echo $kelas->getClasslevel().$kelas->getNamakelas()." ".$periode->getPeriodename();?></h2>
                </div>
            </div>
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Mata Pelajaran Kelas <?php echo $classlevel;?>
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

                    $iterator = $lessondao->get_lesson_by_class_and_kelasid($classlevel,$kelasid)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<form action='' method='post'>";
                        
                        echo "<tr>";
                        echo "<td>".$number." <input type='hidden' name='lessonid' value = '".$iterator->current()->getLessonid()."'</td>";
                        echo "<td>".$iterator->current()->getLessonname()." <input type='hidden' name='lessonname' value = '".$iterator->current()->getLessonname()."'/></td>";
                        echo "<td>".$iterator->current()->getMinimumscore()." <input type='hidden' name='minimumscore' value = '".$iterator->current()->getMinimumscore()."'/></td>";
                        //teacher
                        echo "<td>";
                        echo "<select name='teacherid'>";
                        $it = $teacherdao->get_active_teacher()->getIterator();
                        while($it->valid())
                        {
                            echo "<option value='".$it->current()->getTeacherid()."'>";
                            echo $it->current()->getFullname();
                            echo "</option>";
                            $it->next();
                        }
                        echo "</select>";
                        echo "</td>";
                        //--teacher
                        echo "<td> "
                        . "<input type='submit' class='btn btn-warning' name='submit' value='Pilih Pelajaran'></input>"
                        . "</td>";
                        echo "</tr>";
                        echo "</form>";
                        
                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
            
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
                        . "<a class='btn btn-primary' href='index.php?page=edit_mapelkelas&kelasid=".$kelasid."&mapelkelasid=".$iterator->current()->getMapelkelasid()."'><span>Ubah Pengajar</span> </a>"
                        . "</td>";
                        echo "</tr>";
                        
                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
            <h1 align="center"><a class='btn btn-primary' href="index.php?page=atur_jadwal_kelas&kelasid=<?php echo $kelasid;?>"><span>Atur Jadwal Pelajaran</span> </a></h1>
        </div>
    </div>
</div>