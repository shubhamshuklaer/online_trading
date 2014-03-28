<?php
//handles the search_querry(serch suggestions as well as serch results)
require_once "../database/class.MySQL.php";
$omysql=new MySQL();
if(isset($_POST["search_text"])&&!empty($_POST["search_text"])){
	$search_text=$_POST["search_text"];
	$where=array("search_query" => $search_text."%" );// the % is to let any number of char appear after $serch_text
	$result=$omysql->Select("search_history",$where,"num_reps DESC","",true,"AND");
	echo $omysql->lastQuery;
	echo "<br>".$omysql->records;
	if($result){
		echo '<ul>';
		if($omysql->records==1){
			echo "<li>".$result["search_query"]."</li>";
		}else if($omysql->records>1){
			 for($i=0;$i<$omysql->records;$i++)
				echo "<li>".$result[$i]["search_query"]."</li>";
		}
		echo '</ul>';
	}else{
		echo $omysql->lastError;
	}
}
?>