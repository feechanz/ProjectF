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
    include_once 'dao/Lesson.php';
    include_once 'dao/LessonDao.php';
    include_once 'dao/Teacher.php';
    include_once 'dao/TeacherDao.php';
    
    $registrationdao = new RegistrationDao();
    $userdao = new UserDao();
    $lessondao = new LessonDao();
    $teacherdao = new TeacherDao();
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
    <link href="css/adddata_style.css" rel="stylesheet" type="text/css" media="all" />
    <!--slider-->
    <link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript" src="js/navigation.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
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
        
            case ("view_registration") : 
                include_once("view/view_registration.php");
            break;
        
            case ("detail_registration") : 
                include_once("view/detail_registration.php");
            break;
        
            case ("registration_closed") : 
                include_once("view/registration_closed.php");
            break;
        
            case ("close_registration") :
                $query = "UPDATE information
                          SET pendaftaran = 0";
                $hasil = mysqli_query($con, $query);
                include_once("view/view_registration.php");
            break;
            
            case ("open_registration") :
                $query = "UPDATE information
                          SET pendaftaran = 1";
                $hasil = mysqli_query($con, $query);
                include_once("view/view_registration.php");
            break;
            
            case ("promotion") : 
                include_once("view/promotion.php");
            break;
        
            case ("master_data") : 
                include_once("view/master_data.php");
            break;
        
            case ("lesson") : 
                include_once("view/lesson.php");
            break;
        
            case ("edit_lesson") : 
                include_once("view/edit_lesson.php");
            break;
        
            case ("edit_teacher") : 
                include_once("view/edit_teacher.php");
            break;
        
            case ("teacher") : 
                include_once("view/teacher.php");
            break;
        
            case ("student") : 
                include_once("view/student.php");
            break;
        
            case ("new_student") : 
                include_once("view/new_student.php");
            break;
        
            case ("kelas") : 
                include_once("view/kelas.php");
            break;
        
            case ("jadwal_kelas") : 
                include_once("view/jadwal_kelas.php");
            break;
        
            case ("user") : 
                include_once("view/user.php");
            break;
        
            case ("reset_password") : 
                include_once("view/reset_password.php");
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