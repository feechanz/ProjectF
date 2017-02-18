<?php
    include_once 'config.php';
    include_once 'koneksi.php';
    include_once '../dao/Periode.php';
    include_once '../dao/PeriodeDao.php';
    if(isset($_GET['periodeid']))
    {
        $periodeid = $_GET['periodeid'];
        $periodedao = new PeriodeDao();
        $periodedao ->update_status(0, $periodeid);
    }
    
    echo "<script>window.location='../index.php?page=kelas'; </script>";
?>