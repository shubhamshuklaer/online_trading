<?php
 // get the q parameter from URL
$id=$_REQUEST["id"];
if(!($connection=mysql_connect("localhost", "root", "")))
header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
if(!mysql_select_db("online_trading", $connection))
header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
else{
		session_start();
      $rs=mysql_query("DELETE from watch_list where item_id='".$id."' and user_nm='".$_SESSION['user_nm']."'");
      mysql_close($connection);
    }
?> 