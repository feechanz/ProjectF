<?php
switch($link)
{
    case "home":
        echo "
        <li class='active'>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=about'><span>Tentang Kami</span></a>
        </li>
        <li>
            <a href='index.php?page=news'><span>Berita</span></a>
        </li>
      
        <li class='has-sub'>
            <a href='index.php?page=view_registration'><span>Lihat Pendaftaran</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break; 


    case "about":
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li class='active'>
            <a  href='index.php?page=about'><span>Tentang Kami</span></a>
        </li>
        <li>
            <a href='index.php?page=news'><span>Berita</span></a>
        </li>
        
        <li class='has-sub'>
            <a href='index.php?page=view_registration'><span>Lihat Pendaftaran</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break; 

    case "news":
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li >
            <a  href='index.php?page=about'><span>Tentang Kami</span></a>
        </li>
        <li class='active'>
            <a href='index.php?page=news'><span>Berita</span></a>
        </li>
        
        <li class='has-sub'>
            <a href='index.php?page=view_registration'><span>Lihat Pendaftaran</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break; 

    case "view_registration": case "registration_score": case "announcement":
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li >
            <a  href='index.php?page=about'><span>Tentang Kami</span></a>
        </li>
        <li >
            <a href='index.php?page=news'><span>Berita</span></a>
        </li>
        
        <li class='has-sub active'>
            <a href='index.php?page=view_registration'><span>Lihat Pendaftaran</span></a>
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
        <li >
            <a  href='index.php?page=about'><span>Tentang Kami</span></a>
        </li>
        <li >
            <a href='index.php?page=news'><span>Berita</span></a>
        </li>
       
        <li class='has-sub'>
            <a href='index.php?page=view_registration'><span>Lihat Pendaftaran</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
}
?>