<?php
 // get the q parameter from URL
$id=$_REQUEST["id"];
if(!($connection=mysql_connect("localhost", "root", "")))
header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
if(!mysql_select_db("online_trading", $connection))
header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
else{
      $rs=mysql_query("DELETE from items where item_id='".$id."'");
      mysql_close($connection);
    }
?> 