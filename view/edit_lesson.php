<?php
    if(isset($_GET['lessonid']))
    {
        $lessonid = $_GET['lessonid'];
        $lesson = $lessondao ->get_one_lesson($lessonid);
        
        if(isset($_POST['submit']))
        {
            $lessonname= $_POST['lessonname'];
            $minimumscore = $_POST['minimumscore'];
            $classlevel = $_POST['classlevel'];
            
            $lesson ->setLessonname($lessonname);
            $lesson ->setMinimumscore($minimumscore);
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
        $classlevel = $lesson ->getClasslevel();
    }
?>

<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="contact">
                <div class="section group">		
                    <div class="col span_2_of_4">
                        <div class="registration-form">
                            <h2 class="style">IDENTITAS PESERTA DIDIK</h2>
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