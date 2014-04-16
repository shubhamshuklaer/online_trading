<?php
require_once "class.MySQL.php";
$get_item_id=$_GET["item_id"];
$omysql_update_index=new MySQL();
$where_update_index=array("item_id"=>$get_item_id);
$omysql_update_index->Select("items");
$result_array=$omysql_update_index->arrayedResult;
if($omysql_insert_index->records>0){
	$get_item_nm=array_map('strtolower',preg_split('/[\s]+/', trim(preg_replace("/\b[^\s]{1,3}\b/","",$result_array[0]["item_nm"]))));
	/*regex explained \b ensures that we are at word boundary [^\s]{1,3} matches 1-3 letters(any) 
	the \b at both end ensures that its a word and not any set of 3 character from in between the word too*/
	$get_item_description=array_map('strtolower',preg_split('/[\s]+/', trim(preg_replace("/\b[^\s]{1,3}\b/","",$result_array[0]["description"]))));
	$get_item_type=array();
	$get_item_category=array();
	$get_item_tags;

	require_once "PorterStemmer2.php";
	require_once "StringBuilder.php";
	$oporter_stemmer=new PorterStemmer2();
	for($i=0;$i<count($get_item_nm);$i++){
	$get_item_nm[$i]=$oporter_stemmer->Stem($get_item_nm[$i]);
	//echo $get_item_nm[$i]."<br>";
	}
	for($i=0;$i<count($get_item_description);$i++){
	$get_item_description[$i]=$oporter_stemmer->Stem($get_item_description[$i]);
	//echo $get_item_description[$i]."<br>";
	}
	$unique_terms=array_unique(array_merge($get_item_nm,$get_item_description));
	$value_count_item_nm=array_count_values($get_item_nm);
	$value_count_item_description=array_count_values($get_item_description);
	$update_data_structure=array();
	$temp=array();
	foreach ($unique_terms as $value) {
		$temp["search_term"]=$value;
		$temp["item_id"]=$get_item_id;
		/// in item_name
		if(isset($value_count_item_nm[$value]))
			$temp["rep_name"]=$value_count_item_nm[$value];
		else
			$temp["rep_name"]=0;
		/////////////////// in item_descreption
		if(isset($value_count_item_description[$value]))
			$temp["rep_description"]=$value_count_item_description[$value];
		else
			$temp["rep_description"]=0;
		$update_data_structure[]=$temp;
	}


	$omysql_update_index=new MySQL();
	foreach ($update_data_structure as $row) {
		$update_where=array("search_term ="=>$row["search_term"],"and item_id ="=>$row["item_id"]);
		$omysql_update_index->Update("search_index",$row,$update_where);
		print_r($row);
		echo "<br>";
		echo $omysql_update_index->lastQuery;
		echo "<br>";
	}
}
?>