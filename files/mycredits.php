<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>My Items</title>
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
<?php 
    session_start();
    if(!isset($_SESSION['user_nm']))
    header("Location: login.php");
?>
</head>

<body>
<?php include 'header.php';?>
<?php include 'sidebar.php'; ?>
<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">
        <!-- My Credits -->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">My Credits</span><span class="subtext">View Credits in your Wallet</span></h1>
          <!--<h3 class="heading3">Credits : ₹ </h3>-->
          <div class="credits">
              <?php 
                include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                if(isset($_SESSION['recharge'])) {
                  echo '<div class="alert alert-success">Your account has been credited with ₹ '.$_SESSION['recharge'].'</div>';
                  unset($_SESSION['recharge']);
                }
                $object=new MYSQL();
                $row=$object->ExecuteSQL("SELECT * from user where user_nm='".$_SESSION['user_nm']."'");
                $mycredit=$row[0]['credit'];
                echo'<h3 class="heading3">Credits : ₹ '.$mycredit.'</h3>';
              ?>
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
  if (typeof(jQuery) == 'undefined')   
    document.write("<script type='text/javascript' src='../js/jquery.js'/>");
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
<script type="text/javascript">
$("#side_credits").toggleClass("active");
function edit_entry(id)
{
  var temp=item_ids[id];
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","add_item_session_variable.php?id="+temp,true);
  xmlhttp.send();
  window.location.href="editmyitems.php";
}

</script>
</body>
</html>