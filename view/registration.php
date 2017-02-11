<?php
    if(isset($_POST['submit']))
    {
        $fullname = $_POST['fullname'];//1
        $gender = $_POST['gender'];//2
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
        
        $registration = new Registration();
        
        $registration ->setFullname($fullname);
        $registration ->setGender($gender);
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
        
        if($registrationdao ->insert_registration($registration))
        {
            echo "<script>window.location='index.php?page=registration_success'; </script>";
        }
        else
        {
            echo "<script>alert('pendaftaran gagal');</script>";
        }
    }
?>

<!--main-->
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="contact">
                <div class="section group">				
                   		
                    <div class="col span_2_of_4">
                        <div class="registration-form">
                            <h2 class="style">IDENTITAS PESERTA DIDIK (WAJIB DI ISI)</h2>
                            <form method="post" action="">
                                <div>
                                    <span><label>Nama Lengkap</label></span>
                                    <span><input name="fullname" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Jenis Kelamin</label></span>
                                    <span>
                                        <select name="gender">
                                            <option value="male">Pria</option>
                                            <option value="female">Wanita</option>
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Tempat Lahir</label></span>
                                    <span><input name="birthplace" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Tanggal Lahir</label></span>
                                    <span><input name="birthdate" type="date" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Agama</label></span>
                                    <span>
                                        <select name="religion">
                                            <option value="islam">Islam</option>
                                            <option value="protestan">Protestan</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="konghucu">Konghucu</option>
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Berkebutuhan Khusus</label></span>
                                    <span><input name="disability" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Alamat Tinggal</label></span>
                                    <span><textarea name="address"> </textarea></span>
                                </div>
                                <div>
                                    <span><label>Alat transportasi ke sekolah</label></span>
                                    <span><input name="transport" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Jenis Tinggal</label></span>
                                    <select name="stay">
                                        <option value="islam">Bersama Orang Tua</option>
                                        <option value="protestan">Bersama Wali</option>
                                        <option value="katolik">Tinggal Sendiri / Kost</option>
                                    </select>
                                </div>
                                <div>
                                    <span><label>Nomor Telephone</label></span>
                                    <span><input name="phone" type="text" class="textbox" required></span>
                                </div>
        
                                <div>
                                    <span><label>E-Mail</label></span>
                                    <span><input name="email" type="text" class="textbox" required></span>
                                </div>
                                
                                <h2 class="style">DATA DIRI ORANG TUA WALI (WAJIB DI ISI)</h2>
                                 
                                <div>
                                    <span><label>Nama Ayah</label></span>
                                    <span><input name="fathername" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Tahun Lahir</label></span>
                                    <span><input name="fatherbirthyear" type="text" class="textbox" required></span>
                                </div>
                                 <div>
                                    <span><label>Pekerjaan</label></span>
                                    <span><input name="fatherjob" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Pendidikan</label></span>
                                    <span>
                                        <select name="fatherschool">
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="sma">SMA</option>
                                            <option value="sarjana">Sarjana</option>
                                            <option value="magister">Magister</option>
                                            <option value="profesor">Profesor</option>
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Penghasilan Bulanan</label></span>
                                    <span><input name="fathermontly" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Nama Ibu</label></span>
                                    <span><input name="mothername" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Tahun Lahir</label></span>
                                    <span><input name="motherbirthyear" type="text" class="textbox" required></span>
                                </div>
                                 <div>
                                    <span><label>Pekerjaan</label></span>
                                    <span><input name="motherjob" type="text" class="textbox" required></span>
                                </div>
                                <div>
                                    <span><label>Pendidikan</label></span>
                                    <span>
                                        <select name="motherschool">
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="sma">SMA</option>
                                            <option value="sarjana">Sarjana</option>
                                            <option value="magister">Magister</option>
                                            <option value="profesor">Profesor</option>
                                        </select>
                                        
                                    </span>
                                </div>
                                <div>
                                    <span><label>Penghasilan Bulanan</label></span>
                                    <span><input name="mothermontly" type="text" class="textbox" required></span>
                                </div>
                                
                                <h2 class="style">DATA PERIODIK (WAJIB DI ISI)</h2>
                                 
                                <div>
                                    <span><label>Tinggi Badan</label></span>
                                    <span><input name="height" type="text" class="textbox" style="width: 20%" placeholder="Cm" required></span>
                                </div>
                                 <div>
                                    <span><label>Berat Badan</label></span>
                                    <span><input name="weight" type="text" class="textbox" style="width: 20%" placeholder="Kg" required></span>
                                </div>
                                 <div>
                                    <span><label>Jarak Tempat Tinggal Ke Sekolah</label></span>
                                    <span><input name="distanceschool" type="text" class="textbox" style="width: 20%;" placeholder="Km" required></span>
                                </div>
                                 <div>
                                    <span><label>Waktu Tempuh Berangkat Ke Sekolah</label></span>
                                    <span><input name="timeschool" type="text" class="textbox" style="width: 20%" placeholder="menit" required> </span>
                                </div>
                                 <div>
                                    <span><label>Jumlah Saudara Kandung</label></span>
                                    <span><input name="brothercount" type="number" class="textbox" style="width: 5%" required></span>
                                </div>
                                <div>
                                    <div><input type="submit" name="submit" value="Apply" ><input type="reset" value="Reset" style="margin-left: 5px;"></div>
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