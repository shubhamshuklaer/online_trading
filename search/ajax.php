<?php
//handles the search_querry(serch suggestions as well as serch results)
require_once "../database/class.MySQL.php";
$omysql=new MySQL();
if(isset($_POST["search_text"])&&!empty($_POST["search_text"])){
	$search_text=$_POST["search_text"];
	$where=array("serch_query" => $search_text );
	$omysql->Select("serch_history",$where,"","",true);
	echo "hello";
}
?>