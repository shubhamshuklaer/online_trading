<?php
$userid=$_REQUEST["userid"];
if(!($connection=mysql_connect("localhost", "root", "")))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 if(!mysql_select_db("online_trading", $connection))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 else{
 	$rs=mysql_query("SELECT * from user where user_nm='$userid'");
 	if(mysql_num_rows($rs)>0)
 		echo "true";
 	else
 		echo "false";
 }
?>