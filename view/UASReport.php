<?php
    $studentid = $_GET['studentid'];
    $kelasid = $_GET['kelasid'];
    
    $student = $studentdao ->get_one_student($studentid);
    $kelas = $kelasdao->get_one_kelasid($kelasid);
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
                    <h2 class="style" align="center">Data Informasi Siswa untuk Semester 2 (Genap)</h2>
                    <form method="post" action="PDF/UASReport.php" >
                        <div>
                            <input type="hidden" name="studentid" value="<?php echo $studentid;?>"/>
                            <input type="hidden" name="kelasid" value="<?php echo $kelasid;?>"/>
                            <span><label>Nama : <?php echo $student->getRegistration()->getFullname(); ?></label></span>
                            <span>
                                <label>Jenis Kelamin : <?php 
                                                        $gender = "Perempuan";
                                                        if($student->getRegistration()->getGender() == "male")
                                                        {
                                                            $gender = "Laki-Laki";
                                                        }
                                                        echo $gender; ?>
                                </label>
                            </span>
                            <span><label>Kelas : <?php echo $kelas->getClasslevel().$kelas->getNamakelas();?></label></span>
                            <span><label>Kelakuan</label></span>
                            <span>
                                <select name="kelakuan">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </span>
                        </div>
                        <div>
                            <span><label>Kerajinan</label></span>
                            <span>
                                <select name="kerajinan">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </span>
                        </div>
                        <div>
                            <span><label>Kerapihan</label></span>
                            <span>
                                <select name="kerapihan">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </span>
                        </div>
                        <div>
                            <span><label>Catatan :</label></span>
                            <span><input name="catatan" type="text" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Print Raport Semester 2 (Genap)" ></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>