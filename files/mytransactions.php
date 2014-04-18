<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>My Transactions</title>
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
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
<script type="text/javascript">
<?php 
    session_start();
    if(!isset($_SESSION['user_nm']))
    header("Location: login.php");
?>
 var item_ids = new Array();
 var i=0;
</script>
</head>
<body>
<?php include 'header.php';?>
<?php include 'sidebar.php'; ?>
<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">
        <!-- My Transactions -->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">My Transactions</span><span class="subtext">View your previous transactions</span></h1>
          <div class="cart-info">
            <table id="mytable" class="table table-striped table-bordered">
              <tr>
                <th class="image">Image</th>
                <th class="name">Product Name</th>
                <th class="transactionId">Transaction Id</th>
                <th class="orderId">Order Id</th>
                <th class="deliveryTime">Delivery Time</th>
                <th class="quantity">Quantity</th>
                <th class="cost">Cost</th>
              </tr>
              <?php 
                include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                $object=new MYSQL();
                $row=$object->ExecuteSQL("SELECT * FROM orders WHERE user_nm='".$_SESSION['user_nm']."'");
                $i=0;
                $count=0;
                while(isset($row[$i])){
                  $itemId=$row[$i]['item_id'];
                  $col=$object->ExecuteSQL("SELECT * FROM items WHERE item_id='".$itemId."'");
                  $cost=$col[0]['cost'];
                  $pic=$col[0]['pic_loc'];
                  $itemName=$col[0]['item_nm'];
                  ++$count;
                  echo '<script type="text/javascript">
                  item_ids[i]=';
                  echo $row[$i]['item_id'];
                  echo';
                  ++i;
                  </script>';
                  echo '<tr id="';echo $count;echo '"">
                  <td class="image"><a href="../../upload/'.$pic.'"><img width="50" height="50" src=../upload/'.$pic.' alt="product" title="product"></a></td>
                  <td class="name">'.$itemName.'</td>
                  <td class="transactionId">'.$row[$i]['txn_id'].'</td>
                  <td class="orderId">'.$row[$i]['order_id'].'</td>
                  <td class="deliveryTime">'.$row[$i]['delivery_time'].'</td>
                  <td class="quantity">'.$row[$i]['qty'].'</td>
                  <td class="cost">'.$cost.'</td>
                  </tr>';
                  ++$i;
                }
              ?>
            </table>
          </div>
        </div>        
      </div>
    </div>
  </section>
</div>


<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript">
$("#side_transactions").toggleClass("active");
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
</html>