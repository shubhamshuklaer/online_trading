<?php

if(isset($_POST["category"])){
	require_once "class.MySQL.php";
	require_once "../config/config.php";
	$omysql=new MySQL();
	$where=array("category like"=>$_POST["category"]."%");
	$omysql->Select("items",$where);
	if($omysql->records>0){
		$result=$omysql->arrayedResult;
		$final_result=array();
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
?>
