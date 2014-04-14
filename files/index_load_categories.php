<?php
	require_once "class.MySQL.php";
	$omysql=new MySQL();
	$omysql->Select("categories");
	$result=$omysql->arrayedResult;
	if($omysql->records>0){
		$categories=array();
		foreach ($result as $row) {
			if(preg_match("/^[A-Za-z]+$/", $row["categories_name"])){
				$categories[]=array("category"=>$row["categories_name"],"sub_category"=>array());
			}
		}
		foreach ($result as $row) {
			if(preg_match("/^[A-Za-z]+:[A-Za-z]+$/", $row["categories_name"])){
				$temp=explode(":", $row["categories_name"]);
				for($i=0;$i<count($categories);$i++){
					if($categories[$i]["category"]==$temp[0])
						$categories[$i]["sub_category"][] =$temp[1];
				}
			}
		}
		foreach ($categories as $row) {
			if(count($row["sub_category"])>0){
    			echo "<li><a href='".$row["category"]."' class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown'>";
    			echo $row["category"]."</a>";
    			echo "<ul class='dropdown-menu dropdown-menu-right' style='right:-85%; top:0%' role='menu' aria-labelledby='dropdownMenu'>";
    			foreach ($row["sub_category"] as $value) {
    				echo "<li><a tabindex='-1' href='".$row["category"].":".$value."'>".$value."</a></li>";		
    			}
    			echo "</ul>";

			}else{
				echo "<li><a href='".$row["category"]."'>".$row["category"]."</a></li>";
			}
		}
	}
?>