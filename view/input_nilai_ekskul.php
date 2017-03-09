<?php
    if(isset($_GET['ekskulid']))
    {
        $ekskulid = $_GET['ekskulid'];
        $ekskul = $ekskuldao ->get_one_ekskul($ekskulid);
        
        if(isset($_POST['submit']))
        {
            $nilaimutu = $_POST['nilaimutu'];
            $studentid = $_POST['studentid'];
            $nilaiekskulid = $_POST['nilaiekskulid'];
            
            
            $nilaiekskuldao = new NilaiekskulDao();
            if($nilaiekskuldao->update_nilaiekskul($nilaimutu, $nilaiekskulid))
            {
                echo "<script>alert('Nilai berhasil disimpan!');</script>";
            }
            else
            {
                echo "<script>alert('Nilai gagal disimpan!');</script>";
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
    input
    {
        text-align: center;
    }
</style>
<div class="main_btm">
    <div class="wrap">
        <div class="main">
            <div class="col span_2_of_4">
                <div class="adddata-form">
                    
                    <h2 class="style" align="center">Data Ekstrakurikuler </h2>
                    
                    <form method="post" action="" >
                        <div>
                            <span><label>Periode</label></span>
                            <span><?php echo $ekskul->getPeriode()->getPeriodename();?></span>
                        </div>
                        <div>
                            <span><label>Nama Ekstrakurikuler</label></span>
                            <span><?php echo $ekskul->getNamaekskul();?></span>
                       
                            <span><label>Pengajar</label></span>
                            <span><?php echo $ekskul->getTeacher()->getFullName();?></span>
                        </div>
                        
                    </form>
                </div>
                
                <table align="center" class="table table-hover" style="border:2px solid brown">
                   <legend>
                       Tabel Siswa 
                   </legend>
                   <thead>
                        <tr >
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Nama </th>
                            <th style="width: 10%;">Jenis Kelamin</th>
                            <th style="width: 10%;">Tanggal Lahir </th>
                            <th style="width: 10%;">Nilai </th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                   <tbody>
                        <?php
                           $number = 1;
                           $iterator = $nilaiekskuldao->get_nilaiekskul_ekskulid($ekskulid)->getIterator();
                           while ($iterator -> valid()) 
                           {
                                echo "<form method='post' action=''>";
                                echo "<tr>";
                                echo "<td>".$number
                                    ."<input type='hidden' name='studentid' value='".$iterator->current()->getStudentid()."'/> 
                                      <input type='hidden' name='nilaiekskulid' value='".$iterator->current()->getNilaiekskulid()."'/> 
                                     </td>";
                                
                                echo "<td>".$iterator->current()->getStudent()->getRegistration()->getFullname()."</td>";
                                $gender ="Perempuan";
                                if($iterator->current()->getStudent()->getRegistration()->getGender() == "male")
                                {
                                    $gender = "Laki-Laki";
                                }
                                echo "<td>".$gender."</td>";
                                echo "<td>".$iterator->current()->getStudent()->getRegistration()->getBirthdate()."</td>";
                                echo "<td> <input type='text' name='nilaimutu' value='".$iterator->current()->getNilaimutu()."' placeholder='ex : A, B, C, D, etc' maxlength='1'/></td>";
                                
                                echo "<td> "
                                . "<input type='submit' name='submit' value='Simpan Data' class='btn btn-info' />"
                                . "</td>";
                                echo "</tr>";
                                echo "</form>";
                               $number++;
                               $iterator->next();
                           }
                       ?>
                   </tbody>
                </table>
                
                
            </div>
        </div>
    </div>
</div> 