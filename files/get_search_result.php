<?php
require_once "class.MySQL.php";
if(isset($_POST["where_clause"])){
	$omysql=new MySQL();
	$where_obj=json_decode($_POST["where_clause"]);
	$where=array();
	foreach ($where_obj as $key => $value) {
		$where[$key]=$value;
	}
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
		if($omysql->records>0){
			$result=$omysql->arrayedResult;
			for($i=0;$i<count($result);$i++){
				$result[$i]["pic_loc"]=constant("HOSTNAME")."/upload/".$result[$i]["pic_loc"];
			}
			echo json_encode($result);

		}
	}

}
?>