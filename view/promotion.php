<?php 
    if(isset($_POST['gambarsubmit']))
    {
        if (is_uploaded_file($_FILES['gambar1']['tmp_name']))
        {
            $picture = $_FILES['gambar1']['tmp_name'];
           
            $path = "images/banner1.jpg";

            move_uploaded_file ($picture, $path);
            echo "a1!".$path.$picture.");</script>";
        }
        
        if (is_uploaded_file($_FILES['gambar2']['tmp_name']))
        {
            $picture = $_FILES['gambar2']['tmp_name'];
           
            $path = "images/banner2.jpg";

            move_uploaded_file ($_FILES['gambar2'] ['tmp_name'], $path);
            echo "<script>alert('a2!');</script>";
        }
        
        if (is_uploaded_file($_FILES['gambar3']['tmp_name']))
        {
            $picture = $_FILES['gambar3']['tmp_name'];
           
            $path = "images/banner3.jpg";

            move_uploaded_file ($_FILES['gambar3'] ['tmp_name'], $path);
            echo "<script>alert('a3!');</script>";
        }
    }
    if(isset($_POST['visimisisubmit']))
    {
        $visi = $_POST['visi'];
        $misi = $_POST['misi'];
        $query = "UPDATE information
                  SET 
                    visi = '".$visi."', 
                    misi = '".$misi."'";
        $hasil = mysqli_query($con, $query) or die(mysqli_error($con));;
        
    }
    if(isset($_POST['informasisubmit']))
    {
        $alamat = $_POST['alamat'];
        $kodepos = $_POST['kodepos'];
        $kota = $_POST['kota'];
        $provinsi = $_POST['provinsi'];
        $negara = $_POST['negara'];
        $phone = $_POST['phone'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        
        $query = "UPDATE information
                  SET 
                    alamat = '".$alamat."', 
                    kodepos = '".$kodepos."', 
                    kota = '".$kota."',
                    provinsi = '".$provinsi."', 
                    negara = '".$negara."', 
                    phone = '".$phone."', 
                    fax = '".$fax."', 
                    email = '".$email."'";
        $hasil = mysqli_query($con, $query) or die(mysqli_error($con));;
    }
?>

<style>
    h3
    {
        font-size: 1.0725em;
    }
    span
    {
        display :block;
        align-content: center;
    }
    input
    {
        margin-left: 35%;
        font-family: Arial, Geneva,Helvetica, sans-serif;
	font-size: 0.8725em;
	color: #575757;
	padding: 8px;
	display: block;
	width: 30%;
	background: #FFFFFF;
	border: 1px solid rgba(184, 184, 184, 0.86);
	outline: none;
	-webkit-appearance: none;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
        
    }
    input[type="submit"]{
	font-family: 'Quattrocento Sans', sans-serif;
	background: #6F6F6F;
	color: #ffffff;
	border: 1px solid #646464;
	cursor: pointer;
	padding: 10px 18px;
	text-transform: uppercase;
	font-size:1em;
	font-weight: 400;
	outline: none;
	position: relative;
	-webkit-transition: all 0.3s;
	-moz-transition: all 0.3s;
	-o-transition: all 0.3s;
	transition: all 0.3s;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
    }
    
    textarea
    {
        margin-left: 35%;
        font-family: Arial, Geneva,Helvetica, sans-serif;
	font-size: 0.8725em;
	color: #575757;
	padding: 8px;
	display: block;
	width: 30%;
	background: #FFFFFF;
	border: 1px solid rgba(184, 184, 184, 0.86);
	outline: none;
	-webkit-appearance: none;
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
        
        resize:none;
	height:100px;	
    }
</style>

<div class="main_btm">
    <div class="container">
        
        <div class="section group">	
            
                <h2 class="style" align ="center"><a href="index.php?page=setting_news" class="btn btn-success">Atur Berita</a></h2>
                <h2 class="style" align ="center">Gambar Depan</h2>
                <h3 align="center">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="col span_2_of_4">

                            <div >
                                <span><label>Gambar 1</label></span>
                                <span><img src="images/banner1.jpg" data-thumb="images/1.jpg" alt="" style="width: 30%;height:30%;"/></span>
                                <span><input type="file" name="gambar1" value="Choose File"/></span>
                            </div>
                            <div>
                                <span><label>Gambar 2</label></span>
                                <span><img src="images/banner2.jpg" data-thumb="images/2.jpg" alt="" style="width: 30%;height:30%;"/>
                                <span><input type="file" name="gambar2" value="Choose File"/></span>
                            </div>
                            <div>
                                <span><label>Gambar 3</label></span>
                                <span><img src="images/banner3.jpg" data-thumb="images/3.jpg" alt="" style="width: 30%;height:30%;"/>
                                <span> <input type="file" name="gambar3" alue="Choose File"/></span>
                            </div>
                            <div>
                                <div><input type="submit" name="gambarsubmit" value="Update Gambar" ></div>
                            </div>
                        </div>
                    </form>
                </h3>
                <h2 class="style" align ="center">VISI & MISI</h2>
                <div class="col span_2_of_4">
                    <form method="post" action="">
                        <h3 align="center">
                            <div >
                                <span><label>Visi</label></span>
                            </div>
                            <div>
                                <span>
                                    <span><textarea name="visi"><?php echo $visi;?></textarea></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Misi</label></span>
                            </div>
                            <div>
                                <span>
                                    <span><textarea name="misi"><?php echo $misi;?></textarea></span>
                                </span>
                            </div>
                            <div>
                                <div><input type="submit" name="visimisisubmit" value="Update Visi Misi" ></div>
                            </div>
                        </h3>
                    </form>
                </div>
                <div class="col span_2_of_4">
                    <form action="" method="post">
                        <h3 align="center">
                            <div >
                                <span><label>Alamat</label></span>
                            </div>
                            <div>
                                <span>
                                    <span><input name="alamat" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="alamat" value="<?php echo $alamat;?>"></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Kode Pos</label></span>
                            </div>
                            <div>
                                 <span>
                                    <span><input name="kodepos" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="kode pos" value="<?php echo $kodepos;?>"></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Kota</label></span>
                            </div>
                            <div>
                                 <span>
                                    <span><input name="kota" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="kota" value="<?php echo $kota;?>"></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Provinsi</label></span>
                            </div>
                            <div>
                                 <span>
                                    <span><input name="provinsi" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="provinsi" value="<?php echo $provinsi;?>"></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Negara</label></span>
                            </div>
                            <div>
                                 <span>
                                    <span><input name="negara" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="negara" value="<?php echo $negara;?>"></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Telepon</label></span>
                            </div>
                            <div>
                                 <span>
                                    <span><input name="phone" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="telepon" value="<?php echo $phone;?>"></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Fax</label></span>
                            </div>
                            <div>
                                 <span>
                                    <span><input name="fax" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="fax" value="<?php echo $fax;?>"></span>
                                </span>
                            </div>
                            <div >
                                <span><label>Email</label></span>
                            </div>
                            <div>
                                 <span>
                                    <span><input name="email" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="email" value="<?php echo $email;?>"></span>
                                </span>
                            </div>
                            <div>
                                <div><input type="submit" name="informasisubmit" value="Update Informasi" ></div>
                            </div>
                        </h3>
                    </form>
                </div>
        </div>
    </div>
</div>