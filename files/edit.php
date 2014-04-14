<?php
$q=$_POST['q'];
$d=$_POST['d'];
$c=$_POST['c'];
$id=$_POST['x'];

 include_once './class.MySQL.php';

		     // connecting to the database.
	       $connect=mysql_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
	           or die('Could not connect to the database: '.mysql_error());

           $db='online_trading';
           mysql_select_db($db) or die('Could not select the database ('.$db.') ');

           $query="UPDATE `vendor's database` SET `Threshold`=$q,`cost`=$c,`discount`=$d WHERE `id`=$id";
           if(mysql_query($query))
           {
           		echo '1';
           }





?>
