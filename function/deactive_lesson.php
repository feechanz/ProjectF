<?php
    include_once 'config.php';
    include_once 'koneksi.php';
    include_once '../dao/Lesson.php';
    include_once '../dao/LessonDao.php';
    if(isset($_GET['lessonid']))
    {
        $lessonid = $_GET['lessonid'];
        $lessondao = new LessonDao();
        $lessondao ->update_status(0, $lessonid);
    }
    
    echo "<script>window.location='../index.php?page=lesson'; </script>";
?>