<?php
    include_once 'config.php';
    include_once 'koneksi.php';
    include_once '../dao/NilaiekskulDao.php';
    if(isset($_GET['ekskulid']))
    {
        $ekskulid = $_GET['ekskulid'];
        $studentid = $_GET['studentid'];
        $classlevel = $_GET['classlevel'];
        $nilaiekskuldao = new NilaiekskulDao();
        $nilaiekskul = new Nilaiekskul();
        $nilaiekskul->setEkskulid($ekskulid);
        $nilaiekskul->setStudentid($studentid);
        $nilaiekskuldao->insert_nilaiekskul($nilaiekskul);
        
    }
    
    echo "<script>window.location='../index.php?page=class_student&classlevel=".$classlevel."'; </script>";
?>
