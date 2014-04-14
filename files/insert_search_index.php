<?php
require_once "class.MySQL.php";
$get_item_nm=array_map('strtolower',preg_split('/[\s]+/', trim(preg_replace("/\b[^\s]{1,3}\b/","",$passed_item_nm))));
/*regex explained \b ensures that we are at word boundary [^\s]{1,3} matches 1-3 letters(any) 
the \b at both end ensures that its a word and not any set of 3 character from in between the word too*/
$get_item_description=array_map('strtolower',preg_split('/[\s]+/', trim(preg_replace("/\b[^\s]{1,3}\b/","",$passed_item_description))));
$get_item_type=array();
$get_item_category;
$get_item_tags;
$o_item_id_mysql=new MySQL();
$o_item_id_mysql->Select("items","","item_id DESC","1");
$result_array=$o_item_id_mysql->arrayedResult;
$get_item_id=$result_array[0]["item_id"];
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
$insert_data_structure=array();
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
	$insert_data_structure[]=$temp;
}


$omysql_insert_index=new MySQL();
foreach ($insert_data_structure as $row) {
	$omysql_insert_index->Insert($row,"search_index");
}
?>