<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Template</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
	<style> ul{list-style-type: none;}</style>
</head>
<body>

	<div class="container-fluid">
		<div class="row" role="header">
			<?php include_once "header.php";?> 
		</div>
	
		<div class="container-fluid">
				<!--Navigation sidebar-->
				<div class="col-sm-3 col-md-2 sidebar">
	                <ul class="nav nav-sidebar" id="filter_list">
		                <!-- Area where filter will be loaded -->
	                </ul>
                </div>
				<!--Main Content area--> 
		        <div class="container-fluid col-sm-6 col-md-8">
		        <table class="table table-hover " id="item_list">
		        	<tbody>
		        		<!-- Area where all content will be loaded -->
		        	</tbody>
		        </table>
		        <script type="text/javascript">
		        var where="";
		        </script>
		        	<div >
		        		<ul id="paginator"></ul>
		        	</div>
	    		</div>
	    		<div  class="container-fluid col-sm-3 col-md-2 sidebar">
	    			<ul class="nav nav-sidebar" id="promotions">
	    			</ul>
	    		</div>
		</div>
	</div>
	<!--All javascript placed at the end so that the page loads faster-->
    <script type="text/javascript">
  if (typeof(jQuery) == 'undefined')   
    document.write("<script type='text/javascript' src='./js/jquery.js'/>");
</script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>
	<script type="text/javascript" src="../js/bootstrap-paginator.min.js"></script>
	<script type="text/javascript" src="../js/custom/load_search_result.js"></script>
</body>
</html>
