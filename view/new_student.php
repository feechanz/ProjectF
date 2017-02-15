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
                        <th style="width: 10%;">Disabilitas </th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        $number = 1;
                        $iterator = $registrationdao ->get_pass_registration()->getIterator();
                        while ($iterator -> valid()) 
                        {
                            echo "<tr>";
                            echo "<td>".$number."</td>";
                            echo "<td>".$iterator->current()->getFullname()."</td>";
                            
                            $gender ="Perempuan";
                            if($iterator->current()->getGender() == "male")
                            {
                                $gender = "Laki-Laki";
                            }
                            echo "<td>".$gender."</td>";
                            
                            echo "<td>".$iterator->current()->getBirthdate()."</td>";
                            echo "<td>".$iterator->current()->getDisability()."</td>";
                            echo "<td> "
                            . "<button class='btn btn-primary' onclick=''><span > Proses Penerimaan </span></button>"
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