<?php
    if(isset($_GET['teacherid']))
    {
        $teacherid = $_GET['teacherid'];
        $teacher = $teacherdao ->get_one_teacher($teacherid);
        if(isset($_POST['submit']))
        {
            $nip = $_POST['nip'];
            $fullname = $_POST['fullname'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            
            $teacherdao = new TeacherDao();
            $teacher->setNip($nip);
            $teacher->setFullname($fullname);
            $teacher->setGender($gender);
            $teacher->setPhone($phone);
            $teacher->setEmail($email);
            
            if($teacherdao->update_teacher($teacher))
            {
                echo "<script>alert('Data Guru berhasil diganti!');</script>";
            }
            else
            {
                echo "<script>alert('Data Guru gagal diganti!');</script>";
            }
        }
        $nip = $teacher ->getNip();
        $fullname = $teacher ->getFullname();
        $gender = $teacher ->getGender();
        $phone = $teacher ->getPhone();
        $email = $teacher ->getEmail();
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
                                    <span><label>NIP</label></span>
                                    <span><input name="nip" type="text" class="textbox" required value="<?php echo $nip;?>"></span>
                                </div>
                                <div>
                                    <span><label>Nama Lengkap</label></span>
                                    <span><input name="fullname" type="text" class="textbox" value="<?php echo $fullname;?>"required></span>
                                </div>
                                
                                <div>
                                    <span><label>Jenis Kelamin</label></span>
                                    <select name="gender">
                                        <?php
                                            if($gender == "male")
                                            {
                                                echo '
                                                <option value="male">Laki-Laki</option>
                                                <option value="female">Perempuan</option>';
                                            }
                                            else
                                            {
                                                echo '
                                                <option value="male">Laki-Laki</option>
                                                <option value="female" selected>Perempuan</option>';
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div>
                                    <span><label>Nomor Telepon</label></span>
                                    <span><input name="phone" type="text" class="textbox" required value="<?php echo $phone;?>"></span>
                                </div>
                                <div>
                                    <span><label>Email</label></span>
                                    <span><input name="email" type="text" class="textbox" value="<?php echo $email;?>"required></span>
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