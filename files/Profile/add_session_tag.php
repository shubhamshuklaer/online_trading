<?php
session_start();
$product_id=$_REQUEST["id"];
$_SESSION['session_tag']=$product_id;
?>