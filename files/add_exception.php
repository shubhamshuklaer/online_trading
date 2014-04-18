<?php
$item_id=$_REQUEST["id"];
include_once 'class.MySQL.php';
				if(!isset($_SESSION))
                  session_start();
                  $object=new MySQL();
                  echo $_SESSION['user_nm'];
              $row=$object->ExecuteSQL("SELECT * from wish_list where user_nm='".$_SESSION['user_nm']."'");
              $temp=$row[0]['Exceptions'].$item_id.";";
              $row=$object->ExecuteSQL("UPDATE wish_list SET `Exceptions`='$temp' where user_nm='".$_SESSION['user_nm']."'");
              foreach ($_SESSION['wishlist_found'] as $key => $value) {
              	if($value!="")
              		$_SESSION['wishlist_found'][$key]=str_replace($item_id.";","",$value);
              }
?>
