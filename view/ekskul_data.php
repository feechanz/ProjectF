<?php
    if(isset($_GET['periodeid']))
    {
        $periodeid = $_GET['periodeid'];
        $periode = $periodedao ->get_one_periode($periodeid);
        
        if(isset($_POST['submit']))
        {
            $namaekskul = $_POST['namaekskul'];
            $deskripsiekskul = $_POST['deskripsiekskul'];
            $hari = $_POST['hari'];
            $jammulai = $_POST['jammulai'];
            $jamselesai = $_POST['jamselesai'];
            $teacherid = $_POST['teacherid'];
            

            $ekskul = new Ekskul();
            $ekskul ->setNamaekskul($namaekskul);
            $ekskul ->setDeskripsiekskul($deskripsiekskul);
            $ekskul ->setJammulai($jammulai);
            $ekskul ->setJamselesai($jamselesai);
            $ekskul ->setHari($hari);
            $ekskul ->setTeacherid($teacherid);
            $ekskul ->setPeriodeid($periodeid);
            
            
            if($ekskuldao ->insert_ekskul($ekskul))
            {
                echo "<script> alert('data ekstrakurikuler berhasil ditambahkan!'); </script>";
            }
            else
            {
                echo "<script> alert('data ekstrakurikuler gagal ditambahkan!'); </script>";
            }
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
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    <h2 class="style" align="center">Menambah Ekstrakurikuler Baru</h2>
                    <form method="post" action="" >
                        
                        <div>
                            <span><label>Nama Ekstrakurikuler</label></span>
                            <span><input name="namaekskul" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="Nama Ekstrakurikuler"></span>
                        </div>
                        <div>
                            <span><label>Deskripsi Ekskul</label></span>
                            <span><input name="deskripsiekskul" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="Deskripsi Ekstrakurikuler"></span>
                        </div>
                        <div>
                            <span><label>Jam Mulai</label></span>
                            <span><input name="jammulai" type="time" class="textbox" required style=" text-align: center;" width="10%" value="13:00:00"></span>
                        </div>
                        <div>
                            <span><label>Jam Selesai</label></span>
                            <span><input name="jamselesai" type="time" class="textbox" required style=" text-align: center;" width="10%" value="16:00:00"></span>
                        </div>
                        <div>
                            <span><label>Hari</label></span>
                            <span>
                                <select name="hari">
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </span>
                        </div>
                         <div>
                            <span><label>Pengajar</label></span>
                            <span>
                                <select name="teacherid">
                                <?php
                                    $iterator = $teacherdao->get_active_teacher()->getIterator();
                                    while ($iterator -> valid()) 
                                    {      
                                        echo "<option value='".$iterator->current()->getTeacherid()."'>".$iterator->current()->getFullname()."</option>";
                                            
                                        $iterator->next();
                                    }
                          
                                ?>
                                </select>
                            </span>
                        </div>
                        <div>
                            <div><input type="submit" name="submit" value="Tambah Ekstrakurikuler" ></div>
                        </div>
                    </form>
                </div>
            </div>
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Ekstrakurikuler <?php echo $periode ->getPeriodename(); ?>
                    <br>
                    <a class='btn btn-info' href="PDF/DaftarEkskulReport.php?periodeid=<?php echo $periodeid;?>" target="_blank">Print Daftar Ekskul</a>
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 20%;">Nama Ekstrakurikuler</th>
                        <th style="width: 20%;">Jam Mulai</th>
                        <th style="width: 20%;">Jam Selesai</th>
                        <th style="width: 20%;">Hari</th>
                        <th style="width: 15%;">Pengajar</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        $number = 1;
                        $ekskuldao = new EkskulDao();
                        $iterator = $ekskuldao->get_ekskul_periode($periodeid)->getIterator();
                        while ($iterator -> valid()) 
                        {
                            echo "<tr>";
                            echo "<td>".$number."</td>";
                            echo "<td>".$iterator->current()->getNamaekskul()."</td>";
                            echo "<td>".$iterator->current()->getJammulai()."</td>";
                            echo "<td>".$iterator->current()->getJamselesai()."</td>";
                            echo "<td>".$iterator->current()->getHari()."</td>";
                            echo "<td>".$iterator->current()->getTeacher()->getFullname()."</td>";
                            echo "<td> "
                            . "<a class='btn btn-primary' href='index.php?page=detail_ekskul&ekskulid=".$iterator->current()->getEkskulid()."'><span > Detail Ekstrakurikuler </span></a>"
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