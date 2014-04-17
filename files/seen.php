<?php
session_start();
$id=$_REQUEST["id"];
include_once'class.MySQL.php';
$object=new MySQL();
$cost=$object->ExecuteSQL("SELECT * from items where item_id='$id'");
$row=$object->ExecuteSQL("UPDATE watch_list SET `previous_cost`='".$cost[0]["cost"]."' where user_nm='".$_SESSION['user_nm']."' and item_id='$id'");
?>