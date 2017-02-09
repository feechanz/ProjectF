<div class='cssmenu'>
    <ul>
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
                        <a href='index.php?page=staff'><span>Staff</span></a>
                    </li>
                    <li class='has-sub'>
                        <a href='index.php?page=contact'><span>Contact</span></a>
                    </li>
                    <li class='last'>
                        <a href='index.php?page=login'><span>Login</span></a>
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
                        <a href='index.php?page=staff'><span>Staff</span></a>
                    </li>
                    <li class='has-sub'>
                        <a href='index.php?page=contact'><span>Contact</span></a>
                    </li>
                    <li class='last'>
                        <a href='index.php?page=login'><span>Login</span></a>
                    </li>";
                break; 

                case "staff":
                    echo "
                    <li >
                        <a href='index.php?page=home'><span>Home</span></a>
                    </li>
                    <li >
                        <a  href='index.php?page=about'><span>About</span></a>
                    </li>
                    <li class='active'>
                        <a href='index.php?page=staff'><span>Staff</span></a>
                    </li>
                    <li class='has-sub'>
                        <a href='index.php?page=contact'><span>Contact</span></a>
                    </li>
                    <li class='last'>
                        <a href='index.php?page=login'><span>Login</span></a>
                    </li>";
                break; 

                case "contact":
                    echo "
                    <li >
                        <a href='index.php?page=home'><span>Home</span></a>
                    </li>
                    <li >
                        <a  href='index.php?page=about'><span>About</span></a>
                    </li>
                    <li >
                        <a href='index.php?page=staff'><span>Staff</span></a>
                    </li>
                    <li class='has-sub active'>
                        <a href='index.php?page=contact'><span>Contact</span></a>
                    </li>
                    <li class='last'>
                        <a href='index.php?page=login'><span>Login</span></a>
                    </li>";
                break; 

                case "login":
                    echo "
                    <li >
                        <a href='index.php?page=home'><span>Home</span></a>
                    </li>
                    <li >
                        <a  href='index.php?page=about'><span>About</span></a>
                    </li>
                    <li >
                        <a href='index.php?page=staff'><span>Staff</span></a>
                    </li>
                    <li class='has-sub'>
                        <a href='index.php?page=contact'><span>Contact</span></a>
                    </li>
                    <li class='last active'>
                        <a href='index.php?page=login'><span>Login</span></a>
                    </li>";
                break; 
            }
        ?>
        
        <div class="clear"></div>
    </ul>
</div>