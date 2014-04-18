<?php

 include_once './class.MySQL.php';

		        
		           // connecting to the database.
		 $connect=mysql_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
		      or die('Could not connect to the database: '.mysql_error());

		 $db='online_trading';
		       mysql_select_db($db) or die('Could not select the database ('.$db.') ');


		    $query1="SELECT * FROM `bulk_order` WHERE 1";
		    $result1=mysql_query($query1);

		    while($info=mysql_fetch_array($result1))
		    {
		    	$item_id=$info['item_id'];
		    	$item_name=$info['item_name'];
		    	$quantity=$info['qty'];
		    	$cost=$info['cost'];
		    	$order_time=$info['order_time'];
		    	$user_name=$info['user_nm_bulk'];
		    	$email=$info['email_id'];
		    	$phone=$info['mobile_no'];
		    	$address=$info['shipping_address'];
		    	$transaction_id=$info['txn_id'];
		    	$status=$info['status'];
		    	$delivery_time=$info['delivery_time'];
		    	$order_id=$info['order_id'];


		    	$query2="INSERT INTO `old_bulk_orders`(`user_nm_bulk`, `qty`, `item_id`, `txn_id`, `order_id`, `order_time`, `delivery_time`, `status`, `cost`, `shipping_address`, `mobile_no`, `item_name`, `email_id`)
		    								   VALUES ('$user_name',$quantity,$item_id,$transaction_id,'$order_id','$order_time','$delivery_time','$status',$cost,'$address',$phone,'$item_name','$email')";
		    	if(mysql_query($query2))
		    	{
		    		echo '1';

		    	}

		    }
		    
		  

		 $query="DELETE FROM bulk_order WHERE 1";
		 $result=mysql_query($query)or die('Could not delete this table.');

		  

		 ?>

     <?php

?>