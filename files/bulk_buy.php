<?php

    session_start();
    if(!isset($_SESSION['authentication_bulk']))
      header("Location:bulk_vendor_login.php");


$item_id=$_POST['id'];
$qty=$_POST['q'];

  require_once "class.MySQL.php";

  $objmysql=new MySQL();
 
  
  $user_nm_bulk=$_SESSION["user_nm"];//take username from the user's session
  $curr_datetime=date("Y-m-d H:i:s");//take current datetime from the server 
  /***********Take name and cost of the item and name of the vendor from the vendor's table**********************************************************************************************************/
  $where=array("id ="=>$item_id);
  $objmysql->Select("vendor's database",$where,"");
  
  $result=$objmysql->arrayedResult;
  $vendor_name="";
  if($objmysql->records>0)
  {
   foreach($result as $rs)
   {
    $item_name=$rs["name"];
    $cost=$rs["cost"];
    $vendor_name=$rs["username"];

  }
 }

  $total_cost=$qty*$cost;
  /*********Take the shipping_address,phone,and email of the user from the user table************************************************************************************************************************/
  
  $whre=array("user_nm ="=>$_SESSION["user_nm"]);

  $objmysql->Select("user",$whre);
  $r=$objmysql->arrayedResult;
    $check_user=0;
  if($objmysql->records>0)
  {
    foreach($r as $t){
    $email_id=$t["email"];
    $mobile_no=$t["phone"];
    $shipping_address=$t["address"];
    $check_user++;
    }
  }


    $connect=mysql_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
             or die('Could not connect to the database: '.mysql_error());

           $db='online_trading';
           mysql_select_db($db) or die('Could not select the database ('.$db.') ');
           $txn_id=1;
           $order_id=2;
 
    /***********************************place the order in bulk_order*****************************************************************/
   $query1="INSERT INTO `bulk_order` (`user_nm`,`qty`,`item_id`,`txn_id`,`order_id`,`order_time`,`cost`,`shipping_address`,`mobile_no`,`item_name`,`email_id`,`vendor_name`) VALUES('$user_nm_bulk',$qty,$item_id,$txn_id,$order_id,'$curr_datetime',$total_cost,'$shipping_address',$mobile_no,'$item_name','$email_id','$vendor_name')";
    // echo $query1;
  $objmysql->ExecuteSQL($query1);
  // echo $objmysql->lastError;
  

  
  
?>