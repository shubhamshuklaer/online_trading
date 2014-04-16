<?php
$curr=$_REQUEST["userid"];
include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                  $object=new MYSQL();
              $row=$object->ExecuteSQL("SELECT * from user where user_nm='".$_SESSION['user_nm']."'");
 	$pass=$row[0]['pass'];
 	$curr=sha1($curr);
 	if($pass==$curr)
 		echo "true";
 	else
 		echo "false";
?>