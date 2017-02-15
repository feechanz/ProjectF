<?php
    include_once 'config.php';
    include_once 'koneksi.php';
    include_once '../dao/User.php';
    include_once '../dao/UserDao.php';
    if(isset($_GET['userid']))
    {
        $userid = $_GET['userid'];
        $userdao = new UserDao();
        $userdao ->update_status(0, $userid);
    }
    
    echo "<script>window.location='../index.php?page=user'; </script>";
?>