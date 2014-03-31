<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css">
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row" role="header">
			<?php include_once "../structure/header.php";?> 
		</div>
	
		<div class="container">
				<!--Navigation sidebar-->
				<?php include_once "../structure/navigation.php";?>
				<!--Main Content area--> 
		        <div class="container-fluid">
		            <div class="row">
		        		<input  type="search" placeholder="search.." id="search_query" name="search_query" />
		        		<input type="button" value="Search" onclick="search()" />
					</div>
					
	    		</div>
		</div>
	</div>
	<!--All javascript placed at the end so that the page loads faster-->
	<script type="text/javascript" src="../js/vendor/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="search_suggestions.js"></script>
</body>
</html>