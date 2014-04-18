<!DOCTYPE html>
<?php include_once "generate_rec.php";?>
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
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
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
    if(!isset($_SESSION['authentication']))
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
      <?php 
        include_once 'class.MySQL.php';
          if(!isset($_SESSION))
            session_start();
          $object=new MYSQL();
          $row=$object->ExecuteSQL("SELECT * FROM rec_pre WHERE user_nm='".$_SESSION['user_nm']."'");
          $rec_items=$row[0]['rec_items'];
          $token=strtok($rec_items,",");
          $a1=$token;
          $token=strtok(",");
          $a2=$token;
          $token=strtok(",");
          $a3=$token;
          $token=strtok(",");
          $a4=$token;
          $row=$object->ExecuteSQL("SELECT * from items where item_id='".$a1."'");
          $b1=$row[0]['item_nm'];
          $c1=$row[0]['type'];
          $row=$object->ExecuteSQL("SELECT * from items where item_id='".$a2."'");
          $b2=$row[0]['item_nm'];
          $c2=$row[0]['type'];
          $row=$object->ExecuteSQL("SELECT * from items where item_id='".$a3."'");
          $b3=$row[0]['item_nm'];
          $c3=$row[0]['type'];
          $row=$object->ExecuteSQL("SELECT * from items where item_id='".$a4."'");
          $b4=$row[0]['item_nm'];
          $c4=$row[0]['type'];
        echo'<div class="span9">
          <h1 class="heading1"><span class="maintext">Recommendations</span></h1>
        </div>
        <div class="span2 offset1">
          <div class="cart-info">
            <table class="table table-hover " id="item_list">
              <tbody>
                <tr id="'.$a1.'" class="clickableRow">
                  <td><img src="../upload/'.$a1.'.jpg" style="width: 160px; height: 200px;"></td>
                  <td><a href="'.$c1.'.php?item_id='.$a1.'" item_id="'.$a1.'">'.$b1.'</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="span2 offset1">
          <div class="cart-info">
            <table class="table table-hover " id="item_list">
              <tbody>
                <tr id="'.$a2.'" class="clickableRow">
                  <td><img src="../upload/'.$a2.'.jpg" style="width: 160px; height: 200px;"></td>
                  <td><a href="'.$c2.'.php?item_id='.$a2.'" item_id="'.$a2.'">'.$b2.'</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="span2 offset1">
          <div class="cart-info">
            <table class="table table-hover " id="item_list">
              <tbody>
                <tr id="'.$a3.'" class="clickableRow">
                  <td><img src="../upload/'.$a3.'.jpg" style="width: 160px; height: 200px;"></td>
                  <td><a href="'.$c3.'.php?item_id='.$a3.'" item_id="'.$a3.'">'.$b3.'</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>';
      ?>
      </div>
    </div>
  </section>
</div>

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
</body>
</html>