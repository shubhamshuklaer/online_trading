<?php
$item_id=$_REQUEST["id"];
include_once 'class.MySQL.php';
				if(!isset($_SESSION))
                  session_start();
                  $object=new MySQL();
                  $row=$object->ExecuteSQL("DELETE  from auction_bidder where user_nm='".$_SESSION['user_nm']."'and item_id='$item_id'");
?>