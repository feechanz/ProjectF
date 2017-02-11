<?php
    if(isset($_GET['registrationid']))
    {
        $registrationid = $_GET['registrationid'];
        $registration = $registrationdao->get_one_registration($registrationid);
        
        if(isset($_POST['submit']))
        {
            $fullname = $_POST['fullname'];//1
            $gender = $_POST['gender'];//2
            $startschool = $_POST['startschool'];
            $birthplace = $_POST['birthplace'];//3
            $birthdate = $_POST['birthdate'];//4
            $religion = $_POST['religion'];//5
            $disability = $_POST['disability'];//6
            $address = $_POST['address'];//7
            $transport = $_POST['transport'];//8
            $stay = $_POST['stay'];//9
            $phone = $_POST['phone'];//10
            $email = $_POST['email'];//11

            $fathername = $_POST['fathername'];//12
            $fatherbirthyear = $_POST['fatherbirthyear'];//13
            $fatherjob = $_POST['fatherjob'];//14
            $fatherschool = $_POST['fatherschool'];//15
            $fathermontly = $_POST['fathermontly'];//16

            $mothername = $_POST['mothername'];//17
            $motherbirthyear = $_POST['motherbirthyear'];//18
            $motherjob = $_POST['motherjob'];//19
            $motherschool = $_POST['motherschool'];//20
            $mothermontly = $_POST['mothermontly'];//21

            $height = $_POST['height'];//22
            $weight = $_POST['weight'];//23
            $distanceschool = $_POST['distanceschool'];//24
            $timeschool = $_POST['timeschool'];//25
            $brothercount = $_POST['brothercount'];//26

            $registration ->setFullname($fullname);
            $registration ->setGender($gender);
            $registration ->setStartschool($startschool);
            $registration ->setBirthplace($birthplace);
            $registration ->setBirthdate($birthdate);
            $registration ->setReligion($religion);
            $registration ->setDisability($disability);
            $registration ->setAddress($address);
            $registration ->setTransport($transport);
            $registration ->setStay($stay);
            $registration ->setPhone($phone);

            $registration ->setEmail($email);
            $registration ->setFathername($fathername);
            $registration ->setFatherbirthyear($fatherbirthyear);
            $registration ->setFatherjob($fatherjob);
            $registration ->setFatherschool($fatherschool);
            $registration ->setFathermontly($fathermontly);

            $registration ->setMothername($mothername);
            $registration ->setMotherbirthyear($motherbirthyear);
            $registration ->setMotherjob($motherjob);
            $registration ->setMotherschool($motherschool);
            $registration ->setMothermontly($mothermontly);

            $registration ->setHeight($height);
            $registration ->setWeight($weight);
            $registration ->setDistanceschool($distanceschool);
            $registration ->setTimeschool($timeschool);
            $registration ->setBrothercount($brothercount);

            if($registrationdao->update_registration($registration))
            {
                echo "<script>alert('Data Pendaftaran berhasil diganti!');</script>";
            }
            else
            {
                echo "<script>alert('Data Pendaftaran gagal diganti!');</script>";
            }
        }
        $fullname = $registration->getFullname();//2
        $gender = $registration->getGender();//3
        $startschool = $registration->getStartschool();//4
        $birthplace = $registration->getBirthplace();//5
        $birthdate = $registration->getBirthdate();//6
        $religion = $registration->getReligion();//7
        $disability = $registration->getDisability();//8
        $address = $registration->getAddress();//9
        $transport = $registration->getTransport();//10
        $stay = $registration->getStay();//11
        $phone = $registration->getPhone();//12
        $email = $registration->getEmail();//13
        $fathername = $registration->getFathername();//14
        $fatherbirthyear = $registration->getFatherbirthyear();//15
        $fatherjob = $registration->getFatherjob();//16
        $fatherschool = $registration->getFatherschool();//17
        $fathermontly = $registration->getFathermontly();//18
        $mothername = $registration->getMothername();//19
        $motherbirthyear = $registration->getMotherbirthyear();//20
        $motherjob = $registration->getMotherjob();//21
        $motherschool = $registration->getMotherschool();//22
        $mothermontly = $registration->getMothermontly();//23
        $height = $registration->getHeight();//24
        $weight = $registration->getWeight();//25
        $distanceschool = $registration->getDistanceschool();//26
        $timeschool = $registration->getTimeschool();//27
        $brothercount = $registration->getBrothercount();//28
        $registrationdate = $registration->getRegistrationdate();//29
        $status = $registration->getStatus();//30
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
                                    <span><label>Nama Lengkap</label></span>
                                    <span><input name="fullname" type="text" class="textbox" value="<?php echo $fullname;?>"required></span>
                                </div>
                                <div>
                                    <span><label>Jenis Kelamin</label></span>
                                    <span>
                                        <select name="gender">
                                        <?php
                                            if($gender=="male")
                                            {
                                                echo 
                                                '<option value="male">Pria</option>
                                                <option value="female">Wanita</option>';
                                            }
                                            else
                                            {
                                                echo 
                                                '<option value="male">Pria</option>
                                                <option value="female" selected>Wanita</option>';
                                            }
                                        ?>
                                            
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Asal Sekolah</label></span>
                                    <span><input name="startschool" type="text" class="textbox" value="<?php echo $startschool;?>" required></span>
                                </div>
                                <div>
                                    <span><label>Tempat Lahir</label></span>
                                    <span><input name="birthplace" type="text" class="textbox" value="<?php echo $birthplace;?>" required></span>
                                </div>
                                <div>
                                    <span><label>Tanggal Lahir</label></span>
                                    <span><input name="birthdate" type="date" class="textbox" required value="<?php echo $birthdate?>"></span>
                                </div>
                                <div>
                                    <span><label>Agama</label></span>
                                    <span>
                                        <select name="religion">
                                            <?php
                                                if($religion=="islam")
                                                {
                                                    echo 
                                                    '<option value="islam">Islam</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="konghucu">Konghucu</option>';
                                                }
                                                else if($religion == "protestan")
                                                {
                                                    echo 
                                                    '<option value="islam">Islam</option>
                                                    <option value="protestan" selected>Protestan</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="konghucu">Konghucu</option>';
                                                }
                                                else if($religion == "katolik")
                                                {
                                                    echo 
                                                    '<option value="islam">Islam</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="katolik" selected>Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="konghucu">Konghucu</option>';
                                                }
                                                else if($religion == "hindu")
                                                {
                                                    echo 
                                                    '<option value="islam">Islam</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu" selected>Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="konghucu">Konghucu</option>';
                                                }
                                                else if($religion == "budha")
                                                {
                                                    echo 
                                                    '<option value="islam">Islam</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha" selected>Budha</option>
                                                    <option value="konghucu">Konghucu</option>';
                                                }
                                                else 
                                                {
                                                    echo 
                                                    '<option value="islam">Islam</option>
                                                    <option value="protestan">Protestan</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="konghucu" selected>Konghucu</option>';
                                                }
                                            ?>
                                            
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Berkebutuhan Khusus</label></span>
                                    <span><input name="disability" type="text" class="textbox" required value="<?php echo $disability;?>"></span>
                                </div>
                                <div>
                                    <span><label>Alamat Tinggal</label></span>
                                    <span><textarea name="address"><?php echo $address?></textarea></span>
                                </div>
                                <div>
                                    <span><label>Alat transportasi ke sekolah</label></span>
                                    <span><input name="transport" type="text" class="textbox" required value="<?php echo $transport;?>"></span>
                                </div>
                                <div>
                                    <span><label>Jenis Tinggal</label></span>
                                    <select name="stay">
                                        <?php
                                            if($stay == "orangtua")
                                            {
                                                echo '
                                                <option value="orangtua">Bersama Orang Tua</option>
                                                <option value="wali">Bersama Wali</option>
                                                <option value="sendiri">Tinggal Sendiri / Kost</option>';
                                            }
                                            else if($stay == "wali")
                                            {
                                                echo '
                                                <option value="orangtua">Bersama Orang Tua</option>
                                                <option value="wali" selected>Bersama Wali</option>
                                                <option value="sendiri">Tinggal Sendiri / Kost</option>';
                                            }
                                            else
                                            {
                                                echo '
                                                <option value="orangtua">Bersama Orang Tua</option>
                                                <option value="wali">Bersama Wali</option>
                                                <option value="sendiri" selected>Tinggal Sendiri / Kost</option>';
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <div>
                                    <span><label>Nomor Telephone</label></span>
                                    <span><input name="phone" type="text" class="textbox" required value="<?php echo $phone;?>"></span>
                                </div>
        
                                <div>
                                    <span><label>E-Mail</label></span>
                                    <span><input name="email" type="text" class="textbox" required value="<?php echo $email;?>"></span>
                                </div>
                                
                                <h2 class="style">DATA ORANG TUA / WALI</h2>
                                 
                                <div>
                                    <span><label>Nama Ayah</label></span>
                                    <span><input name="fathername" type="text" class="textbox" required value="<?php echo $fathername;?>"></span>
                                </div>
                                <div>
                                    <span><label>Tahun Lahir</label></span>
                                    <span><input name="fatherbirthyear" type="text" class="textbox" required value="<?php echo $fatherbirthyear;?>"></span>
                                </div>
                                 <div>
                                    <span><label>Pekerjaan</label></span>
                                    <span><input name="fatherjob" type="text" class="textbox" required value="<?php echo $fatherjob;?>"></span>
                                </div>
                                <div>
                                    <span><label>Pendidikan</label></span>
                                    <span>
                                        <select name="fatherschool">
                                            <?php
                                                if($fatherschool == "sd")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($fatherschool == "smp")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp" selected>SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($fatherschool == "sma")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma" selected>SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($fatherschool == "sarjana")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana" selected>Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($fatherschool == "magister")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister" selected>Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor" selected>Profesor</option>';
                                                }
                                            ?>
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Penghasilan Bulanan</label></span>
                                    <span><input name="fathermontly" type="text" class="textbox" required value="<?php echo $fathermontly;?>"></span>
                                </div>
                                <div>
                                    <span><label>Nama Ibu</label></span>
                                    <span><input name="mothername" type="text" class="textbox" required value="<?php echo $mothername;?>"> </span>
                                </div>
                                <div>
                                    <span><label>Tahun Lahir</label></span>
                                    <span><input name="motherbirthyear" type="text" class="textbox" required value="<?php echo $motherbirthyear;?>"></span>
                                </div>
                                 <div>
                                    <span><label>Pekerjaan</label></span>
                                    <span><input name="motherjob" type="text" class="textbox" required value="<?php echo $motherjob;?>"></span>
                                </div>
                                <div>
                                    <span><label>Pendidikan</label></span>
                                    <span>
                                        <select name="motherschool" >
                                            <?php
                                                if($motherschool == "sd")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($motherschool == "smp")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp" selected>SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($motherschool == "sma")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma" selected>SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($motherschool == "sarjana")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana" selected>Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else if($motherschool == "magister")
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister" selected>Magister</option>
                                                    <option value="profesor">Profesor</option>';
                                                }
                                                else
                                                {
                                                    echo '
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="sarjana">Sarjana</option>
                                                    <option value="magister">Magister</option>
                                                    <option value="profesor" selected>Profesor</option>';
                                                }
                                            ?>
                                            
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Penghasilan Bulanan</label></span>
                                    <span><input name="mothermontly" type="text" class="textbox" required value="<?php echo $mothermontly;?>"></span>
                                </div>
                                
                                <h2 class="style">DATA PERIODIK</h2>
                                 
                                <div>
                                    <span><label>Tinggi Badan</label></span>
                                    <span><input name="height" type="text" class="textbox" style="width: 20%" placeholder="Cm" required value="<?php echo $height;?>"></span>
                                </div>
                                 <div>
                                    <span><label>Berat Badan</label></span>
                                    <span><input name="weight" type="text" class="textbox" style="width: 20%" placeholder="Kg" required value="<?php echo $weight;?>"></span>
                                </div>
                                 <div>
                                    <span><label>Jarak Tempat Tinggal Ke Sekolah</label></span>
                                    <span><input name="distanceschool" type="text" class="textbox" style="width: 20%;" placeholder="Km" required value="<?php echo $distanceschool;?>"></span>
                                </div>
                                 <div>
                                    <span><label>Waktu Tempuh Berangkat Ke Sekolah</label></span>
                                    <span><input name="timeschool" type="text" class="textbox" style="width: 20%" placeholder="menit" required value="<?php echo $timeschool;?>"> </span>
                                </div>
                                 <div>
                                    <span><label>Jumlah Saudara Kandung</label></span>
                                    <span><input name="brothercount" type="number" class="textbox" style="width: 5%" required value="<?php echo $brothercount;?>"></span>
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