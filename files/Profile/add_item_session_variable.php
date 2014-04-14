<?php 
session_start();
$product_id=$_REQUEST["id"];
unset($_SESSION['product_id']);
$_SESSION['product_id']=$product_id;
//$sa=$_SESSION['product_id'];
//echo "<script type='text/javascript'>alert('$product_id');</script>";
?>