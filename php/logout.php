<?php   
session_start();  
//unset($_SESSION);  
session_destroy();  
header("location:../pages/login.html");  
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
?> 