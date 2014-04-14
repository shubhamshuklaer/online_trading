<?php
require_once "class.MYSQL.php";
$obmysql=new MySQL();
$obmysql->Select("bulk_order","","");
$result=$obmysql->arrayedResult;

echo $obmysql->records;

if($obmysql->records>0)
{
 $flag=0;
 foreach($result as $row)
 {
   $obmysql->Insert($row,"old_bulk_orders","");
   $flag++;
 }
if($flag>0)
{

  $obmysql->Delete("bulk_order");
  $row_old=$obmysql->arrayedResult;
  $flag_old=0;
  foreach($row_old as $old)
   {
    $flag_old++;
   }
  if($flag_old>0)
   {
	
	?>
	<script>
	alert("Items added to the shipping queue");
	location.href="new_orders.php";
	</script>
	 <?php
   }
  
 }
  
}

?>