<?php
if(isset($_POST["search_text"])){
	require_once "class.MySQL.php";
	$user_nm="default";
	if(isset($_SESSION["user_nm"])){
		$user_nm=$_SESSION["user_nm"];
	}
	$omysql=new MySQL();
	$insert_var=array("user_nm" => $user_nm,"search_text"=>$_POST["search_text"] );
	$omysql->Insert();
}
?>