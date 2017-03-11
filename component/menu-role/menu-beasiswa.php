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
            <a href='index.php?page=beasiswa'><span>Beasiswa</span></a>
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
            <a href='index.php?page=beasiswa'><span>Beasiswa</span></a>
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
            <a href='index.php?page=beasiswa'><span>Beasiswa</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break; 

    case "beasiswa": case "bobot_beasiswa": case "calon_beasiswa" : case "class_beasiswa" :
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
            <a href='index.php?page=beasiswa'><span>Beasiswa</span></a>
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
        <li >
            <a  href='index.php?page=about'><span>Tentang Kami</span></a>
        </li>
        <li >
            <a href='index.php?page=news'><span>Berita</span></a>
        </li>
        <li class='has-sub'>
            <a href='index.php?page=beasiswa'><span>Beasiswa</span></a>
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
            <a href='index.php?page=beasiswa'><span>Beasiswa</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
}
?>