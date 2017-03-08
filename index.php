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
    include_once 'dao/Periode.php';
    include_once 'dao/PeriodeDao.php';
    include_once 'dao/Kelas.php';
    include_once 'dao/KelasDao.php';
    include_once 'dao/Student.php';
    include_once 'dao/StudentDao.php';
    include_once 'dao/Mapelkelas.php';
    include_once 'dao/MapelkelasDao.php';
    include_once 'dao/Slotjadwal.php';
    include_once 'dao/SlotjadwalDao.php';
    include_once 'dao/Jadwalpelajaran.php';
    include_once 'dao/JadwalpelajaranDao.php';
    include_once 'dao/Myjadwal.php';
    include_once 'dao/MyjadwalDao.php';
    include_once 'dao/Nilai.php';
    include_once 'dao/NilaiDao.php';
    include_once 'dao/Studentkelas.php';
    include_once 'dao/StudentkelasDao.php';
    include_once 'dao/News.php';
    include_once 'dao/NewsDao.php';
    
    $registrationdao = new RegistrationDao();
    $userdao = new UserDao();
    $lessondao = new LessonDao();
    $teacherdao = new TeacherDao();
    $periodedao = new PeriodeDao();
    $kelasdao = new KelasDao();
    $studentdao = new StudentDao();
    $mapelkelasdao = new MapelkelasDao();
    $slotjadwaldao = new SlotjadwalDao();
    $jadwalpelajarandao = new JadwalpelajaranDao();
    $myjadwaldao = new MyjadwalDao();
    $nilaidao = new NilaiDao();
    $studentkelasdao = new StudentkelasDao();
    $newsdao = new NewsDao();
    
    function getStudentStatus($status)
    {
        $result = "Drop Out";
        if($status == 1)
        {
            $result = "Aktif";
        }
        else if($status == 2)
        {
            $result = "Lulus";
        }
        else if($status == 3)
        {
            $result = "Alumni";
        }
        return $result;
    }
    
    
    
    //initialize company information
    $query = "SELECT * FROM
              information" ;
    $hasil = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($hasil))
    {
        $visi = $row['visi'];
        $misi = $row['misi'];
        $alamat = $row['alamat'];
        $email = $row['email'];
        $kodepos = $row['kodepos'];
        $kota = $row['kota'];
        $provinsi = $row['provinsi'];
        $negara = $row['negara'];
        $phone = $row['phone'];
        $fax = $row['fax'];
        $email =$row['email'];
    }
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
        
            case ("detail_news") :
                include_once("view/detail_news.php");
            break;
        
            case ("detail_news_edit") :
                include_once("view/detail_news_edit.php");;
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
            
             case ("registration_score") : 
                include_once("view/registration_score.php");
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
            
            case ("proses_registration_finish"):
                include_once("view/proses_registration_finish.php");
            break;
            
            case ("announcement"):
                include_once("view/announcement.php");
            break;
            
            case ("promotion") : 
                include_once("view/promotion.php");
            break;
        
            case ("setting_news") :
                include_once("view/setting_news.php");
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
        
            case ("class_student") : 
                include_once("view/class_student.php");
            break;
        
            case ("new_student") : 
                include_once("view/new_student.php");
            break;
            
            case ("add_student_class") : 
                include_once("view/add_student_class.php");
            break;
        
            case ("class_periode") :
                include_once 'view/class_periode.php';
            break;
            
            case ("detailkelas") :
                include_once 'view/detailkelas.php';
            break;
        
            case ("detail_student") :
                include_once 'view/detail_student.php';
            break;
            
            case ("change_student_status") :
                include_once 'view/change_student_status.php';
            break;
            case ("proses_penerimaan") : 
                include_once("view/proses_penerimaan.php");
            break;
        
            case ("kelas") : 
                include_once("view/kelas.php");
            break;
        
            case ("setting_kelas") : 
                include_once("view/setting_kelas.php");
            break;
        
            case ("jadwal_kelas") : 
                include_once("view/jadwal_kelas.php");
            break;
        
            case ("edit_mapelkelas") :
                include_once("view/edit_mapelkelas.php");
            break;
            
            case ("atur_jadwal_kelas") :
                include_once 'view/atur_jadwal_kelas.php';
            break;
            
            case ("user") : 
                include_once("view/user.php");
            break;
            
            case ("pilih_kelas") :
                include_once("view/pilih_kelas.php");
            break;
            
            case ("pilih_mapel") :
                include_once("view/pilih_mapel.php");
            break;
        
            case ("reset_password") : 
                include_once("view/reset_password.php");
            break;
        
            case ("my_schedule") :
                include_once ("view/my_schedule.php");
            break;
        
            case ("periode_schedule") :
                include_once ("view/periode_schedule.php");
            break;
        
            case ("periode_class") :
                include_once ("view/periode_class.php");
            break;
        
            case ("periode_lesson") :
                include_once ("view/periode_lesson.php");
            break;
        
            case ("my_class") :
                include_once ("view/my_class.php");
            break;
            
            case ("view_class_schedule") :
                include_once ("view/view_class_schedule.php");
            break;
        
            case ("view_class_student") :
                include_once ("view/view_class_student.php");
            break;
            
            case ("view_class_score") :
                include_once ("view/view_class_score.php");
            break;
            
            case ("detail_student_score") :
                include_once ("view/detail_student_score.php");
            break;
        
            case ("my_lesson") :
                include_once ("view/my_lesson.php");
            break;
        
            case ("input_nilai") :
                include_once ("view/input_nilai.php");
            break;
            
            case ("children") :
                include_once ("view/children.php");
            break;
            
            case ("detail_siswa") :
                include_once ("view/detail_siswa.php");
            break;
        
            case ("detail_kelas_parent") :
                include_once ("view/detail_kelas_parent.php");
            break;
        
            case ("detail_nilai_parent") :
                include_once ("view/detail_nilai_parent.php");
            break;
            
            case ("beasiswa") :
                include_once ("view/beasiswa.php");
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