<?php
require_once "class.MySQL.php";
if(isset($_POST["where_clause"])){
	$omysql=new MySQL();
	$where_obj=json_decode($_POST["where_clause"]);//$where_obj is stdclass object type and not array
	$where=array();
	foreach ($where_obj as $key => $value) {
		$where[$key]=$value;
	}
	$where_index=array();
	$search_term=$where["search_term"];
	$search_term_array=array_map('strtolower',preg_split('/[\s]+/', trim($search_term)));
	require_once "PorterStemmer2.php";
	require_once "StringBuilder.php";
	$oporter_stemmer=new PorterStemmer2();
	for($i=0;$i<count($search_term_array);$i++)
		$search_term_array[$i]=$oporter_stemmer->Stem($search_term_array[$i]);
	$search_term_array=array_unique($search_term_array);
	// print_r($search_term_array);
	$search_item_id_ranks=array();
	foreach ($search_term_array as $value) {
		$where_index["search_term like"]=$value."%";
		$cols="item_id,(5*clicks+2*rep_tags+2*rep_name + 2*rep_category + rep_description) as rank";
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
	if(count($item_ids)>0){
		$where_statement="";
		// print_r($where);
		foreach ($where as $key => $value) {
			if($key!="search_term" & $key!="limit")
				$where_statement.=	$key."'".$value."' AND ";
		}
		if($where_statement!=null){
			$where_statement=substr($where_statement,0,-5);
			$where_statement=" AND ". $where_statement;
		}
		$limit_statement=" ";
		if(isset($where["limit"]))
			$limit_statement=" limit ".$where["limit"]." ";
		// echo $where_statement;
		$query="Select * from items where item_id IN (".implode(",",$item_ids).") ".$where_statement." AND quantity>0 order by FIELD( item_id,".implode(",",$item_ids).") ".$limit_statement;
		/* 
		as item_ids are taken form database itself and 
		they are ints so no need for sanitization
		*/
		$omysql->ExecuteSQL($query);
		$final_result=array();
		if($omysql->records>0){
			$result=$omysql->arrayedResult;
			for($i=0;$i<count($result);$i++){

				$result[$i]["pic_loc"]="../upload/".$result[$i]["pic_loc"];
				if($result[$i]["type"]=="auction"){
					if($result[$i]["last_date"]>date('Y-m-d H:i:s'))
						$final_result[]=$result[$i];
				}else{
					$final_result[]=$result[$i];
				}
			}
			if(count($final_result)>0)
				echo json_encode($final_result);

		}
	}

}
?>