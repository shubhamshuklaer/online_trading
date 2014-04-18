<?php
include_once "../config/config.php";

$username = constant("USERNAME");                                                                   // connection to database 
$password = constant("PASS");
$hostname = constant("DB_HOST");
$dbhandle = mysql_connect($hostname, $username, $password)
		or die("Unable to connect to MySQL");
// echo "Connected to MySQL<br>";
$selected = mysql_select_db("online_trading",$dbhandle)
	or die("Could not select examples");
$watch_pre = 5;

$result = mysql_query("SELECT tag_values from rec_pre where user_nm ='".$_SESSION["user_nm"]."'");                  // getting the tag_values string for the corresponding user
while($row = mysql_fetch_array($result)){
	$mstr2 = explode(",",$row{'tag_values'});
  	
}
//print_r($mstr2);
foreach($mstr2 as $nstr )
	{
    	$narr = explode("=",$nstr);
		$narr[0] = str_replace("\x98","",$narr[0]);                                                  // getting this array in the form of associate array
		$ytr[1] = $narr[1];
		$a[$narr[0]] = $ytr[1];
	}
// print_r($a);         
// echo "<br>";

$mstr3 = array();
$mstr4 = array();
$result7 = mysql_query("SELECT item_id from watch_list where user_nm = '".$_SESSION["user_nm"]."'");                       // getting the item_id for all the items in the watchlist 
while($row = mysql_fetch_array($result7)){                                                            //  of corresponding user 
	// print_r($row);                                                                                    // for every item_id we get its tags from the items table 
	$results = mysql_query("SELECT tags from items where item_id = '".$row['item_id']."'");           // explode this tags and pushing them into into array mstr4
	while($rows = mysql_fetch_array($results)){
		$mstr3 = explode(",",$rows['tags']);
		for($z = 0;$z < count($mstr3); $z++)
   		{
   			array_push($mstr4,$mstr3[$z]);                                                             
   		}
	}
	// print_r($mstr3);
	// echo "<br>";
}
// print_r($mstr4);
// echo "<br>";
$newArray = array_keys($a);                                                                             
$newArray2 = array_map('strtolower', $newArray);
//echo $newArray[1];
for($x =0 ;$x < count($mstr4); $x++)                                                                // increasing the tag_values column in the rec_pre table 
{
	for($y=0;$y< count($newArray); $y++)                                                            // comparing the keys in both arrays 
	{
		if((strtolower($mstr4[$x])) == (strtolower($newArray[$y])))
		{
			$a[$newArray[$y]] = $a[$newArray[$y]] + $watch_pre;                                      // checking whether the tag for this item is already present in
		}                                                                                           // tag_values ,if present we add the value
                                                                                                
	}
	if(!in_array(strtolower($mstr4[$x]),$newArray2))                                                // if not present, we add the tag to the tag_values string in 
	{                                                                                               // rec_pre table 
		$a[$mstr4[$x]] = $watch_pre;
	}
}
// print_r($a);
arsort($a);
// print_r($a);
$keys = array_keys($a);
// print_r($keys);
$result7 = mysql_query("SELECT tags,item_id from items");
while ($rows = mysql_fetch_array($result7))                                        // extracting the tags and item_id for every item 
{ 
	//echo $rows{'tags'}."<br>";
	$count = 0;
	$tag_s = explode(",",$rows{'tags'});
	//print_r($tag_s);
	//echo "<br>";
	//echo "<br>";
	for($x =0 ;$x < count($tag_s); $x++)
	{
		for($y=0;$y< 5; $y++)                                        
		{
			if((strtolower($tag_s[$x])) == (strtolower($keys[$y])))                  // comparing tag values of ecah item against the tag values having highest 
			{                                                                       // priority and increasing the count for that item 
				$count++;
			}

		}
	}
//	echo $count."<br>";
	$counter[$rows{'item_id'}] = $count;

}
//print_r($counter);
arsort($counter); 
$names = array_keys($counter);
// echo "Item Ids of trending items : ";
// echo "<br>";
$string2 = "";
for($x = 0;$x < 3;$x++)
{
	// echo $names[$x];
	// echo "<br>";
	$string2 = $string2.$names[$x].",";
}     
$string2 = substr($string2 ,0 ,-1);
// echo $string2;
mysql_query("UPDATE rec_pre set rec_items = '".$string2."' where user_nm='".$_SESSION["user_nm"]."'");
// echo $string2;
//$string3 = substr($string ,0 ,strlen($string)-1);
//$some = mysql_query("UPDATE rec_pre SET rec_items = '".$string3."' where user_nm = 'Sathwik'");*/
?>