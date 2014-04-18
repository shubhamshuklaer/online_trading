<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="new_orders" content="width=device-width">
     <style type="text/css">
	 input[type=submit]{
	 float:right;
	 height:5em;
	 width:20em;
	 font-size:15px;
	 }
	 </style>
    <title>Template</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>

<script>
$(document).ready(function(){
	$('input').click(function(){
		var value=$(this).val();
		//alert(value);
		if(value=='ship')
		{
			var id=$(this).attr('id');
			//alert(id);

			$.ajax({
				url:'del_bulk_orders.php',
				method:'POST',
				
				success:function(result){
					//alert(result);
					location.reload();
				}
			});			

		}

	});
}); 
</script>
</head>
<body>


	<div class="container-fluid">
		<div class="result" role="header">
			<?php include_once "header.php";?> 
		</div>
	
		<div class="container-fluid">
				<!--Navigation sidebar-->
				<div class="col-sm-3 col-md-2 sidebar">
	                <ul class="nav nav-sidebar">
		                <li class="active"><a href="#">Search</a></li>
		                <li class="active"><a href="new_orders.php">New Orders</a></li>
		                <li class="active"><a href="approved_orders.php">Approved Orders</a></li>
		                <li class="active"><a href="set_threshold.php">Set Threshold</a></li>
		                <li class="active"><a href="vendors.php">Items Store</a></li>
		                <li class="active"><a href="bulk_logout.php">Log Out</a></li>
		                <li class="active"><a href="#">Help</a></li>
	                     </ul>
                </div>
				<!--Main Content area--> 
		        <div class="col-md-10">
		        <ul>
		        	
		        </ul>
		        <?php
		        	require_once "class.MySQL.php";
		        	   
                      $obmysql=new MySQL();
                      
                       $obmysql->Select("shipment_requirements");
                       $result=$obmysql->arrayedResult;
                        $min_cost=0;
                        $min_count=0;
                        if($obmysql->records>0){
   	                                foreach($result as $result){
   	                  	                      $min_count=$result["min_items"];
   	                  	                        $min_cost=$result["min_cost"];
   	                  		                  }
   	                  
   	                                $obmysql->Select("bulk_order");
   	                                $result1=$obmysql->arrayedResult;
   	                                $item_count=0;
   	                                $cost=0;
   	                                if($obmysql->records>0){
   	                                                foreach($result1 as $result1){
   	                  	                                        $item_count+=$result1["qty"];
   	                                                             $cost+=$result1["cost"];
   	                                                                    }
					                                        }
					                if($cost>=$min_cost || $item_count>=$min_count){
                                                    echo '<table border="2"  class="table" align="center">';
													echo '<thead align="centre">';
		        	                                echo '<tr>';
		        	                                echo	'<th>item_id</th>';
		        	                                echo	'<th>item_name</th>';
													echo	'<th>quantity</th>';
													echo	'<th>cost</th>';
													echo	'<th>order_time</th>';
													echo	'<th>user_name</th>';	
													//echo    '<th>email</th>';											
													echo	'<th>phone</th>';
													echo	'<th>address</th>';
													echo	'<th>transaction_id</th>';
													echo	'<th>status</th>';
													//echo	'<th>delivery_time</th>';
													echo '</tr>';
													echo '</thead>';
												   $obmysql->Select("bulk_order");
												   $result2=$obmysql->arrayedResult;
                                                   if($obmysql->records>0){
												      echo '<tbody align="center">';
   	                                                            foreach($result2 as $result2){
																			   $item_id=$result2["item_id"]; 
																			   $item_name=$result2["item_name"];
																			   $qty=$result2["qty"];
																			   $cost=$result2["cost"];
																			   $order_time=$result2["order_time"];
																			   $user_name=$result2["user_nm_bulk"];
																			   $email=$result2["email_id"];
																			   $phone=$result2["mobile_no"];
																			   $address=$result2["shipping_address"];
																			   $transaction_id=$result2["txn_id"];
																			   $status=$result2["status"];
																			   $delivery_time=$result2["delivery_time"];         
																				echo '<tr>';
																				echo '<td id=$item_id >'.$item_id.'</td>';
																				echo '<td>'.$item_name.'</td>';
																				echo '<td>'.$qty.'</td>';
																				echo '<td>'.$cost.'</td>';
																				echo '<td>'.$order_time.'</td>';
																				echo '<td>'.$user_name.'</td>';
																				//echo '<td>'.$email.'</td>';
																				echo '<td>'.$phone.'</td>';
																				echo '<td>'.$address.'</td>';
																				echo '<td>'.$transaction_id.'</td>';
																				echo '<td>'.$status.'</td>';
																				//echo '<td>'.$delivery_time.'</td>';
																				echo '</tr>';
	                       		                                                         }
								                 echo '</tbody>';
														              }
											     echo '</table>';
											     ?>
												<input  class="btn btn-primary btn-lg"  align="center" type='button' value='ship' id="ship_items">
												<?php
	                                          }else{echo "No bulk_orders yet";}
									}
	                  		        	?>
		        
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
	<!--All javascript placed at the end so that the page loads faster-->
    <script src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>
</body>
</html>

