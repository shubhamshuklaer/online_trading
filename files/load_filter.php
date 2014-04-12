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
				$temp1=array();
				foreach ($temp_category_distribution as $key=>$value) {
					$temp=explode(":",$key);
					if(isset($temp1[$temp[0]]))
						$temp1[$temp[0]]+=$value;
					else
						$temp1[$temp[0]]=$value;
				}
				// $temp1=array_count_values($temp1);
				foreach ($temp1 as $key => $value) {
					$category_distribution[]=array("category"=>$key,"count"=>$value,"sub_category"=>array());
				}
				foreach ($temp_category_distribution as $key=>$value) {
					if(preg_match("/^[A-Za-z]+:[A-Za-z]+$/", $key)){
						$temp=explode(":", $key);
						for($i=0;$i<count($category_distribution);$i++){
							if($category_distribution[$i]["category"]==$temp[0])
								$temp1=array();
								$temp1["sub_category_name"]=$temp[1];
								$temp1["count"]=$value;
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
				// $cost_span=$max_cost-$min_cost;
				$temp=100;
				while($temp<=$min_cost){
					if($temp==100)	
						$temp+=400;
					else
						$temp+=500;
				}
				sort($costs);
				$temp_count=0;
				// print_r($costs);
				foreach ($costs as $value) {
					if($value>=$temp){
						$temp1=array();
						$temp1["less_than"]=$temp;
						$temp1["count"]=$temp_count;
						$cost_distribution[]=$temp1;
						$temp_count=1;
						if($temp==100)
							$temp=500;
						else
							$temp+=500;
					}else{
						$temp_count++;
					}
				}
				$temp1=array();
				$temp1["less_than"]=$temp;
				$temp1["count"]=$temp_count;
				$cost_distribution[]=$temp1;
				// print_r($cost_distribution);
				//the last cost_distribution will have to be added seperately as for that $value may not become >=$temp
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