 <?php
 include_once "../config/config.php";



 $connect=mysql_connect( constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
		             or die('Could not connect to the database: '.mysql_error());

		            $db='online_trading';
		            mysql_select_db($db) or die('Could not select the database ('.$db.') ');

		            $query  = 'SELECT * FROM `shipment_requirements` ' ;
		            $result =  mysql_query($query) or die(' Query failed to execute... '.mysql_error());



		           	function set_min_total_cost($cost)
		           	  {
		           	  	 
		           	  	 $query_update_cost= " UPDATE `shipment_requirements` SET `min_cost`=$cost WHERE `id`=0 ";
		           	  	  mysql_query($query_update_cost) or die(' Query failed to execute... '.mysql_error());

		           	  }
		           	function set_min_no_of_items($items)
		           	  {
		           	  	$query_update_items= " UPDATE `shipment_requirements` SET `min_items`=$items WHERE `id`=0 ";
		           	  	 mysql_query($query_update_items) or die(' Query failed to execute... '.mysql_error());

		           	  }
		           	function get_min_total_cost()
		           	  {
		           	  	 $query  = 'SELECT * FROM shipment_requirements' ;
		          	     $result =  mysql_query($query) or die(' Query failed to execute... '.mysql_error());
		           	  	 $min_cost=MYSQL_RESULT($result , 0 ,"min_cost" );	
		           	  	 return $min_cost;	           	  	 
		           	  }
		           	function get_min_no_of_items()
		           	  {
		           	  	 $query  = 'SELECT * FROM shipment_requirements' ;
		          	     $result =  mysql_query($query) or die(' Query failed to execute... '.mysql_error());
		           	  	 $min_items=MYSQL_RESULT($result , 0 ,"min_items" );
		           	  	 return $min_items;
		           	  }

		     ?>