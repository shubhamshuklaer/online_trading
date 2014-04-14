<?php
if($omysql->records>0){
	$result=$omysql->arrayedResult;
	foreach($result as $row){
		echo "<li>";
		echo $row["item_nm"];
		echo "</li>";
	}
}
?>