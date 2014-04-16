<?php 
session_start();
$product_id=$_REQUEST["id"];
unset($_SESSION['wishlist_product_id']);
$_SESSION['wishlist_product_id']=$product_id;
?>