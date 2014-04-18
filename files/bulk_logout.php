<?php
session_start();
session_unset($_SESSION['user_nm_bulk']);
session_unset($_SESSION['authentication_bulk']);
session_unset($_SESSION['name']);
setcookie("user_nm_bulk","",time()-3600,'/');
header("Location: bulk_vendor_login.php");
?>
