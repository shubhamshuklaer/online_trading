<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Confirm Items</title>
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
        <!-- My Items -->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Confirm Items</span><span class="subtext">View Items found as per your wishlist</span></h1>
          <div class="cart-info">
            <table id="mytable" class="table table-striped table-bordered">
              <tr>
                <th class="image">Image</th>
                <th class="name">Product Name</th>
                <th class="model">Category</th>
                <th class="condition">Condition</th>
                <th class="quantity">Quantity</th>
                <th class="cost">Cost</th>
                <th class="type">Type</th>
                <th class="total">Accept?</th>
              </tr>
              <?php 
                  include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                  $object=new MYSQL();
                  foreach ($_SESSION['wishlist_found'] as $key => $value) 
                  {
                    if($value!="")
                    {
                      $tok=strtok($value,";");
                      while($tok!=false)
                      {
                $row=$object->ExecuteSQL("SELECT * from items where item_id='$tok'");
                 $count=0;
                  ++$count;
                    echo '<script type="text/javascript">
                         item_ids[i]=';
                         echo $row[0]['item_id'];
                         echo';
                         ++i;
                         </script>';
                  echo '<tr id="';echo $count;echo '"">
                <td class="image"><a href="'.$row[0]["type"].'.php?item_id='.$row[0]["item_id"].'"><img width="50" height="50" src="../upload/';echo $row[0]['pic_loc'];echo '" alt="product" title="product"></a></td>
                <td class="name">'.$row[0]['item_nm'].'</td>
                <td class="model">'.$row[0]['category'].'</td>
                <td class="condition">'.$row[0]['item_condition'].'</td>
                <td class="quantity">'.$row[0]['quantity'].'</td>
                <td class="cost">'.$row[0]['cost'].'</td>
                <td class="type">'.$row[0]['type'].'</td>
                <td class="total">
                <div class="pull-left">
                <a onclick="edit_entry(';echo ($count-1);echo')" href="#"><span class="glyphicon glyphicon-ok"></span></a>
                </div>
                <a onclick="remove_entry(';echo ($count-1);echo')" href="#"><span class="glyphicon glyphicon-remove"></span></a>
                </td></tr>';
                $tok=strtok(";");
              }
            }
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
<script type="text/javascript">

function remove_entry(id)
 {
  var r=confirm("Is this not the item you wanted ?");
  if(r==true){  
  var temp=item_ids[id];
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","add_exception.php?id="+temp,true);
  xmlhttp.send();
   var row=document.getElementById(id+1);
   row.parentNode.removeChild(row);
  }
}
// function edit_entry(id)
//  {
//      var temp=item_ids[id];
//      var xmlhttp=new XMLHttpRequest();xmlhttp.onreadystatechange=function()
//              {
//              if (xmlhttp.readyState==4 && xmlhttp.status==200)
//                {
//                  window.location.href="http://localhost/online_trading/files/Profile/editmyitems.php";
//                }
//              }
//      xmlhttp.open("GET","add_exception.php?id="+temp,true);
//      xmlhttp.send();
//   }
</script>
</body>
</html>