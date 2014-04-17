<?php
$userid=$_REQUEST["userid"];
include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                  $object=new MYSQL();
              $row=$object->ExecuteSQL("SELECT * from user where user_nm='$userid'");
              if($row!="true")
              	echo "true";
              else
              	echo "false";
?>