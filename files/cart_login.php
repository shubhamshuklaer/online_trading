<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
<!-- Login Authentication code below-->
<?php
  include_once 'class.MySQL.php';
    // include_once '../../config/config.php';
if(!isset($_SESSION))
  session_start();
  //if(isset($_SESSION['user_nm']))
   //header("Location: " . constant("HOSTNAME") . "/files/Profile/myaccount.php");
  $pageStatus = "REQUESTED";
  if (isset($_POST['txtUserNm'])) {
    $user_nm = $_POST['txtUserNm'];
    $pass = $_POST['txtPass'];
  }
  if(isset($_POST['submitbutton'])){
    $result="NOTFOUND";
      $pass=sha1($pass);
      $object=new MYSQL();
      $row=$object->ExecuteSQL("SELECT * FROM user WHERE user_nm='".$user_nm."' AND pass='".$pass."'");
      if($row!="true")
        {
          $result="FOUND";
          $username=$_SESSION['user_nm'];
        if(!isset($_SESSION))
          session_start();
        $_SESSION['authentication']="true";
        $_SESSION['user_nm'] = $user_nm;
        $_SESSION['name'] = $row[0]['name'];
        $asd = $row['name'];
      }
    if($result == "FOUND"){
     ///////////////////////updating the database of the cart to change the user_nm

     $omysql=new MySql();
     $from="cart";
     $where=array("user_nm like"=>$username);
     $omysql->Select($from, $where);
     $newres = $omysql->arrayedResult;
     $rows = $omysql->records;
     if($rows)
     {
        $i = 0;
        while($i<$rows)
        {
            $newqty = $newres[$i]["qty"];
            $id = $newres[$i]["item_id"];
            $where=array("user_nm like"=>$user_nm,"AND item_id="=>$id);
            $omysql->Select($from, $where);
            $r = $omysql->records;
            $oldres = $omysql->arrayedResult;
            if($r)
            {
                //item already in cart so update
                $oldqty = $oldres[0]["qty"];
                $q = $oldqty + $newqty;
                $where=array("user_nm like"=>$user_nm,"AND item_id="=>$id);
                $set=array("qty"=>$q);
                $omysql->Update($from, $set, $where);
            }
            else
            {
                //this item is not in cart of registered user so insert
                $vars=array("user_nm"=>$user_nm,"item_id"=>$id,"qty"=>$newqty);
                $omysql->Insert($vars,"cart");
            }
            $i++;
        }
        //delete unregd user's cart
        $where = array("user_nm like"=>$username);
        $omysql->Delete($from, $where);
     }
     //////////////////////////////////////////////////////////////////
     ///////////////////////////update saved_item list////////////////////////
     $omysql=new MySql();
     $from="saved_list";
     $where=array("user_nm like"=>$username);
     $omysql->Select($from, $where);
     $newres = $omysql->arrayedResult;
     $rows = $omysql->records;
     if($rows)
     {
        $i = 0;
        while($i<$rows)
        {
            $newqty = $newres[$i]["qty"];
            $id = $newres[$i]["item_id"];
            $where=array("user_nm like"=>$user_nm,"AND item_id="=>$id);
            $omysql->Select($from, $where);
            $r = $omysql->records;
            $oldres = $omysql->arrayedResult;
            if($r)
            {
                //item already in saved_list so update
                $oldqty = $oldres[0]["qty"];
                $q = $oldqty + $newqty;
                $where=array("user_nm like"=>$user_nm,"AND item_id="=>$id);
                $set=array("qty"=>$q);
                $omysql->Update($from, $set, $where);
            }
            else
            {
                //this item is not in saved_list of registered user so insert
                $vars=array("user_nm"=>$user_nm,"item_id"=>$id,"qty"=>$newqty);
                $omysql->Insert($vars,"saved_list");
            }
            $i++;
        }
        //delete unregd user's saved_list
        $where = array("user_nm like"=>$username);
        $omysql->Delete($from, $where);
     }
     ////////////////////////////////////////////////////////////////////////////////////
      setcookie("user_nm","$user_nm",time()+3600*24*30,'/');
        header("Location: cart_display.php");
    }
  }

?>
</head>
<body>
<?php include 'header.php';?>
<div id="maincontainer">
  <section id="product">
    <div class="container">

       <!-- Account Login-->
      <div class="row">
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Login</span><span class="subtext">First Login here to view All your account information</span></h1>
          <section class="newcustomer">
            <h2 class="heading2">New Customer </h2>
            <div class="loginbox">
              <h4 class="heading4"> Register Account</h4>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and wish for the items you want.</p>
              <br>
              <br>
              <br>
              <a class="btn btn-primary" href="cart_register.php" >Register</a>
            </div>
          </section>
          <section class="returncustomer">
            <h2 class="heading2">Returning Customer </h2>
            <div class="loginbox">
              <h4 class="heading4">I am a returning customer</h4>
              <form class="form-horizontal" method="POST">
                <fieldset>
                  <div class="control-group">
                    <label  class="control-label">UserId:</label>
                      <input type="text"  name="txtUserNm" value="" class="form-control">
                  </div>
                  <div class="control-group">
                    <label  class="control-label">Password:</label>
                      <input type="password" name="txtPass" value="" class="form-control">
                  </div>
                  <?php
                  if(isset($_POST['submitbutton'])){
                    if($result == "NOTFOUND"){
                      echo'<div class="alert alert-danger">The email or password you entered is incorrect!</div>';
                    }
                  }
                  ?>
                  <br>
                  <br>
                  <input type="submit" name="submitbutton" value="Login" class="btn btn-primary">
                </fieldset>
              </form>
            </div>
          </section>
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
<script defer src="js/custom.js"></script><strong></strong>
</body>
</html>
