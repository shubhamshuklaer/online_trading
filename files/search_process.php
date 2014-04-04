<?php
require_once "class.MySQL.php";
if(isset($_GET["search_bar"])){
	$search_text=$_GET["search_bar"];
	if(isset($_GET["correct_spell"]))
		$correct_spell=$_GET["correct_spell"];
	else
		$correct_spell=0;
	$omysql=new MySQL();
	$where=array("item_nm like"=>$search_text."%");
	$omysql->Select("items",$where);
	
}
?>