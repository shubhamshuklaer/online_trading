<?php
session_start();
$id=$_REQUEST["id"];
include_once'class.MySQL.php';
$object=new MySQL();
$row=$object->ExecuteSQL("DELETE from auction_bidder where item_id='$id' and user_nm='".$_SESSION['user_nm']."'");
?>