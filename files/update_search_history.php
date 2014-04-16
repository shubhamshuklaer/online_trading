<?php
if(isset($_POST["search_term"])){
	$search_text=$_POST["search_term"].trim();
	require_once "class.MySQL.php";
	session_start();
	$user_nm="default";
	if(isset($_SESSION["user_nm"])){
		$user_nm=$_SESSION["user_nm"];
	}
	$omysql=new MySQL();
	$select_where=array("user_nm =" =>$user_nm ,"and search_text like"=>$search_text );
	$omysql->Select("search_history",$select_where);
	print_r($omysql->lastQuery);
	if($omysql->records>0){
		$search_id=$omysql->arrayedResult[0]["search_id"];
		$update_where=array("search_id ="=>$search_id);
		$set=array("num_reps"=>$omysql->arrayedResult[0]["num_reps"]+1);
		$omysql->Update("search_history",$set,$update_where);	
		echo "Updated search history";
	}else{
		$insert_var=array("user_nm" => $user_nm,"search_text"=>$search_text );
		$omysql->Insert($insert_var,"search_history");
		echo "inserted search_history";	
	}
}
?>