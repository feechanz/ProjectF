<?php
switch($link)
{
    case "home":
        echo "
        <li class='active'>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li>
            <a href='index.php?page=about'><span>About</span></a>
        </li>
        <li>
            <a href='index.php?page=news'><span>News</span></a>
        </li>
        <li class='has-sub'>
            <a href='index.php?page=children'><span>Children</span></a>
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
            <a  href='index.php?page=about'><span>About</span></a>
        </li>
        <li>
            <a href='index.php?page=news'><span>News</span></a>
        </li>
        <li class='has-sub'>
            <a href='index.php?page=children'><span>Children</span></a>
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
            <a  href='index.php?page=about'><span>About</span></a>
        </li>
        <li class='active'>
            <a href='index.php?page=news'><span>News</span></a>
        </li>
        <li class='has-sub'>
            <a href='index.php?page=children'><span>Children</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break; 

    case "children": case "detail_siswa" : case "detail_kelas_parent" : case "detail_nilai_parent" :
        echo "
        <li >
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        <li >
            <a  href='index.php?page=about'><span>About</span></a>
        </li>
        <li >
            <a href='index.php?page=news'><span>News</span></a>
        </li>
        <li class='has-sub active'>
            <a href='index.php?page=children'><span>Children</span></a>
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
            <a  href='index.php?page=about'><span>About</span></a>
        </li>
        <li >
            <a href='index.php?page=news'><span>News</span></a>
        </li>
        <li class='has-sub'>
            <a href='index.php?page=children'><span>Children</span></a>
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
            <a  href='index.php?page=about'><span>About</span></a>
        </li>
        <li >
            <a href='index.php?page=news'><span>News</span></a>
        </li>
        <li class='has-sub'>
            <a href='index.php?page=children'><span>Children</span></a>
        </li>
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
}
?>