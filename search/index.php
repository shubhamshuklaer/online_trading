<?php
include_once "../config/config.php";
$db=mysqli_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"));
//include_once "../database/class.MySQL.php";
//$omysql= new MySQL();

?>
<html>
<title>Search</title>
<body>
	<input type="text" name="search_txt">
	<input type="button" name="search" value="Search">
</body>
<script type="text/javascript" src="../js/vendor/jquery.js"></script>
<script type="text/javascript" src="search_suggestions.js"></script>
</html>
