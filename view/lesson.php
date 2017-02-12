<?php
    if(isset($_POST['submit']))
    {
        $lessonname = $_POST['lessonname'];
        $minimumscore = $_POST['minimumscore'];
        $classlevel = $_POST['classlevel'];
        
        $lesson = new Lesson();
        $lesson ->setLessonname($lessonname);
        $lesson ->setMinimumscore($minimumscore);
        $lesson ->setClasslevel($classlevel);
        
        if($lessondao ->insert_lesson($lesson))
        {
            echo "<script> alert('data berhasil ditambahkan!'); </script>";
        }
        else
        {
            echo "<script> alert('data gagal ditambahkan!'); </script>";
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
                    <h2 class="style" align="center">Menambah Mata Pelajaran</h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>Nama Mata Pelajaran</label></span>
                            <span><input name="lessonname" type="text" class="textbox" required style=" text-align: center;" width="10%"></span>
                        </div>
                        <div>
                            <span><label>Nilai KKM</label></span>
                            <span><input name="minimumscore" type="number" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <span><label>Kelas</label></span>
                            <span>
                                <select name="classlevel">
                                    <option value="1">Kelas 1</option>
                                    <option value="2">Kelas 2</option>
                                    <option value="3">Kelas 3</option>
                                    <option value="4">Kelas 4</option>
                                    <option value="5">Kelas 5</option>
                                    <option value="6">Kelas 6</option>
                                </select>

                            </span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Tambah" ><input type="reset" value="Reset" style="margin-left: 5px;"></div>
                        </div>
                    </form>
                </div>
            </div>
            
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Mata Pelajaran Kelas 1
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 50%;">Mata Pelajaran </th>
                        <th style="width: 20%;">KKM</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;

                    $iterator = $lessondao->get_lesson_by_class(1)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getLessonname()."</td>";
                        echo "<td>".$iterator->current()->getMinimumscore()."</td>";
                        echo "<td> "
                        . "<a href='index.php?page=edit_lesson&lessonid=".$iterator->current()->getLessonid()."' class='btn btn-info'><span > Ubah </span></a>"
                        . "<button class='btn btn-danger' onclick='deactiveLesson(\"".$iterator->current()->getLessonid()."\")'><span> Non-Aktifkan </span></button>"
                       
                        . "</td>";
                        echo "</tr>";

                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
            
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Mata Pelajaran Kelas 2
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 50%;">Mata Pelajaran </th>
                        <th style="width: 20%;">KKM</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $lessondao = new LessonDao();
                    $iterator = $lessondao->get_lesson_by_class(2)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getLessonname()."</td>";
                        echo "<td>".$iterator->current()->getMinimumscore()."</td>";
                        echo "<td> "
                        . "<a href='index.php?page=edit_lesson&lessonid=".$iterator->current()->getLessonid()."' class='btn btn-info'><span > Ubah </span></a>"
                        . "<button class='btn btn-danger' onclick=''><span> Non-Aktifkan </span></button>"
                       
                        . "</td>";
                        echo "</tr>";

                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
            
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Mata Pelajaran Kelas 3
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 50%;">Mata Pelajaran </th>
                        <th style="width: 20%;">KKM</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $lessondao = new LessonDao();
                    $iterator = $lessondao->get_lesson_by_class(3)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getLessonname()."</td>";
                        echo "<td>".$iterator->current()->getMinimumscore()."</td>";
                        echo "<td> "
                        . "<a href='index.php?page=edit_lesson&lessonid=".$iterator->current()->getLessonid()."' class='btn btn-info'><span > Ubah </span></a>"
                        . "<button class='btn btn-danger' onclick=''><span> Non-Aktifkan </span></button>"
                       
                        . "</td>";
                        echo "</tr>";

                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
            
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Mata Pelajaran Kelas 4
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 50%;">Mata Pelajaran </th>
                        <th style="width: 20%;">KKM</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $lessondao = new LessonDao();
                    $iterator = $lessondao->get_lesson_by_class(4)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getLessonname()."</td>";
                        echo "<td>".$iterator->current()->getMinimumscore()."</td>";
                        echo "<td> "
                        . "<a href='index.php?page=edit_lesson&lessonid=".$iterator->current()->getLessonid()."' class='btn btn-info'><span > Ubah </span></a>"
                        . "<button class='btn btn-danger' onclick=''><span> Non-Aktifkan </span></button>"
                       
                        . "</td>";
                        echo "</tr>";

                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
            
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Mata Pelajaran Kelas 5
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 50%;">Mata Pelajaran </th>
                        <th style="width: 20%;">KKM</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $lessondao = new LessonDao();
                    $iterator = $lessondao->get_lesson_by_class(5)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getLessonname()."</td>";
                        echo "<td>".$iterator->current()->getMinimumscore()."</td>";
                        echo "<td> "
                        . "<a href='index.php?page=edit_lesson&lessonid=".$iterator->current()->getLessonid()."' class='btn btn-info'><span > Ubah </span></a>"
                        . "<button class='btn btn-danger' onclick=''><span> Non-Aktifkan </span></button>"
                       
                        . "</td>";
                        echo "</tr>";

                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
            
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Mata Pelajaran Kelas 6
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 50%;">Mata Pelajaran </th>
                        <th style="width: 20%;">KKM</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $lessondao = new LessonDao();
                    $iterator = $lessondao->get_lesson_by_class(6)->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getLessonname()."</td>";
                        echo "<td>".$iterator->current()->getMinimumscore()."</td>";
                        echo "<td> "
                        . "<a href='index.php?page=edit_lesson&lessonid=".$iterator->current()->getLessonid()."' class='btn btn-info'><span > Ubah </span></a>"
                        . "<button class='btn btn-danger' onclick=''><span> Non-Aktifkan </span></button>"
                       
                        . "</td>";
                        echo "</tr>";

                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>