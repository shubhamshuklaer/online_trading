<?php
// handles the search_querry(serch suggestions as well as serch results)
// require_once "class.MySQL.php";
// $omysql=new MySQL();
// if(isset($_POST["search_text"])&&!empty($_POST["search_text"])){
// 	$search_text=$_POST["search_text"];
// 	$where=array("search_query" => $search_text."%" );// the % is to let any number of char appear after $serch_text
// 	$result=$omysql->Select("search_history",$where,"num_reps DESC","",true,"AND");
// 	if($result){
//  		$suggestions=array();
// 		if($omysql->records==1){
// 		 	$suggestions[]=$result["search_query"];
// 		}else if($omysql->records>1){
// 		 	for($i=0;$i<$omysql->records;$i++)
// 		 		$suggestions[]=$result[$i]["search_query"];
// 		}
// 		echo json_encode($suggestions);
// 	}else{
// 		echo json_encode($omysql->lastError);
// 	}
// }

// require_once "class.MySQL.php";
// $omysql=new MySQL();
// if(isset($_SESSION("user_nm"))){
	
// }
$testing= array("shubham","shukla");
echo json_encode($testing);

?>