<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" >
    <title>Template</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
</head>
<body>


	<div class="container-fluid">
		<div class="row" role="header">
			<?php include_once "header.php";?> 
		</div>
	
		<div class="container-fluid">
				<!--Navigation sidebar-->
				<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
	                <ul class="nav nav-sidebar">
		                <li class="active"><a href="#">Search</a></li>
		                <li class="active"><a href="new_orders.php">New Orders</a></li>
		                <li class="active"><a href="approved_orders.php">Approved </a></li>
		                <li class="active"><a href="set_threshold.php">Set </a></li>
		                <li class="active"><a href="store.php">Items Store</a></li>
		                <li class="active"><a href="#">Help</a></li>
	     
	                </ul>
                </div>
				<!--Main Content area--> 
		        <div class=" col-md-10">
		        <ul>
		        	
		        </ul>
		        <table class="table" border="2" width="600px"  >
				<thead align="center">
		        	<tr>
		        		<th>item_id</th>
		        		<th>item_name</th>
		        		<th>quantity</th>
		        		<th>cost</th>
		        		<th>order_time</th>
		        		<th>user_name</th>
		        		<th>phone</th>
		        		<th>address</th>
		        		<th>transaction_id</th>
		        		<th>status</th>
		        		<th>delivery_time</th>
		        	</tr>
		        	</thead>
		        	<?php
		        	require_once "class.MySQL.php";
		        	   
                      $obmysql=new MySQL();
                      
                       $obmysql->Select("old_bulk_orders","","order_time DESC");
                       $row=$obmysql->arrayedResult;
                        $count=0;
                        if($obmysql->records>0){
						echo '<tbody align="center">';
   	                  foreach ($row as $row) {
   	                  	# code...
   	                  
                                   $item_id=$row["item_id"]; 
                                   $item_name=$row["item_name"];
                                   $qty=$row["qty"];
                                   $cost=$row["cost"];
                                   $order_time=$row["order_time"];
                                   $user_name=$row["user_nm"];
                                   $email=$row["email_id"];
                                   $phone=$row["mobile_no"];
                                   $address=$row["shipping_address"];
                                   $transaction_id=$row["txn_id"];
                                   $status=$row["status"];
                                   $delivery_time=$row["delivery_time"];         
                       	        echo '<tr>';
	                       		echo '<td>'.$item_id.'</td>';
	                       		echo '<td>'.$item_name.'</td>';
	                       		echo '<td>'.$qty.'</td>';
	                       		echo '<td>'.$cost.'</td>';
	                       		echo '<td>'.$order_time.'</td>';
	                       		echo '<td>'.$user_name.'</td>';
	                       		echo '<td>'.$phone.'</td>';
	                       		echo '<td>'.$address.'</td>';
	                       		echo '<td>'.$transaction_id.'</td>';
	                       		echo '<td>'.$status.'</td>';
	                       		echo '<td>'.$delivery_time.'</td>';
	                       		echo '</tr>';
	                       		     
	                  }
					  echo '</tbody>';
	                  }else{
	                  	echo "no queries ";
	                  }
	                  	
		        	?>
		        </table>
		        
		           <!--
						Write all
						your code
						here...
						It will appear in the content 
						section of webpage
		           -->
		        
	    		</div>
	    	</div>
		</div>
	</div>
	<!--All javascript placed at the end so that the page loads faster-->
    <script src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>
</body>
</html>

