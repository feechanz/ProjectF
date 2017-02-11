<?php
    include_once 'config.php';
    include_once 'koneksi.php';
    include_once '../dao/Registration.php';
    include_once '../dao/RegistrationDao.php';
    if(isset($_GET['registrationid']))
    {
        $registrationid = $_GET['registrationid'];
        $registrationdao = new RegistrationDao();
        $registrationdao->update_status(2, $registrationid);
        
    }
    
    echo "<script>window.location='../index.php?page=view_registration'; </script>";
?>
