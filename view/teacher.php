<?php
    if(isset($_POST['submit']))
    {
        $nip = $_POST['nip'];
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        
        $teacher = new Teacher();
        $teacher->setNip($nip);
        $teacher->setFullname($fullname);
        $teacher->setGender($gender);
        $teacher->setPhone($phone);
        $teacher->setEmail($email);
        
        if($teacherdao->insert_teacher($teacher))
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
                    <h2 class="style" align="center">Menambah Data Guru</h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>NIP</label></span>
                            <span><input name="nip" type="text" class="textbox" required style=" text-align: center;" width="10%"></span>
                        </div>
                        <div>
                            <span><label>Nama Lengkap</label></span>
                            <span><input name="fullname" type="text" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <span><label>Jenis Kelamin</label></span>
                            <span>
                                <select name="gender">
                                    <option value="male">Laki-Laki</option>
                                    <option value="female">Perempuan</option>
                                    
                                </select>

                            </span>
                        </div>
                        <div>
                            <span><label>Nomor Telepon</label></span>
                            <span><input name="phone" type="text" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <span><label>Email</label></span>
                            <span><input name="email" type="text" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Tambah" ><input type="reset" value="Reset" style="margin-left: 5px;"></div>
                        </div>
                    </form>
                </div>
            </div>
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Guru Aktif
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 10%;">NIP </th>
                        <th style="width: 20%;">Nama Lengkap</th>
                        <th style="width: 10%;">Jenis Kelamin</th>
                        <th style="width: 10%;">Telepon</th>
                        <th style="width: 10%;">Email</th>
                        <th style="width: 17%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $iterator = $teacherdao->get_active_teacher()->getIterator();
                    
                    while ($iterator -> valid()) 
                    {
                        $teacher = new Teacher();
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getNip()."</td>";
                        echo "<td>".$iterator->current()->getFullname()."</td>";
                        $gender = $iterator->current()->getGender();
                        if($gender=="male")
                        {
                            $gender = "Laki-Laki";
                        }
                        else
                        {
                            $gender = "Perempuan";
                        }
                        echo "<td>".$gender."</td>";
                        echo "<td>".$iterator->current()->getPhone()."</td>";
                        echo "<td>".$iterator->current()->getEmail()."</td>";
                        echo "<td> "
                        . "<a href='index.php?page=edit_teacher&teacherid=".$iterator->current()->getTeacherid()."' class='btn btn-info'><span > Ubah </span></a>"
                        . "<button class='btn btn-danger' onclick='deactiveTeacher(\"".$iterator->current()->getTeacherid()."\")'><span> Non-Aktifkan </span></button>"
                       
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