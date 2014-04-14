<?php                               
include_once "admin_shipment_requirements.php";
$flag=0;
   if(isset($_POST["min_count"]))
	{
		set_min_no_of_items($_POST["min_count"]);
	    $flag++;
	   echo '<br>';
	} 
	else
	{
	   print_r("Enter the min_count value again");
	}
	echo '<br>';
	if(isset($_POST["min_amount"]))
	{
	   set_min_total_cost($_POST["min_amount"]);
	   $flag++;
	}
	else
	{
		print_r("Enter the min_amount value again");
        echo '<br>';
    }

    if($flag==2)
    { 
    	?>
    	<script> 

    	alert("Update Successful");
    	location.href = 'vendors.php';

    	</script>
    	<?php


    }

?>
						