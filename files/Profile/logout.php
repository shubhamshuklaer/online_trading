<?php

session_start();
session_unset($_SESSION['user_nm']);
session_unset($_SESSION['name']);
session_unset($_SESSION['pass']);
session_unset($_SESSION['credit']);
session_unset($_SESSION['address']);
session_unset($_SESSION['phone']);
session_unset($_SESSION['email']);
setcookie("user_nm","",time()-3600,'/');
header("Location: http://localhost/online_trading/files/Profile/login.php");
?>