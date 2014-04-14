<?php
$id=$_POST['id'];


 include_once './class.MySQL.php';

		         

		     // connecting to the database.
	       $connect=mysql_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
	           or die('Could not connect to the database: '.mysql_error());

           $db='online_trading';
           mysql_select_db($db) or die('Could not select the database ('.$db.') ');

           $query="DELETE FROM `vendor's database`  WHERE `id`=$id";
           if(!mysql_query($query))
             die('Could not connect to the database: '.mysql_error());
           else
            echo '1';
          





?>
