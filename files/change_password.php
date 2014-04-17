<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Change Password</title>
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
    session_start();
    if(!isset($_SESSION['user_nm']))
    header("Location: login.php");
?>
<link rel="shortcut icon" href="assets/ico/favicon.html">
<?php
include_once 'class.MySQL.php';
  $object=new MYSQL();
      $row=$object->ExecuteSQL("SELECT * from user where user_nm='".$_SESSION['user_nm']."' ");
      $a=$row[0]['pass'];

 ?> 


 <?php
  $pagestatus="VALID";
  if(isset($_POST['submit_button']))
  { 
    $usernm=$_SESSION['user_nm'];
    $pass=$_POST['pass'];
    $con_pass=$_POST['con_pass'];
    $curr_pass=$_POST['curr_pass'];
    $curr_pass=sha1($curr_pass);
    if($curr_pass==$a)
      {if($pass==$con_pass)
         { 
      $pass=sha1($pass);
      $row=$object->ExecuteSQL("UPDATE user set pass='$pass' where user_nm='$usernm'");
    header("Location: myaccount.php");
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
        <!-- my personal info-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">My personal info</span><span class="subtext"></span></h1>
          <form id="detailsform" class="form-horizontal" method="POST">
            <h3 class="heading3">Change the password 
                  </h3>
                  <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label" ><span class="red">*</span> Current Password:</label>
                  <div class="controls">
                    <input  id="curr_pass" type="password" name="curr_pass" class="form-control-lg" ><br>
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label" ><span class="red">*</span> New Password:</label>
                  <div class="controls">
                    <input id="pass" type="password" name="pass" class="form-control-lg"><br>
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label" ><span class="red">*</span> Confirm Password:</label>
                  <div class="controls">
                    <input  id="con_pass" type="password" name="con_pass" class="form-control-lg" ><br>
                    <span class="red">
                    </span>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="controls">
              <input type="submit" class="btn btn-primary" name="submit_button" value="Continue" >
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
        <script>
            // just for the demos, avoids form submit
            jQuery.validator.setDefaults({
              debug: true,
              success: "valid"
            });
            $( "#detailsform" ).validate({
              rules: {
                curr_pass : {
                  required: true,
                  useridvalidation: true
                },
                pass : {
                  required: true,
                },
                con_pass : {
                  required: true,
                  passwordvalidation:true
                },
              },
              submitHandler: function(form){
                (form).submit();
              }
            });
            $.validator.addMethod("useridvalidation",function(value,element){
                {
                  var temp=$("#curr_pass").val();
               var xmlhttp=new XMLHttpRequest();
               var res="";
             xmlhttp.onreadystatechange=function()
             {
             if (xmlhttp.readyState==4 && xmlhttp.status==200)
               {
                res=xmlhttp.responseText;
               }
             }
            xmlhttp.open("GET","check_password.php?userid="+temp,false);
             xmlhttp.send();
             if(res=="true")
             return true;
           else
            return false;
        }
            },"Your current password doesn't match.");
            $.validator.addMethod("passwordvalidation",function(value,element){
              if($("#pass").val()==$("#con_pass").val())
                return true;
              else
                return false;
            },"Passwords do not match");
            </script> 
</body>
</html>