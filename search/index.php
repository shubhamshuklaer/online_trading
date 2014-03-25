<?php include_once "../database/class.MySQL.php";
$oMySql = new MySql();
//$oMySql->Select("test2");
echo $oMySql->lastError;
?>
<html>
<title>Search</title>
<body>
	<input type="text" name="search_txt">
	<input type="button" name="search" value="Search">
</body>
</html>
