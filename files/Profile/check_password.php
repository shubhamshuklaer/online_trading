<?php
$curr=$_REQUEST["userid"];
if(!($connection=mysql_connect("localhost", "root", "")))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 if(!mysql_select_db("online_trading", $connection))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 else{
 	session_start();
 	$rs=mysql_query("SELECT * from user where user_nm='".$_SESSION['user_nm']."'");
 	$row=mysql_fetch_assoc($rs);
 	$pass=$row['pass'];
 	$curr=sha1($curr);
 	if($pass==$curr)
 		echo "true";
 	else
 		echo "false";
 }
?>