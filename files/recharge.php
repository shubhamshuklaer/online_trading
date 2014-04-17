<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Recharge</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="../css/jquery.fancybox.css" rel="stylesheet">
<link href="css/cloud-zoom.css" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
<?php
  if(!isset($_SESSION))
    session_start();
  if(!isset($_SESSION['user_nm']))
    header("Location: login.php");
?>
<link rel="shortcut icon" href="assets/ico/favicon.html">
<?php
  if(!isset($_SESSION)){
    session_start();
  }
  if(isset($_POST['submit_button']))
  {
    include_once 'class.MySQL.php';
    $in_voucher=$_POST['in_voucher'];
    $object=new MySQL();
    $cr=$object->ExecuteSQL("SELECT * from user where user_nm='".$_SESSION['user_nm']."'");
    if(isset($cr[0])) {
      $credit=$cr[0]['credit'];
    }
    $row=$object->ExecuteSQL("SELECT * from vouchers where voucher='".$in_voucher."'");
    if($row) {
      $amount=$row[0]['amount'];
      $available=$row[0]['available'];
    }
    $newcredit=$credit + $amount;
    if($row) {
      if($available=='1') { 
      $row=$object->ExecuteSQL("UPDATE vouchers SET available='0' WHERE voucher='".$in_voucher."'");
      $row=$object->ExecuteSQL("UPDATE user SET credit='".$newcredit."' WHERE user_nm='".$_SESSION['user_nm']."'");
      header("Location: mycredits.php");
      }
    }
  }
?>

</head>
<body>
<?php include 'header.php';?>
<?php include 'sidebar.php'; ?>
<script src="js/jquery.js"></script>
<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <!-- Recharge-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Recharge your Balance Credits</span><span class="subtext"></span></h1>
          <form id="detailsform" class="form-horizontal" method="POST">
            <h3 class="heading3">Fill the following details : </h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label"> Voucher Key : </label>
                  <div class="controls">
                    <input id="in_voucher" type="text" name="in_voucher" class="form-control-lg" >
                    <span class="red"></span>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="controls">
              <input type="submit" class="btn btn-primary" name="submit_button" value="Go" >
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
</body>
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
<!--<script>
    jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });
    $( "#detailsform" ).validate({
      rules: {
        in_voucher : {
          required: true,
          namevalidation: true
        },
      },
      submitHandler: function(form){
        (form).submit();
      }
    });
</script> -->
</body>
</html>