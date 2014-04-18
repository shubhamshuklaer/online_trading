<?php
session_start();
include_once "../config/config.php";

$username = constant("USERNAME");                                                                   // connection to database 
$password = constant("PASS");
$hostname = constant("DB_HOST");
$dbhandle = mysql_connect($hostname, $username, $password)
		or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db("online_trading",$dbhandle)
	or die("Could not select examples");
 
$order_pre = 20;                                                                                    // specified value for order 

$result = mysql_query("SELECT tag_values from rec_pre where user_nm = '".$_SESSION["user_nm"]."'");                  // getting the tag_values string for the corresponding user
while($row = mysql_fetch_array($result)){
	$mstr2 = explode(",",$row{'tag_values'});
  	
}
print_r($mstr2);
foreach($mstr2 as $nstr )
	{
    	$narr = explode("=",$nstr);
		$narr[0] = str_replace("\x98","",$narr[0]);                                                  // getting this array in the form of associate array
		$ytr[1] = $narr[1];
		$a[$narr[0]] = $ytr[1];
	}
print_r($a);         
echo "<br>";
$b = $a;
$newArray = array_keys($a); 
for($x1 = 0; $x1 < count($a); $x1++)
	{
		$a[$newArray[$x1]] = 0;                                                  // intializing associative array with tags as keys and "0" in their key value
	}

$mstr3 = array();
$mstr4 = array();
$result7 = mysql_query("SELECT item_id from orders where user_nm = '".$_SESSION["user_nm"]."'");                       // getting the item_id for all the orders of the user from 
while($row = mysql_fetch_array($result7)){                                                            // table orders
	print_r($row);                                                                                    // for every item_id we get its tags from the items table 
	$results = mysql_query("SELECT tags from items where item_id = '".$row['item_id']."'");           // explode this tags and pushing them into into array mstr4
	while($rows = mysql_fetch_array($results)){
		$mstr3 = explode(",",$rows['tags']);
		for($z = 0;$z < count($mstr3); $z++)
   		{
   			array_push($mstr4,$mstr3[$z]);                                                             
   		}
	}
	print_r($mstr3);
	echo "<br>";
}
print_r($mstr4);
echo "<br>";
                                                                            
$newArray2 = array_map('strtolower', $newArray);
//echo $newArray[1];
$string = "";
for($x =0 ;$x < count($mstr4); $x++)                                                                   // increasing the tag_values column in the rec_pre table 
{
	for($y=0;$y< count($newArray); $y++)                                                               // comparing the keys in both arrays 
	{
		if((strtolower($mstr4[$x])) == (strtolower($newArray[$y])))
		{
			$a[$newArray[$y]] = $a[$newArray[$y]] + $order_pre;                                         // checking whether the tag for this item is already present in
	    }                                                                                              // tag_values ,if present we add the value
    }
	if(!in_array(strtolower($mstr4[$x]),$newArray2))                                                   // if not present, we add the tag to the tag_values string in 
	{                                                                                                  // rec_pre table 
		$a[$mstr4[$x]] = $order_pre;
	}
}
echo "<br>";
print_r($a);
$newArray = array_keys($a);
for($y = 0; $y < count($newArray); $y++){
	$string = $string.$newArray[$y]."=".$a[$newArray[$y]].",";                                            // concatenating the string to push back
}
echo "<br>";
echo $string;
//print_r($b);
$string1 = substr($string ,0 ,strlen($string)-1);
$some = mysql_query("UPDATE rec_pre SET tag_values = '".$string1."' where user_nm = '".$_SESSION["user_nm"]."'");       // This updates the tag_values column in the rec_pre table
?>