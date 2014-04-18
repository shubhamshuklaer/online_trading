<?php
// the responce will be of form of array of associative array(category name and options)
if(isset($_POST["search_term"])){
	$search_term=$_POST["search_term"];
	require_once "class.MySQL.php";
	$omysql=new MySQL();
	/////////////////////////////////////////////////////////////
	$where_index=array();
	$search_term_array=array_map('strtolower',preg_split('/[\s]+/', trim($search_term)));
	require_once "PorterStemmer2.php";
	require_once "StringBuilder.php";
	$oporter_stemmer=new PorterStemmer2();
	for($i=0;$i<count($search_term_array);$i++)
		$search_term_array[$i]=$oporter_stemmer->Stem($search_term_array[$i]);
	$search_term_array=array_unique($search_term_array);
	$search_item_id_ranks=array();
	foreach ($search_term_array as $value) {
		$where_index["search_term like"]=$value."%";
		$cols="item_id,rep_name as rank";
		$order_by="rank DESC";
		$omysql->Select("search_index",$where_index,$order_by,"",$cols);	
		$search_items=$omysql->arrayedResult;
		$temp=array();
		foreach ($search_items as $key=>$value) {
			$temp[$value["item_id"]]=$key;
		}
		$search_item_id_ranks[]=$temp;
	}
	$item_ids=array();
	foreach ($search_item_id_ranks as $key => $value) {
		foreach ($value as $key1 => $value1) {
			if(isset($item_ids[$key1]))
				$item_ids[$key1]+=$value1;
			else
				$item_ids[$key1]=$value1;
		}
	}

	
	asort($item_ids);// for sorting according to values key value pair remain same
	//item_ids is of form item_id => reps but we want just item_id so doing the following
	$item_ids_temp=array();
	foreach ($item_ids as $key => $value) 
		$item_ids_temp[]=$key;
	$item_ids=$item_ids_temp;
	/////////////////////////
	//////////////////////////////////////////////////////////

	
	if(count($item_ids)>0){
		
		$query="Select * from items where item_id IN (".implode(",",$item_ids).")  AND quantity>0 order by FIELD( item_id,".implode(",",$item_ids).") ";
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
		$conditions=array();
		if($omysql->records>0){
			$result=$omysql->arrayedResult;
			// print_r($result);
			$final_result=array();
			foreach ($result as $row) {
				if($row["type"]=="auction"){
					if($row["last_date"]>date('Y-m-d H:i:s'))
						$final_result[]=$row;
				}else{
					$final_result[]=$row;
				}	
			}
			$result=$final_result;
			if(count($result)>0){
				foreach ($result as $row) {
					$costs[]=$row["cost"];
					$categories[]=$row["category"];
					$types[]=$row["type"];
					$conditions[]=$row["item_condition"];
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
								if($category_distribution[$i]["category"]==$temp[0]){
									$temp1=array();
									$temp1["sub_category_name"]=$temp[1];
									$temp1["count"]=$value;
									$category_distribution[$i]["sub_category"][] =$temp1;
								}
							}

						}
					}
				//calculating category distribution ends
				$type_distribution=array_count_values($types);
				///calcutating condition distribution
				$condition_distribution=array_count_values($conditions);
				//calculating cost distribution
					$min_cost=$costs[0];
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
					$temp1=array();
					$temp1["greater_than_equal_to"]=$min_cost;
					foreach ($costs as $value) {
						if($value>=$temp){
							$temp1["less_than"]=$temp;
							$temp1["count"]=$temp_count;
							$cost_distribution[]=$temp1;
							while($value>=$temp){
								if($temp==100)
									$temp=500;
								else
									$temp+=500;
							}
							$temp_count=1;
							$temp1["greater_than_equal_to"]=($temp==500)?100:$temp-500;
						}else{
							$temp_count++;
						}
					}
					$temp1=array();
					$temp1["less_than"]=$temp;
					$temp1["count"]=$temp_count;
					$temp1["greater_than_equal_to"]=($temp==500)?100:$temp-500;
					$cost_distribution[]=$temp1;
					// print_r($cost_distribution);
					//the last cost_distribution will have to be added seperately as for that $value may not become >=$temp
				//cost_distribution ends

					$filter=array();
					$filter["category_distribution"]=$category_distribution;
					$filter["type_distribution"]=$type_distribution;
					$filter["cost_distribution"]=$cost_distribution;
					$filter["condition_distribution"]=$condition_distribution;
					echo json_encode($filter);
				
			}
		}
	}
}
?>