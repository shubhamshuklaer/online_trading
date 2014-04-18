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
<link href="../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="../css/jquery.fancybox.css" rel="stylesheet">
<link href="../css/cloud-zoom.css" rel="stylesheet">
<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
<link rel="shortcut icon" href="assets/ico/favicon.html">
<?php
if(!isset($_SESSION))
          session_start();
  $bool_cap = "0";
  $bool_vouch = "0";
  function random($legth) {
    $chrs ="abcdefghijklmnopqrstuvwxyz23456789";
    $sr = "";
    $sze = strlen($chrs);
    for($i=0; $i<$legth; $i++){
    $sr .= $chrs[rand(0, $sze-1)];
  }
  return $sr;
  }
?>
<?php
  $pass_status="Valid";
  if(isset($_POST['submit_button']))
  { 
     $user_nm=$_POST['userid'];
     $name=$_POST['user_name'];
     $pass=$_POST['pass'];
     $address=$_POST['address'];
     $phone=$_POST['phone'];
     $email=$_POST['email'];
     $con_pass=$_POST['con_pass'];
     if($con_pass==$pass)
     {
      if($_SESSION['real']==$_POST['in_captcha'])
      {
      $pass=sha1($pass);
     include_once 'class.MySQL.php';
          $object=new MYSQL();
      $row=$object->ExecuteSQL("INSERT INTO user (name,user_nm,pass,credit,address,phone,email) VALUES ('".$name."','".$user_nm."','".$pass."','0','".$address."','".$phone."','".$email."')");
      $_SESSION['authentication']="true";
     $_SESSION['user_nm']=$user_nm;
     $_SESSION['name']=$name;
     header("Location: myaccount.php");
   }
   else
   {
    $pass_status="captcha";
   }
   }
   else
   {
    $pass_status="Not Valid";
   }
    }
 ?>
</head>
<body>
<?php include_once "header.php";?>
<script type="text/javascript">
  if (typeof(jQuery) == 'undefined')   
    document.write("<script type='text/javascript' src='../js/jquery.js'/>");
</script>
<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">        
        <!-- Register Account-->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Register Account</span><span class="subtext">Register Your details with us</span></h1>
          <?php 
          if($pass_status=="Not Valid")
          echo '<div class="alert alert-danger">Your password and confirm password does not match</div>';
        else if($pass_status=="captcha")
          echo '<div class="alert alert-danger">You entered wrong captcha</div>';
        ?>
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
                  </div>
                </div>
                <div class="control-group">
                  <div class="controls">
                      <?php
                      if (!isset($_SESSION))
                        session_start();
                      $_SESSION['real'] = random("6");
                      $sr = "  ".$_SESSION['real'];
                      $image = imagecreate(100, 20);
                      $background = imagecolorallocate($image, 0, 0, 0);
                      $foreground = imagecolorallocate($image, 255, 255, 255);
                      imagestring($image, 8,2,2,$sr,$foreground);
                      imagejpeg($image,"captcha.jpg");
                    ?>
                    <td class="image"><img width="100" height="20" src='captcha.jpg' alt="Captcha"></td>
                    <span class="red"></span>
                  </div>
                </div>
                <div class="control-group">
                  <label  class="control-label" ><span class="red">*</span> Enter the captcha:</label>
                  <div class="controls">
                    <input id="in_captcha" type="text" name="in_captcha" class="form-control-lg">
                    <span class="red"></span>
                  </div>
                </div>
                <br>
                <br>
                <div class="control-group">
                  <div class="controls">
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