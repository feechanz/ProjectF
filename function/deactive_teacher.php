<?php
    include_once 'config.php';
    include_once 'koneksi.php';
    include_once '../dao/Teacher.php';
    include_once '../dao/TeacherDao.php';
    if(isset($_GET['teacherid']))
    {
        $teacherid = $_GET['teacherid'];
        $teacherdao = new TeacherDao();
        $teacherdao ->update_status(0, $teacherid);
    }
    
    echo "<script>window.location='../index.php?page=teacher'; </script>";
?>