<?php
    if(isset($_GET['periodeid']))
    {
        $periodeid = $_GET['periodeid'];
        $periode = $periodedao ->get_one_periode($periodeid);
        
        if(isset($_POST['submit']))
        {
            $namakelas = $_POST['namakelas'];
            $classlevel = $_POST['classlevel'];
            $teacherid = $_POST['teacherid'];
            

            $kelas = new Kelas();
            $kelas ->setNamakelas($namakelas);
            $kelas ->setClasslevel($classlevel);
            $kelas ->setTeacherid($teacherid);
            $kelas ->setPeriodeid($periodeid);
            
            $kelasdao = new KelasDao();
            if($kelasdao ->insert_kelas($kelas))
            {
                echo "<script> alert('data kelas berhasil ditambahkan!'); </script>";
            }
            else
            {
                echo "<script> alert('data kelas gagal ditambahkan!'); </script>";
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
                    <h2 class="style" align="center">Menambah Kelas Baru</h2>
                    <form method="post" action="" >
                        <div>
                            <span><label>Kelas</label></span>
                            <span>
                                <select name="classlevel">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </span>
                        </div>
                        <div>
                            <span><label>Huruf Kelas</label></span>
                            <span><input name="namakelas" type="text" class="textbox" required style=" text-align: center;" width="10%" placeholder="ex: A, B, or C"></span>
                        </div>
                         <div>
                            <span><label>Wali Kelas</label></span>
                            <span>
                                <select name="teacherid">
                                <?php
                                    $teacherdao = new TeacherDao();
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
                            <div><input type="submit" name="submit" value="Tambah Kelas" ></div>
                        </div>
                    </form>
                </div>
            </div>
            <table align="center" class="table table-hover" style="border:2px solid brown">
                <legend>
                    Tabel Kelas <?php echo $periode ->getPeriodename(); ?>
                </legend>
                <thead>
                    <tr >
                        <th style="width: 5%;">No</th>
                        <th style="width: 25%;">Kelas</th>
                        <th style="width: 15%;">Wali Kelas</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        $number = 1;
                        $iterator = $kelasdao->get_kelas_by_periodeid($periodeid)->getIterator();
                        while ($iterator -> valid()) 
                        {
                            echo "<tr>";
                            echo "<td>".$number."</td>";
                            echo "<td>".$iterator->current()->getClasslevel().$iterator->current()->getNamakelas()."</td>";
                            echo "<td>".$iterator->current()->getTeacher()->getFullname()."</td>";
                            echo "<td> "
                            . "<a class='btn btn-primary' href='index.php?page=detail_kelas&kelasid=".$iterator->current()->getKelasid()."'><span > Detail Kelas </span></a>"
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