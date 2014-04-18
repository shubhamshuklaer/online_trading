<?php

session_start();
if(!isset($_SESSION['authentication_bulk']))
      header("Location:bulk_vendor_login.php");

$username=$_SESSION["user_nm_bulk"];
/*echo $username;*/

$q=$_POST['q'];
$c=$_POST['c'];
$d=$_POST['d'];
$id=$_POST['x'];
$n=$_POST['n'];

 include_once './class.MySQL.php';

		         

		     // connecting to the database.
	       $connect=mysql_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
	           or die('Could not connect to the database: '.mysql_error());

           $db='online_trading';
           mysql_select_db($db) or die('Could not select the database ('.$db.') ');


           $query="INSERT INTO `vendor's database`  (`id`,`name`,`Threshold`,`cost`,`discount`,`username`) VALUES ($id,'$n',$q,$c,$d,'$username')";
           /*echo $query;*/
           if(mysql_query($query))
           {
           		echo '1';
           }
          

?>
