<?php
    session_start();
    if (!isset($_SESSION['isLogin']))
    {
        $_SESSION['isLogin']=false;
    }
    include_once 'function/config.php';
    include_once 'function/koneksi.php';
    
    include_once 'dao/User.php';
    include_once 'dao/UserDao.php';
    include_once 'dao/Registration.php';
    include_once 'dao/RegistrationDao.php';
    
    $registrationdao = new RegistrationDao();
    $userdao = new UserDao();
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>The Public-Library Website Template | Home :: w3layouts</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Quattrocento+Sans' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/login_style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/form_style.css" rel="stylesheet" type="text/css" media="all" />
    <!--slider-->
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript" src="js/navigation.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').nivoSlider();
        });
    </script>
    <?php 
        //page state
        if(isset($_GET['page']))
        {
            $link = $_GET['page']; 
        } 
        else
        {
            $link = "home";
        }	
    ?>
</head>
<body>
    <?php
        include_once 'component/header.php';
    ?>
    <!--content-->
    <?php
        switch ($link)
        {
            case ("home") : 
                include_once("view/home.php");
            break;
        
            case ("about") : 
                include_once("view/about.php");
            break;
        
            case ("news") : 
                include_once("view/news.php");
            break;
            
            case ("registration") : 
                include_once("view/registration.php");
            break;
        
            case ("registration_success") : 
                include_once("view/registration_success.php");
            break;
            
            case ("login") : 
                include_once("view/login.php");
            break;
        
            case ("logout") : 
                include_once("view/logout.php");
            break;
            default : 
                echo "<script> alert('menu tidak tersedia / belum memiliki akses');</script>";
            break;	
        }
    ?>
    <!--footer-->
    <?php 
        include_once 'component/footer_header.php';
    ?>
    <!--footer1-->
    <?php 
        include_once 'component/footer.php';
    ?>
    </body>
</html>