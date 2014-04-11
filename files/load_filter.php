<?php
// the responce will be of form of array of associative array(category name and options)
if(isset($_POST["search_term"])){
	$search_term=$_POST["search_term"];
	require_once "class.MySQL.php";
	$omysql=new MySQL();
	$where=array("search_term ="=>$search_term);
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
		$cost_distribution=array();
		$category_distribution=array();
		$type_distribution=array();
		$costs=array();
		$types=array();
		$categories=array();
		if($omysql->records>0){
			$result=$omysql->arrayedResult;
			foreach ($result as $row) {
				$costs[]=$row["cost"];
				$categories[]=$row["category"];
				$types[]=$row["type"];
			}
			//calulating type_distribution
				$temp_category_distribution=array_count_values($categories);
				foreach ($temp_category_distribution as $key=>$value) {
					if(preg_match("/^[A-Za-z]+$/", $key)){
						$category_distribution[]=array("category"=>$key,"sub_category"=>array());
					}
				}
				foreach ($temp_category_distribution as $key=>$value) {
					if(preg_match("/^[A-Za-z]+:[A-Za-z]+$/", $key)){
						$temp=explode(":", $key);
						for($i=0;$i<count($category_distribution);$i++){
							if($category_distribution[$i]["category"]==$temp[0])
								$temp1=array();
								$temp1[$temp[1]]=$value;
								$category_distribution[$i]["sub_category"][] =$temp1;
						}
					}
				}
			//calculating category distribution ends
			$type_distribution=array_count_values($types);
			//calculating cost distribution
				$min_cost=0;
				$max_cost=0;
				foreach ($costs as $value) {
					if($max_cost<$value)
						$max_cost=$value;
					if($min_cost>$value)
						$min_cost=$value;
				}
				$cost_span=$max_cost-$min_cost;
				$temp=100;
				while($temp<=$min_cost){
					if($temp==100)	
						$temp+=400;
					else
						$temp+=500;
				}
				$temp1=array();
				sort($costs);
				$temp_count=0;
				foreach ($costs as $value) {
					if($value>=$temp){
						$temp1["less_than"]=$temp;
						$temp1["count"]=$temp_count;
						$cost_distribution[]=$temp1;
						$temp_count=0;
						if($temp==100)
							$temp=500;
						else
							$temp+=500;
					}else{
						$temp_count++;
					}
				}
			//cost_distribution ends

			$filter=array();
			$filter["category_distribution"]=$category_distribution;
			$filter["type_distribution"]=$type_distribution;
			$filter["cost_distribution"]=$cost_distribution;
			echo json_encode($filter);
		}
	}
}
?>