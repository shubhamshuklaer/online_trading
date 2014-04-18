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
          <h1 class="heading1"><span class="maintext">My Items</span><span class="subtext">View Items posted by you</span></h1>
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
                <th class="total">Action</th>
              </tr>
              <?php 
                  include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                  $object=new MYSQL();
              $row=$object->ExecuteSQL("SELECT * from items where user_nm='".$_SESSION['user_nm']."'");
                 $i=0;
                 $count=0;
                 while(isset($row[$i])){
                  ++$count;
                    echo '<script type="text/javascript">
                         item_ids[i]=';
                         echo $row[$i]['item_id'];
                         echo';
                         ++i;
                         </script>';
                  echo '<tr id="';echo $count;echo '"">
                <td class="image"><a href="'.$row[$i]["type"].'.php?item_id='.$row[$i]["item_id"].'"><img width="50" height="50" src="../upload/';echo $row[$i]['pic_loc'];echo '" alt="product" title="product"></a></td>
                <td class="name">'.$row[$i]['item_nm'].'</td>
                <td class="model">'.$row[$i]['category'].'</td>
                <td class="condition">'.$row[$i]['item_condition'].'</td>
                <td class="quantity">'.$row[$i]['quantity'].'</td>
                <td class="cost">'.$row[$i]['cost'].'</td>
                <td class="type">'.$row[$i]['type'].'</td>
                <td class="span2">';
                if($row[$i]['type']=="auction")
                {
                  $date='20'.date('y-M-d h:m:s a', time());
                  $date=strtotime($date);
                  $temp=strtotime($row[$i]['last_date']);
                  if($date>$temp)
                  {
                  echo '<a  href="#">   Send <span class="glyphicon glyphicon-send"></span></a><br>';    
                  }
                }
                echo '<a onclick="edit_entry(';echo ($count-1);echo')" href="#">  Edit <span class="glyphicon glyphicon-pencil"></span></a><br>
                <a onclick="remove_entry(';echo ($count-1);echo')" href="#">  Remove <span class="glyphicon glyphicon-trash"></span></a>
                </td></tr>';
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
$("#side_items").toggleClass("active");
function remove_entry(id)
 {
  var r=confirm("Are you sure you want to delete this item ?");
  if(r==true){  
  var temp=item_ids[id];
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","remove_item_entry.php?id="+temp,false);
  xmlhttp.send();
     var row=document.getElementById(id+1);
     row.parentNode.removeChild(row);
  }
}
function edit_entry(id)
 {
     var temp=item_ids[id];
     var xmlhttp=new XMLHttpRequest();xmlhttp.onreadystatechange=function()
             {
             if (xmlhttp.readyState==4 && xmlhttp.status==200)
               {
                 window.location.href="editmyitems.php";
               }
             }
     xmlhttp.open("GET","add_item_session_variable.php?id="+temp,true);
     xmlhttp.send();
  }
</script>
</body>
</html>