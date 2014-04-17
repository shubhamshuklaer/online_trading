<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add to Wishlist</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="../css/jquery.fancybox.css" rel="stylesheet">
<link href="../css/cloud-zoom.css" rel="stylesheet">
<link rel="shortcut icon" href="../../assets/ico/favicon.html">
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
<script type="text/javascript">
  var tags_name="";
  var tag_count=0;
</script>
<?php 
    session_start();
    if(!isset($_SESSION['authentication']))
    header("Location: login.php");
	include_once 'class.MySQL.php';
?>
<?php
$object=new MYSQL();
if(!isset($_SESSION))
  session_start();
  if(isset($_POST['submit_button'])) 
  {
	 $item_nm=$_POST['productname'];
	 $user_nm=$_SESSION['user_nm'];
	 $categories_name=$_POST['categories'];
	 $Tags=$_SESSION['wishlist_product_id'];
	 unset($_SESSION['wishlist_product_id']);
     $row=$object->ExecuteSQL("INSERT into wish_list (item_nm,user_nm,category,item_id,Tags,availability) VALUES ('".$item_nm."','".$user_nm."','".$categories_name."',NULL,'".$Tags."','not')");
	  header("Location: myaccount.php");
  }
?>
</head>
<body>
	<?php include 'header.php';?>
        <?php include 'sidebar.php'; ?>
<div id="maincontainer">
  <section id="product">
	 <div class="container">
		<div class="row">        
		  <!-- Register Account-->
		  <div class="span9">
			 <h1 class="heading1"><span class="maintext">Add to Wishlist</span><span class="subtext">Fill the details of the item</span></h1>
			 <form id="detailsform" class="form-horizontal" method="POST">
				<h3 class="heading3">Your Product Details</h3>
				<div class="registerbox">
				  <fieldset>
					 <div class="control-group">
						<label class="control-label" ><span class="red">*</span>Product Name:</label>
						<div class="controls">
						  <input id="productname" type="text" name="productname"  class="form-control-lg" value="<?php 
						  if (!empty($_POST['productname'])) { 
							 echo htmlspecialchars($_POST['productname']); 
						  }?>"><br>
						</div>
					 </div>
					 <div class="control-group">
						<label class="control-label" ><span class="red">*</span>Category:</label>
						<div class="controls">
							<div class="btn-group">
						 <select name="categories" class="btn btn-default dropdown-toggle">
							 <?php 
							 $i=0;
								  $row=$object->ExecuteSQL("SELECT * From categories");
							while($row[$i]){
								  echo "<option>".$row[$i]["categories_name"]."</option>";
								  ++$i;
								 }
							 ?>
						  </select>
						</div>
					 </div>
					</div>
					 
<br>
					 <div class="control-group">
						<label class="control-label" ><span class="red">*</span>Tags:</label>
						<div id="foo" class="controls">
						  <input id="tagsname" type="text" name="tagsname"  class="form-control-lg" ><span id="atleast"></span><br>
						<br></div>
					 </div>
				  </fieldset>
				</div>
				<div class="controls">
				  <input type="submit" class="btn btn-primary" name="submit_button" value="Add" >
              <input type="button"  onclick="location.href='myaccount.php' "class="btn btn-primary" name="cancel_button" value="Cancel" >
				</div>
			 </form>
			 <div class="clearfix"></div>
			 <br>
		  </div>       
		</div>
	 </div>
  </section>
</div>
<!-- javascript
	 ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
  if (typeof(jQuery) == 'undefined')   
    document.write("<script type='text/javascript' src='./js/jquery.js'/>");
</script>
<script src="js/bootstrap.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/application.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script defer src="js/jquery.fancybox.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/jquery.tweet.js"></script>
<script  src="js/cloud-zoom.1.0.2.js"></script>
<script  type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript"  src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript"  src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript"  src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript"  src="js/jquery.ba-throttle-debounce.min.js"></script>
<script defer src="js/custom.js"></script>
<script src="jquery.form.js"></script>
<script>

				// just for the demos, avoids form submit
				jQuery.validator.setDefaults({
				  debug: true,
				  success: "valid"
				});
				$( "#detailsform" ).validate({
				  rules: {
					 productname : {
						required: true
					 }
				  },
				  submitHandler: function(form){
					 if(tag_count>0)
					 {
						var xmlhttp=new XMLHttpRequest();
					    xmlhttp.open("GET","add_session_variable.php?id="+tags_name,false);
					    xmlhttp.send();						
					    (form).submit();
					 }
					 else{
						var temp=document.getElementById("atleast");
						$(temp).text("*You must add atleast one tag");
					 }
				  }
				});
</script>
<script type="text/javascript">
				$("#tagsname").keypress(function(e){
				  if(e.which == 13)
				  {
					 if(tag_count==0)
					 {
						var temp=document.getElementById("atleast");
						$(temp).text("");
					 }
					 if($("#tagsname").val()=="")
					 	return false;
					 ++tag_count;
					 var itemLabel = document.createElement("label");
					 itemLabel.setAttribute("class","label label-primary");
					 itemLabel.innerHTML = $("#tagsname").val();
					 tags_name=tags_name.concat($("#tagsname").val());
					 tags_name=tags_name.concat(";");
					 itemLabel.onclick = function(){
						var temp=$(this).text();
						temp=temp.concat(";");
						tags_name=tags_name.replace(temp,"");
						$(this).remove();
						--tag_count;
					 }
					 var foobar=document.getElementById("foo");
					 foobar.appendChild(itemLabel);
					 var itemLabe = document.createElement("span");
					 itemLabe.innerHTML = "   ";
					 foobar.appendChild(itemLabe);
					 $("#tagsname").val("");
					 $("#tagsname").focus();
					 return false;
				  }
				})
</script>
</body>
</html>