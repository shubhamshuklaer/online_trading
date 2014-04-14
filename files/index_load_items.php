<?php

if(isset($_POST["category"])){
	require_once "class.MySQL.php";
	require_once "../config/config.php";
	$omysql=new MySQL();
	$where=array("category like"=>$_POST["category"]);
	$omysql->Select("items",$where);
	if($omysql->records>0){
		$result=$omysql->arrayedResult;
		for($i=0;$i<count($result);$i++){
			$result[$i]["pic_loc"]=constant("HOSTNAME")."/upload/".$result[$i]["pic_loc"];
		}
		echo json_encode($result);
	}
}
?>
