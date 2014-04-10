<?php
require_once "class.MySQL.php";
if(isset($_GET["search_bar"])){
	$search_text=$_GET["search_bar"];
	if(isset($_GET["correct_spell"]))
		$correct_spell=$_GET["correct_spell"];
	else
		$correct_spell=0;
	$omysql=new MySQL();
	$where=array("search_term ="=>$search_text);
	$cols="item_id,rep_name as rank";
	$order_by="rank DESC";
	$omysql->Select("search_index",$where,$order_by,"",$cols);
	$search_items=$omysql->arrayedResult;
	$item_ids=array();
	if($omysql->records>0){
		foreach ($search_items as $row) {
			$item_ids[]=$row["item_id"];
		}
		$query="Select * from items where item_id IN (".implode(",",$item_ids).") order by FIELD( item_id,".implode(",",$item_ids).") ";
		/* 
		as item_ids are taken form database itself and 
		they are ints so no need for sanitization
		*/
		$omysql->ExecuteSQL($query);
	}
}
?>