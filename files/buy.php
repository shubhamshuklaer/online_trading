<?php

$id=$_POST['id'];
$q=$_POST['q'];
$n=$_POST['n'];
$c=$_POST['c'];
 include_once './class.MySQL.php';

		         

		     // connecting to the database.
	       $connect=mysql_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
	           or die('Could not connect to the database: '.mysql_error());

           $db='online_trading';
           mysql_select_db($db) or die('Could not select the database ('.$db.') ');
           echo '2';

           $query="INSERT INTO `bulk_order`( `item_id`,`qty` ,`item_name`,`cost`) VALUES ($id,$q,'$n',$c)";
           $result=mysql_query($query);
           {
           		echo '1';
           }


?>