<?php
require_once "class.MySQL.php";
$suggestions=array();
$temp=array();
$omysql=new MySQL();
if(isset($_GET["search_text"])&&!empty($_GET["search_text"])){
	$search_text=$_GET["search_text"];
	session_start();
	if(isset($_SESSION["user_nm"])){
		//personal history
		$where=array("user_nm LIKE" =>$_SESSION['user_nm']," AND search_text LIKE "=>$search_text."%");// the % is to let any number of char appear after $serch_text
		$result=$omysql->Select("search_history",$where,"num_reps DESC, timestamp DESC");
			for($i=0;$i<$omysql->records;$i++){
		 		$temp["search_text"]=$result[$i]["search_text"];
		 		$temp["personal"]=true;
		 		$suggestions[]=$temp;
			}
		//other's history
		$where=array("user_nm NOT LIKE" =>$_SESSION['user_nm'],"AND search_text LIKE "=>$search_text."%");// the % is to let any number of char appear after $serch_text
		$result=$omysql->Select("search_history",$where,"num_reps DESC, timestamp DESC");
			for($i=0;$i<$omysql->records;$i++){
		 		$temp["search_text"]=$result[$i]["search_text"];
		 		$temp["personal"]=false;
		 		$suggestions[]=$temp;
			}
	}else{
		$where=array("search_text LIKE"=> $search_text."%");// the % is to let any number of char appear after $serch_text
		$result=$omysql->Select("search_history",$where,"num_reps DESC, timestamp DESC");
			for($i=0;$i<$omysql->records;$i++){
		 		$temp["search_text"]=$result[$i]["search_text"];
		 		$temp["personal"]=false;
		 		$suggestions[]=$temp;
			}
	}

	$unique_suggestions=array();

	$count_suggestions=count($suggestions);
	for($i=0;$i<$count_suggestions;$i++){
		$j=0;
		$temp=count($unique_suggestions);
		while($j<$temp&&$unique_suggestions[$j]["search_text"]!=$suggestions[$i]["search_text"])
			$j++;
		if($j==$temp){
			$unique_suggestions[]=$suggestions[$i];
		}
	}
	
	echo json_encode($unique_suggestions);
}

?>