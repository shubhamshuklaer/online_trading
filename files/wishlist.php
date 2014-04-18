<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Wishlist</title>
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
<?php 
    session_start();
    if(!isset($_SESSION['authentication']))
    header("Location: login.php");
?>
<script type="text/javascript">
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
        <!-- Wishlist -->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Wishlist</span><span class="subtext">View All your Wishlist information</span></h1>
          <div class="cart-info">
            <table id="mytable" class="table table-striped table-bordered">
              <tr>
                <th  class="name">Product Name</th>
                <th class="model">Category</th>
                <th class="quantity">Availability</th>
                <th class="price">Tags</th>
                <th class="total">Action</th>
              </tr>
              <?php 
                include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                  $object=new MYSQL();
              $row=$object->ExecuteSQL("SELECT * from wish_list where user_nm='".$_SESSION['user_nm']."'");
                 $i=0;
                 $count=0;
                 while(isset($row[$i])){
                  ++$count;
                   echo '<script type="text/javascript">
                         item_ids[i]=';
                         echo $row[$i]['id'];
                         echo';
                         ++i;
                         </script>';
                  echo '<tr id="';echo $count;echo '"">
                <td    class="name">'.$row[$i]['item_nm'].'</td>
                <td class="model">'.$row[$i]['category'].'</td>
                <td class="quantity">'.$row[$i]['availability'].'</td>
                <td class="price">';
                $string=$row[$i]['Tags'];
                $tok=strtok($string, ";");
                while($tok !== false)
                {
                  echo '<span>  </span><label class="label label-primary">'.$tok.'</label><span></span>';
                  $tok=strtok(";");
                }
                echo'</td>
                <td class="total">
                  <a onclick="edit_entry(';echo ($count-1);echo')" href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                  <a onclick="remove_entry(';echo ($count-1);echo')" href="#"><span class="glyphicon glyphicon-trash"></span></a>
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
$("#side_list").toggleClass("active");
  function remove_entry(id)
 {
  var r=confirm("Are you sure you want to delete this item ?");
  if(r==true){
     var temp=item_ids[id];
     var xmlhttp=new XMLHttpRequest();
     xmlhttp.open("GET","remove_entry.php?id="+temp,false);
     xmlhttp.send();
     var fade="#";
     fade=fade.concat(id+1);
     $(fade).slideToggle(300);
    }
  }
  function edit_entry(id)
 {
     var temp=item_ids[id];
     var xmlhttp=new XMLHttpRequest();
     xmlhttp.onreadystatechange=function()
             {
             if (xmlhttp.readyState==4 && xmlhttp.status==200)
               {
     window.location.href="./edit_wishlist.php";
               }
             }
     xmlhttp.open("GET","add_session_variable.php?id="+temp,true);
     xmlhttp.send();
  }


    
</script>
</body>
</html>