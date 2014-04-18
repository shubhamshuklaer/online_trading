<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Bidding</title>
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
        <!-- My Items -->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Bidding</span><span class="subtext">View Items you are Bidding for</span></h1>
          <div class="cart-info">
            <table id="mytable" class="table table-striped table-bordered">
              <tr>
                <th class="image">Image</th>
                <th class="name">Product Name</th>
                <th class="model">Category</th>
                <th class="cost">Current Bid</th>
                <th class="type">Your Bid</th>
                <th class="total">Action</th>
              </tr>
              <?php 
                  include_once 'class.MySQL.php';
                if(!isset($_SESSION))
                  session_start();
                  $object=new MYSQL();
              $ids=$object->ExecuteSQL("SELECT * from auction_bidder where user_nm='".$_SESSION['user_nm']."' ORDER by `item_id` DESC, `bid` DESC");
                 $i=0;
                 $count=0;
                 while(isset($ids[$i])){
                  ++$count;
                  $j=$i+1;
                  while(isset($ids[$j]))
                  {
                    if($ids[$j]['item_id']==$ids[$i]['item_id'])
                      ++$j;
                    else
                      break;
                  }
                    echo '<script type="text/javascript">
                         item_ids[i]=';
                         echo $ids[$i]['item_id'];
                         echo';
                         ++i;
                         </script>';
                         $object_1=new MySQL();
                        $curr=$object->ExecuteSQL("SELECT * from auction_bidder where item_id='".$ids[$i]['item_id']."' ORDER BY `bid` DESC");
                        $curr_bid=$curr[0]['bid'];
                         $row=$object_1->ExecuteSQL("SELECT * from items where item_id='".$ids[$i]['item_id']."'");
                  echo '<tr id="';echo $count;echo '"">
                <td class="image"><a href="#"><img width="50" height="50" src="../upload/';echo $row[0]['pic_loc'];echo '" alt="product" title="product"></a></td>
                <td class="name">'.$row[0]['item_nm'].'</td>
                <td class="model">'.$row[0]['category'].'</td>
                <td class="current">'.$curr_bid.'</td>
                <td class="current">'.$ids[$i]['bid'] .'</td>
                <td class="total">
                <a  href="auction.php?item_id='.$row[0]['item_id'].'">Change Bid<span class="glyphicon glyphicon-sort"></span></a>
                <a onclick="remove_entry(';echo ($count-1);echo')" href="#">     Delete  <span class="glyphicon glyphicon-trash"></span></a>
                </td></tr>';
                $i=$j;
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
$("#side_bidding").toggleClass("active");
function remove_entry(id)
 {
  var r=confirm("Are you sure you want to remove this item from your Watchlist ?");
  if(r==true){  
  var temp=item_ids[id];
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","remove_item_bidding.php?id="+temp,false);
  xmlhttp.send();
     var row=document.getElementById(id+1);
     row.parentNode.removeChild(row);  
  }
}
</script>
</body>
</html>