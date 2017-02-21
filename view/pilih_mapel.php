<?php
    if(isset($_GET['kelasid']))
    {
        $kelasid = $_GET['kelasid'];
        $kelas = $kelasdao -> get_one_kelasid($kelasid);
        $classlevel = $kelas->getClasslevel();
        $periode = $kelas->getPeriode();
        
        
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

                    $iterator = $lessondao->get_lesson_by_class($classlevel)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<form action='post'>";
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getLessonname()."</td>";
                        echo "<td>".$iterator->current()->getMinimumscore()."</td>";
                        //teacher
                        echo "<td>";
                        echo "<select name='teacher'>";
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
                        . "<button class='btn btn-warning'><span> Pilih </span></button>"
                        . "</td>";
                        echo "</tr>";
                        echo "</form>";
                        
                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>