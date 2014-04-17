<?php
$id=$_REQUEST["id"];
include_once'class.MySQL.php';
$object=new MySQL();
$row=$object->ExecuteSQL("DELETE from auction_bidder where bid_id='$id'");
?>