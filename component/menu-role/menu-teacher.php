<?php
switch($link)
{
    case "home":
        echo "
        <li class='active'>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_schedule'><span>My Schedule</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>My Class</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>My Lesson</span></a>
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
            <a href='index.php?page=my_schedule'><span>My Schedule</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>My Class</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>My Lesson</span></a>
        </li>
         
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;
    
    case "my_class": case "periode_class" : 
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_schedule'><span>My Schedule</span></a>
        </li>
      
        <li class='active'>
            <a href='index.php?page=my_class'><span>My Class</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>My Lesson</span></a>
        </li>
         
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
    break;

    case "my_lesson": case "periode_lesson" :
        echo "
        <li>
            <a href='index.php?page=home'><span>Home</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_schedule'><span>My Schedule</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>My Class</span></a>
        </li>
        
        <li class='active'>
            <a href='index.php?page=my_lesson'><span>My Lesson</span></a>
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
            <a href='index.php?page=my_schedule'><span>My Schedule</span></a>
        </li>
      
        <li>
            <a href='index.php?page=my_class'><span>My Class</span></a>
        </li>
        
        <li>
            <a href='index.php?page=my_lesson'><span>My Lesson</span></a>
        </li>
         
        <li class='last'>
            <a href='index.php?page=logout'><span>Logout</span></a>
        </li>";
}
?>