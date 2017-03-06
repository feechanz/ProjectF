<?php
    if(isset($_GET['lessonid']))
    {
        $lessonid = $_GET['lessonid'];
        $lesson = $lessondao ->get_one_lesson($lessonid);
        
        if(isset($_POST['submit']))
        {
            $lessonname= $_POST['lessonname'];
            $minimumscore = $_POST['minimumscore'];
            $ulanganpct = $_POST['ulanganpct'];
            $quizpct = $_POST['quizpct'];
            $ujianpct = $_POST['ujianpct'];
            $classlevel = $_POST['classlevel'];
            
            $lesson ->setLessonname($lessonname);
            $lesson ->setMinimumscore($minimumscore);
            $lesson ->setUlanganpct($ulanganpct);
            $lesson ->setQuizpct($quizpct);
            $lesson ->setUjianpct($ujianpct);
            $lesson ->setClasslevel($classlevel);
            
            if($lessondao ->update_lesson($lesson))
            {
                echo "<script>alert('Data Pelajaran berhasil diganti!');</script>";
            }
            else
            {
                echo "<script>alert('Data Pelajaran gagal diganti!');</script>";
            }
            
        }
        $lessonname = $lesson ->getLessonname();
        $minimumscore = $lesson ->getMinimumscore();
        $ulanganpct = $lesson ->getUlanganpct();
        $quizpct = $lesson ->getQuizpct();
        $ujianpct = $lesson ->getUjianpct();
        $classlevel = $lesson ->getClasslevel();
        
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
            <div class="contact">
                <div class="section group">		
                    <div class="col span_2_of_4">
                        <div class="registration-form">
                            <h2 align="center" class="style">MATA PELAJARAN</h2>
                            <form method="post" action="">
                                <div>
                                    <span><label>Nama Mata Pelajaran</label></span>
                                    <span><input name="lessonname" type="text" class="textbox" value="<?php echo $lessonname;?>"required></span>
                                </div>
                                <div>
                                    <span><label>Nilai KKM</label></span>
                                    <span><input name="minimumscore" type="number" class="textbox" required value="<?php echo $minimumscore;?>" min="0" max="100"></span>
                                </div>
                                 <div>
                                    <span><label>Ulangan Persentase</label></span>
                                    <span><input name="ulanganpct" type="number" style="width:10%;" class="textbox" required style="text-align: center;" value="<?php echo $ulanganpct;?>" max="100" min="0" >%</span>
                                </div>
                                <div>
                                    <span><label>Quiz Persentase</label></span>
                                    <span><input name="quizpct" type="number" style="width:10%;"  class="textbox" required style="text-align: center;" value="<?php echo $quizpct;?>" max="100" min="0">%</span>
                                </div>
                                <div>
                                    <span><label>Ujian Persentase</label></span>
                                    <span><input name="ujianpct" type="number" style="width:10%;"  class="textbox" required style="text-align: center;" value="<?php echo $ujianpct;?>"  max="100" min="0">%</span>
                                </div>
                                <div>
                                    <span><label>Kelas</label></span>
                                    <select name="classlevel">
                                        <?php
                                            if($classlevel == 1)
                                            {
                                                echo '
                                                <option value="1">Kelas 1</option>
                                                <option value="2">Kelas 2</option>
                                                <option value="3">Kelas 3</option>
                                                <option value="4">Kelas 4</option>
                                                <option value="5">Kelas 5</option>
                                                <option value="6">Kelas 6</option>';
                                            }
                                            else if($classlevel == 2)
                                            {
                                                echo '
                                                <option value="1">Kelas 1</option>
                                                <option value="2" selected>Kelas 2</option>
                                                <option value="3">Kelas 3</option>
                                                <option value="4">Kelas 4</option>
                                                <option value="5">Kelas 5</option>
                                                <option value="6">Kelas 6</option>';
                                            }
                                            else if($classlevel == 3)
                                            {
                                                echo '
                                                <option value="1">Kelas 1</option>
                                                <option value="2">Kelas 2</option>
                                                <option value="3" selected>Kelas 3</option>
                                                <option value="4">Kelas 4</option>
                                                <option value="5">Kelas 5</option>
                                                <option value="6">Kelas 6</option>';
                                            }
                                            else if($classlevel == 4)
                                            {
                                                echo '
                                                <option value="1">Kelas 1</option>
                                                <option value="2">Kelas 2</option>
                                                <option value="3">Kelas 3</option>
                                                <option value="4" selected>Kelas 4</option>
                                                <option value="5">Kelas 5</option>
                                                <option value="6">Kelas 6</option>';
                                            }
                                            else if($classlevel == 5)
                                            {
                                                echo '
                                                <option value="1">Kelas 1</option>
                                                <option value="2">Kelas 2</option>
                                                <option value="3">Kelas 3</option>
                                                <option value="4">Kelas 4</option>
                                                <option value="5" selected>Kelas 5</option>
                                                <option value="6">Kelas 6</option>';
                                            }
                                            else
                                            {
                                                echo '
                                                <option value="1">Kelas 1</option>
                                                <option value="2">Kelas 2</option>
                                                <option value="3">Kelas 3</option>
                                                <option value="4">Kelas 4</option>
                                                <option value="5">Kelas 5</option>
                                                <option value="6" selected>Kelas 6</option>';
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                
                                <div>
                                    <div><input type="submit" name="submit" value="Simpan Data" ></div>
                                </div>
                            </form>
                          </div>
                    </div>		
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>