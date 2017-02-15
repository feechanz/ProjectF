<?php

session_destroy();
//header("location:login.php");
$_SESSION['isLogin'] = false;
echo "<script>window.location='index.php?page=home'; </script>";	

?>