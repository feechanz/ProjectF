<?php
    if(isset($_GET['periodeid']))
    {
        $periodeid = $_GET['periodeid'];
        $periode = $periodedao ->get_one_periode($periodeid);
        
        if(isset($_POST['submit']))
        {
            $namaekskul = $_POST['namaekskul'];
            $teacherid = $_POST['teacherid'];
            

            $ekskul = new Ekskul();
            $ekskul ->setNamaekskul($namaekskul);
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
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Nama Ekstrakulikuler</th>
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