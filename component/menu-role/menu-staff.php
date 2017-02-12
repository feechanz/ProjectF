<?php
switch($link)
{
    case "home":
        echo "
        <li class='active'>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=promotion'><span>Promosi</span></a>
        </li>
        <li>
            <a href='index.php?page=master_data'><span>Data Master</span></a>
        </li>
        <li>
            <a href='index.php?page=jadwal_kelas'><span>Jadwal & Kelas</span></a>
        </li>
         <li>
            <a href='index.php?page=user'><span>Pengguna</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
        
    case "promotion":
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li class='active'>
            <a href='index.php?page=promotion'><span>Promosi</span></a>
        </li>
        <li>
            <a href='index.php?page=master_data'><span>Data Master</span></a>
        </li>
        <li>
            <a href='index.php?page=jadwal_kelas'><span>Jadwal & Kelas</span></a>
        </li>
         <li>
            <a href='index.php?page=user'><span>Pengguna</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
        
    case "master_data": case "lesson": case "edit_lesson" : case "edit_teacher": case "teacher" : case "student" :
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=promotion'><span>Promosi</span></a>
        </li>
        <li class='active'>
            <a href='index.php?page=master_data'><span>Data Master</span></a>
        </li>
        <li>
            <a href='index.php?page=jadwal_kelas'><span>Jadwal & Kelas</span></a>
        </li>
         <li>
            <a href='index.php?page=user'><span>Pengguna</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
        
    case "jadwal_kelas":
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=promotion'><span>Promosi</span></a>
        </li>
        <li>
            <a href='index.php?page=master_data'><span>Data Master</span></a>
        </li>
        <li class='active'>
            <a href='index.php?page=jadwal_kelas'><span>Jadwal & Kelas</span></a>
        </li>
         <li>
            <a href='index.php?page=user'><span>Pengguna</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
        
    case "user":
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=promotion'><span>Promosi</span></a>
        </li>
        <li>
            <a href='index.php?page=master_data'><span>Data Master</span></a>
        </li>
        <li>
            <a href='index.php?page=jadwal_kelas'><span>Jadwal & Kelas</span></a>
        </li>
        <li class='active'>
            <a href='index.php?page=user'><span>Pengguna</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
    
    case "logout":
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=promotion'><span>Promosi</span></a>
        </li>
        <li>
            <a href='index.php?page=master_data'><span>Data Master</span></a>
        </li>
        <li>
            <a href='index.php?page=jadwal_kelas'><span>Jadwal & Kelas</span></a>
        </li>
         <li>
            <a href='index.php?page=user'><span>Pengguna</span></a>
        </li>
        <li class='last active'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
    
    default:
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=promotion'><span>Promosi</span></a>
        </li>
        <li>
            <a href='index.php?page=master_data'><span>Data Master</span></a>
        </li>
        <li>
            <a href='index.php?page=jadwal_kelas'><span>Jadwal & Kelas</span></a>
        </li>
         <li>
            <a href='index.php?page=user'><span>Pengguna</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
}
?>