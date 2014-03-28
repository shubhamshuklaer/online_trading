<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title></title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
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
		           <!--
						Write all
						your code
						here...
						It will appear in the content 
						section of webpage
		           -->
		            <div class="row">
		        		<input autosuggest="off" type="text" placeholder="search.." id="search_query" name="search_query" />
		        		<input type="button" value="Search" onclick="search()" />
					</div>

					<div class="row" id="suggestions"></div><!--This div will hold the suggestions-->
	    		</div>
		</div>
	</div>
	<!--All javascript placed at the end so that the page loads faster-->
	<script type="text/javascript" src="../js/vendor/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="search_suggestions.js"></script>
</body>
</html>