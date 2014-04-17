<?php
 // get the q parameter from URL
$id=$_REQUEST["id"];
include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                  $object=new MYSQL();
              $row=$object->ExecuteSQL("DELETE from wish_list where id='".$id."'");
?> 