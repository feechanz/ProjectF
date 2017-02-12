<div class='cssmenu'>
    <ul>
        <?php 
            if(!isset($_SESSION['isLogin']))
            {
                $_SESSION['isLogin']=false;
            }
            if($_SESSION['isLogin'])
            {
                if($_SESSION['role'] == "admin")
                {
                    include_once 'menu-role/menu-admin.php';
                }
                else if($_SESSION['role'] == "staff")
                {
                    include_once 'menu-role/menu-staff.php';
                }
                
            }
            else
            {
                include_once 'menu-role/menu-guest.php';
            }
        ?>
        
        <div class="clear"></div>
    </ul>
</div>