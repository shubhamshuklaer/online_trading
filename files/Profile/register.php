<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="../../css/jquery.fancybox.css" rel="stylesheet">
<link href="../../css/cloud-zoom.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../../css/smoothness/jquery-ui.css">
<link rel="shortcut icon" href="assets/ico/favicon.html">
<?php
  $pagestatus="VALID";
  if(isset($_POST['submit_button']))
  { 
     $user_nm=$_POST['userid'];
     $name=$_POST['user_name'];
     $pass=$_POST['pass'];
     $address=$_POST['address'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];
     $con_pass=$_POST['con_pass'];
     if(!($connection=mysql_connect("localhost", "root", "")))
      header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
     if(!mysql_select_db("online_trading", $connection))
      header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
     else{
     $pass=sha1($pass);
     mysql_query("INSERT INTO user (name,user_nm,pass,credit,address,phone,email) VALUES ('".$name."','".$user_nm."','".$pass."','0','".$address."','".$phone."','".$email."')");
     mysql_close($connection);
     session_start();
     $_SESSION['user_nm']=$user_nm;
     $_SESSION['name']=$name;
     header("Location: http://localhost/online_trading/files/Profile/myaccount.php");
    }
   } 
 ?>
</head>
<body>
<script src="js/jquery.js"></script>
<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
          <form id="detailsform" class="form-horizontal" method="POST">
            <h3 class="heading3">Your Personal Details</h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span>UserId:</label>
                  <div class="controls">
                    <input id="userid" type="text" name="userid"  class="form-control-lg" value="<?php 
                    if (!empty($_POST['userid'])) { 
                      echo htmlspecialchars($_POST['userid']); 
                    }?>">
                    <span class="red">
                    <?php
                      if($pagestatus=="wrong_userid")
                        echo "*UserId already taken";
                    ?>
                  </span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span>Name:</label>
                  <div class="controls">
                    <input id="user_name" type="text" name="user_name" class="form-control-lg" value="<?php 
                    if (!empty($_POST['user_name'])) { 
                      echo htmlspecialchars($_POST['user_name']); 
                    }?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span> Email:</label>
                  <div class="controls">
                    <input id="email" type="text" name="email" class="form-control-lg" value="<?php 
                    if (!empty($_POST['email'])) { 
                      echo htmlspecialchars($_POST['email']); 
                    }?>">
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" ><span class="red">*</span> Telephone:</label>
                  <div class="controls">
                    <input id="phone" type="text" name="phone" class="form-control-lg" value="<?php 
                    if (!empty($_POST['phone'])) { 
                      echo htmlspecialchars($_POST['phone']); 
                    }?>">
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
                    if (!empty($_POST['address'])) { 
                      echo htmlspecialchars($_POST['address']); 
                    }?>">
                  </div>
                </div>
              </fieldset>
            </div>
            <h3 class="heading3">Your Password  
                  </h3>
            <div class="registerbox">
              <fieldset>
                <div class="control-group">
                  <label  class="control-label" ><span class="red">*</span> Password:</label>
                  <div class="controls">
                    <input  id="pass" type="password" name="pass" class="form-control-lg" >
                    <span class="red">
                  </span>
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label" ><span class="red">*</span> Confirm Password:</label>
                  <div class="controls">
                    <input id="con_pass" type="password" name="con_pass" class="form-control-lg">
                    <br>
                    <br>
                  <input type="submit" class="btn btn-primary" name="submit_button" value="Continue" >
                  <input type="button"  onclick="location.href='myaccount.php' "class="btn btn-primary" name="cancel_button" value="Cancel" >
                  </div>
                </div>
              </fieldset>
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
                email: {
                  required: true,
                  email: true
                },
                userid : {
                  required: true,
                  useridvalidation: true,
                  usernamevalidation:true
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
                  required: true,
                  passwordvalidation:true
                },
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
            $.validator.addMethod("usernamevalidation",function(value,element){
              var temp=$("#userid").val();
               var xmlhttp=new XMLHttpRequest();
               var res="";
             xmlhttp.onreadystatechange=function()
             {
             if (xmlhttp.readyState==4 && xmlhttp.status==200)
               {
                res=xmlhttp.responseText;
               }
             }
            xmlhttp.open("GET","checkusername.php?userid="+temp,false);
             xmlhttp.send();
             if(res=="true")
             return false;
           else
            return true;
            },jQuery.validator.format("UserId already taken"));
            $.validator.addMethod("passwordvalidation",function(value,element){
              if($("#pass").val()==$("#con_pass").val())
                return true;
              else
                return false;
            },"Passwords do not match");
            </script> 
</body>
</html>