<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Edit Personal Details</title>
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
<link rel="shortcut icon" href="../../assets/ico/favicon.html">
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
<?php 
    session_start();
    if(!isset($_SESSION['user_nm']))
    header("Location: login.php");
?>
<?php
    include_once 'class.MySQL.php';
  $object=new MYSQL();
      $row=$object->ExecuteSQL("SELECT * from user where user_nm='".$_SESSION['user_nm']."'");
      if($row!="true")
        {
   $a=$row[0]['name'];
   $b=$row[0]['user_nm'];
   $c=$row[0]['phone'];
   $d=$row[0]['email'];
   $e=$row[0]['address'];
 }
?>
<?php
if(isset($_POST['submit_button']))
  { 
    $name=$_POST['user_name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $usernm=$_SESSION['user_nm'];
   $object=new MYSQL();
      $row=$object->ExecuteSQL("UPDATE user set name='$name', phone='$phone', email='$email', address='$address' where user_nm='$usernm'");
    $_SESSION['name']=$name;
    header("Location: myaccount.php");
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
        <!-- my personal info-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">my personal info</span><span class="subtext"></span></h1>
          <form id="detailsform" class="form-horizontal" method="POST">
            <h3 class="heading3">Your Personal Details</h3>
            <div class="registerbox">
              <fieldset>
                
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span>Name:</label>
                  <div class="controls">
                    <input id="user_name" type="text" name="user_name" class="form-control-lg" value="<?php 
                    echo $a; ?>"><br>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input id="email" type="text" name="email" class="form-control-lg" value="<?php 
                    echo $d; ?>"><br>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span> Telephone:</label>
                  <div class="controls">
                    <input id="phone" type="text" name="phone" class="form-control-lg" value="<?php 
                    echo $c; ?>"><br>
                  </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">Your Address</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span> Address :</label>
                  <div class="controls">
                    <input id="address" type="text" name="address" class="form-control-lg" value="<?php 
                    echo $e; 
                    ?>"><br>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="controls">
              <input type="submit" class="btn btn-primary" name="submit_button" value="Save" >
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
        <script>
        $("#side_edit").toggleClass("active");
            // just for the demos, avoids form submit
            jQuery.validator.setDefaults({
              debug: true,
              success: "valid"
            });
            $( "#detailsform" ).validate({
              rules: {
                email: {
                  required: true,
                  email: true
                },
                userid : {
                  required: true,
                  useridvalidation: true
                },
                user_name : {
                  required: true,
                  namevalidation: true
                },
                phone : {
                  required: true,
                  number:true,
                  maxlength:10,
                  minlength:10
                },
                address : {
                  required: true
                },
                pass : {
                  required: true
                },
                con_pass : {
                  required: true
                }
              },
              messages: {
                phone: {
                  minlength: jQuery.format("Number should be of 10 digits"),
                  maxlength: jQuery.format("Number should be of 10 digits"),
                }
              },
              submitHandler: function(form){
                (form).submit();
              }
            });
            $.validator.addMethod("useridvalidation",function(value,element){
                return this.optional(element) || /^[a-z0-9_.\-]+$/i.test(value);
            },"Only dot, hyphen and underscore are allowed as special characters.");
            $.validator.addMethod("namevalidation",function(value,element){
                return this.optional(element) || /^[a-z ]+$/i.test(value);
            },"Only english alphabet is allowed.");
            </script> 
</body>
</html>