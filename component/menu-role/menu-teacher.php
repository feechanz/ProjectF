<?php
switch($link)
{
    case "home":
        echo "
        <li class='active'>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_schedule'><span>Jadwal</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>Wali Kelas</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>Mengajar</span></a>
        </li>
        <li class='has-sub' >
            <a href='index.php?page=change_password'><span>Profil</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break; 
    
    case "my_schedule": case "periode_schedule" :
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li class='active'>
            <a href='index.php?page=my_schedule'><span>Jadwal</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>Wali Kelas</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>Mengajar</span></a>
        </li>
        <li class='has-sub' >
            <a href='index.php?page=change_password'><span>Profil</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
    
    case "my_class": case "periode_class" : case "view_class_schedule" :case "view_class_student" : case "view_class_score" : case "detail_student": case "detail_student_score": case "detailkelas": case "UTSReport" : case "UASReport" :
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_schedule'><span>Jadwal</span></a>
        </li>
      
        <li class='active'>
            <a href='index.php?page=my_class'><span>Wali Kelas</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>Mengajar</span></a>
        </li>
        <li class='has-sub' >
            <a href='index.php?page=change_password'><span>Profil</span></a>
        </li> 
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;

    case "my_lesson": case "periode_lesson" : case "input_nilai": case "input_nilai_ekskul":
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_schedule'><span>Jadwal</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>Wali Kelas</span></a>
        </li>
        
        <li class='active'>
            <a href='index.php?page=my_lesson'><span>Mengajar</span></a>
        </li>
        <li class='has-sub' >
            <a href='index.php?page=change_password'><span>Profil</span></a>
        </li> 
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;

    case "change_password":
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_schedule'><span>Jadwal</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>Wali Kelas</span></a>
        </li>
        
        <li >
            <a href='index.php?page=my_lesson'><span>Mengajar</span></a>
        </li>
        <li class='has-sub active' >
            <a href='index.php?page=change_password'><span>Profil</span></a>
        </li> 
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;

    default:
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
         <li>
            <a href='index.php?page=my_schedule'><span>Jadwal</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>Wali Kelas</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>Mengajar</span></a>
        </li>
        
        <li class='has-sub' >
            <a href='index.php?page=change_password'><span>Profil</span></a>
        </li> 
        
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
}
?>