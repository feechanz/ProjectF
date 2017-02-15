<?php
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

<?php
    function getRoleName($role)
    {
        switch($role)
        {
            case "admin":
                $role = "Admin Beasiswa";
                break;
            case "beasiswa":
                $role = "Orang Tua";
                break;
            
            case "staff":
                $role = "Tata Usaha";
                break;
            case "teacher":
                $role = "Guru";
                break;
            default:
                $role = "Orang Tua";
        }
        return $role;
    }
?>
<script type="text/javascript" src="js/function.js"></script>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    <h2 class="style" align="center">Menambah Pengguna</h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>Email</label></span>
                            <span><input name="email" type="text" class="textbox" required style=" text-align: center;" width="10%"></span>
                        </div>
                        <div>
                            <span><label>Password</label></span>
                            <span><input name="password" type="password" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <span><label>Konfirmasi Password</label></span>
                            <span><input name="repassword" type="password" class="textbox" required style="text-align: center;" max="100" min="0"></span>
                        </div>
                        <div>
                            <span><label>Role</label></span>
                            <span>
                                <select name="role">
                                    <option value="admin">Admin Pendaftaran</option>
                                    <option value="beasiswa">Admin Beasiswa</option>
                                    <option value="parent">Orang Tua</option>
                                    <option value="staff">Tata Usaha</option>
                                    <option value="teacher">Guru</option>
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
                    Tabel Pengguna 
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Email </th>
                        <th style="width: 10%;">Role</th>
                        <th style="width: 10%;">Status </th>
                        <th style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $number = 1;
                    $iterator = $userdao->get_user()->getIterator();
                    while ($iterator -> valid()) 
                    {
                        echo "<tr>";
                        echo "<td>".$number."</td>";
                        echo "<td>".$iterator->current()->getEmail()."</td>";
                        $role = $iterator->current()->getRole();
                        $role = getRoleName($role);
                        echo "<td>".$role."</td>";
                        $status ="Aktif";
                        if($iterator->current()->getStatus() != 1)
                        {
                            $status = "Tidak Aktif";
                        }
                        echo "<td>".$status."</td>";
                        if($status == "Aktif")
                        {
                            echo "<td> "
                            . "<a class='btn btn-info' href='index.php?page=reset_password&userid=".$iterator->current()->getUserid()."'><span > Reset Password </span></a>"
                            . "<button class='btn btn-danger' onclick='deactiveUser(\"".$iterator->current()->getUserid()."\")'><span> Tidak Aktifkan User </span></button>"
                            . "</td>";
                            echo "</tr>";
                        }
                        else
                        {
                            echo "<td> "
                            . "<a class='btn btn-info' href='index.php?page=reset_password&userid=".$iterator->current()->getUserid()."'><span > Reset Password </span></a>"
                            . "<button class='btn btn-danger' onclick='activeUser(\"".$iterator->current()->getUserid()."\")'><span> Aktifkan User </span></button>"
                            . "</td>";
                            echo "</tr>";
                        }

                        $number++;
                        $iterator->next();
                    }
                ?>
                </tbody>
            </table>

        </div>
        
    </div>
</div>