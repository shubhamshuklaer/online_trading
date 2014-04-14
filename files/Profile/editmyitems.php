<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Items</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="../../css/jquery.fancybox.css" rel="stylesheet">
<link href="../../css/cloud-zoom.css" rel="stylesheet">
<link rel="shortcut icon" href="../../assets/ico/favicon.html">
<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../../css/smoothness/jquery-ui.css">
<?php 
    session_start();
    if(!isset($_SESSION['user_nm']))
    header("Location: http://localhost/online_trading/files/Profile/login.php");
?>
<?php

  if(isset($_POST['cancel_button']))
  header("Location: http://localhost/online_trading/files/Profile/myitems.php");
  if(!($connection=mysql_connect("localhost", "root", "")))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 if(!mysql_select_db("online_trading", $connection))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 else{
  if(!isset($_SESSION))
    session_start();
    $rs=mysql_query("SELECT * from items where item_id='".$_SESSION['product_id']."'");
    if($rs){
    $row=mysql_fetch_assoc($rs);
    $product_name=$row['item_nm'];
    $product_category=$row['category'];
    $product_quantity=$row['quantity'];
    $product_cost=$row['cost'];
    $product_condition=$row['item_condition'];
    $product_description=$row['description'];
    $product_type=$row['type'];
  }
  mysql_close($connection);
}
?>
<?php
if(isset($_POST['submit_button'])) 
  {
   $item_nm=$_POST['productname'];
   $quantity=$_POST['quantity'];
   $cost=$_POST['cost'];
   $itemcondition=$_POST['condition'];
   $itemdescription=$_POST['itemdescription'];
   $item_type=$_POST['itemtype'];
   $categories_name=$_POST['categories'];
   if(!($connection=mysql_connect("localhost", "root", "")))
    header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
    if(!mysql_select_db("online_trading", $connection))
    header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
    else{
    $rs=mysql_query("UPDATE items SET item_nm='$item_nm', category='$categories_name', quantity='$quantity', cost='$cost', item_condition='$itemcondition', type='$item_type', description='$itemdescription' where item_id='".$_SESSION['product_id']."'");
    if(!$rs)
    header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
    mysql_close($connection);
    header("Location: http://localhost/online_trading/files/Profile/myitems.php");
  }
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
       <h1 class="heading1"><span class="maintext">Edit Item</span><span class="subtext">Fill the details of the item</span></h1>
       <form id="detailsform" class="form-horizontal" method="POST">
        <h3 class="heading3">Your Product Details</h3>
        <div class="registerbox">
          <fieldset>

           <div class="control-group">
            <label class="control-label" >Product Name:</label>
            <div class="controls">
              <input id="productname" type="text" name="productname"  class="form-control-lg" value="">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" >Quantity:</label>
            <div class="controls">
              <input id="quantity" type="text" name="quantity" class="form-control-lg" value="<?php 
              echo $product_quantity
              ?>">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" >Cost:</label>
            <div class="controls">
              <input id="cost" type="text" name="cost" class="form-control-lg" value="<?php 
              echo $product_cost
              ?>">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" >Condition:</label>
            <div class="controls">
              <input id="condition" type="text" name="condition" class="form-control-lg" value="<?php 
              echo $product_condition
              ?>">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" >Description:</label>
            <div class="controls">
              <input id="itemdescription" type="text" name="itemdescription" class="form-control-lg" value="<?php 
              echo $product_description
              ?>">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" >Type:</label>
            <div class="controls">
              <input id="itemtype" type="text" name="itemtype" class="form-control-lg" value="<?php 
              echo $product_type
              ?>">
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" ></span>Category:</label>
            <div class="controls">
              <div class="btn-group">
             <select name="categories" class="btn btn-default dropdown-toggle">

              <?php 
                $con=mysql_connect("localhost", "root", "");
                mysql_select_db("online_trading", $con);
                $res=mysql_query("SELECT * From categories");
                while($row=mysql_fetch_assoc($res)){
                  if($row["categories_name"]==$product_category)
                  echo "<option selected='selected'>".$row["categories_name"]."</option>";
                  else
                  echo "<option>".$row["categories_name"]."</option>";
                }
                mysql_close($con);
              ?>

              </select>
            </div>
           </div>
          </div>
          </fieldset>
           
          <input type="submit" class="btn btn-primary" name="submit_button" value="Save" >
              <input type="button"  onclick="location.href='myaccount.php' "class="btn btn-primary" name="cancel_button" value="Cancel" >
           </div>
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
<script src="js/jquery.js"></script>
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
<script src="js/jquery.form.js"></script>
<script type="text/javascript">
        // just for the demos, avoids form submit
        jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });
        $( "#detailsform" ).validate({
          rules: {
           productname : {
            required: true,
           },
           quantity : {
            required: true,
           }
          }
        });
</script>
</body>
</html>