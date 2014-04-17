<?php

session_start();
session_unset($_SESSION['user_nm']);
session_unset($_SESSION['authentication']);
session_unset($_SESSION['name']);
setcookie("user_nm","",time()-3600,'/');
header("Location: login.php");
?>