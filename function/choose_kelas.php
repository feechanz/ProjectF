<?php
    include_once 'config.php';
    include_once 'koneksi.php';
    include_once '../dao/KelasDao.php';
    if(isset($_GET['kelasid']))
    {
        $kelasid = $_GET['kelasid'];
        $studentid = $_GET['studentid'];
        $classlevel = $_GET['classlevel'];
        $kelasdao = new KelasDao();
        $kelasdao->insert_kelas_student($kelasid, $studentid);
        
    }
    
    echo "<script>window.location='../index.php?page=class_student&classlevel=".$classlevel."'; </script>";
?>
