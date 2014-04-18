<?php

include_once "../config/config.php";

$username = constant("USERNAME");                                                              // database connection 
$password = constant("PASS");
$hostname = constant("DB_HOST");
$dbhandle = mysql_connect($hostname, $username, $password)
		or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db("online_trading",$dbhandle)
	or die("Could not select examples");

// declaration of all the tags used 
// Books,Cycles,Electronics,Mobiles,Mobile Accessories,Computers,Computer Accessories,Cameras and Accessories,Audio and Video
	// Books -- Literature and Fiction, Textbooks,Business Magazines
	// Cycles -- 
	// Electronics -- all mobiles,mob acc,com acc,came acc audio and video
	// Mobiles -- smartphone, Samsung,Nokia,Android,Windows
	//Mobile Accessories -- Mobile Memory Cards, Cases and Covers,Mobile Headphones,Bluetooth headsets
	// Computer -- apple ,hp,dell
	//computer Accessories -- External Hard Disks,Pendrives,Headphones, Mouse
	//Cameras and Accessories -- Canon,Nikon,Sony,Lenses,Tripods,Memory Cards
	// Audio and Video -- MP3 Players,ipods,Speakers,Apple,
	// Tablets -- Apple,Samsung,Micromax,


$tag_arr = array();
$result1 = mysql_query("SELECT different_tags FROM tags ");
while($row1 = mysql_fetch_array($result1)){
	$new = explode(",",$row1{'different_tags'});
	for($z = 0;$z < count($new); $z++){
		array_push($tag_arr,$new[$z]);
	}
}
//print_r($tag_arr);
/*$result6 = mysql_query("SELECT search_text FROM search_history WHERE user_nm= 'Sathwik'");       // getting all the search text for a particular user over time
while ($row = mysql_fetch_array($result6)) {
   $sep1 = explode(" ",$row{'search_text'});                                                     // seperating all the search words
   for($z = 0;$z < count($sep1); $z++)
   	{
   		array_push($sep,$sep1[$z]);                                                              // pushing the same into an array named $sep
   	}
}
print_r($sep);
*/
//$tag_arr = array('Samsung','mobiles','electronics','pendrive','clothes','tshirt','caps','mouse','levis');
$tag_val = array();
for($x1 = 0; $x1 < count($tag_arr); $x1++)
	{
		$tag_val[$tag_arr[$x1]] = 0;                                                  // intializing associative array with tags as keys and "0" in their key value
	}
$newArray2 = array_keys($tag_val);

$result3 = mysql_query("SELECT tag_values FROM rec_pre ");                            // getting tag_values of all the users
while ($row2 = mysql_fetch_array($result3)) {                                         // for each user do the following
   $mstr2 = explode(",",$row2{'tag_values'});                                         // exploding the string in the tag_values column into associative array 
  foreach($mstr2 as $nstr )
	{                                                                                 // with keys and values
    	$narr = explode("=",$nstr);                                              
		$narr[0] = str_replace("\x98","",$narr[0]);
		$ytr[1] = $narr[1];
		$a[$narr[0]] = $ytr[1];
	}
	$newArray = array_keys($a);                                                     // extracting the keys into this newArray
	//print_r($newArray);
	//echo "<br>";
	//echo "<br>";
	for($x2 = 0; $x2 < count($newArray); $x2++)
	{                                                                               
	for($y = 0; $y < count($newArray2); $y++)
		{
			if(strtolower($newArray[$x2]) == strtolower($newArray2[$y]))            // comparing each tag value for a particular user against array tag_val keys
			{
				$tag_val[$newArray2[$y]] += $a[$newArray[$x2]];                     // if matched we are increasing the value of that particular tag in the tag_val array
			}
		}
	}
	$a = array();
	//print_r($tag_val);
	//echo "<br>";
}
//print_r($tag_val);
arsort($tag_val);                                                                   // Sorting the tag_val array based on the values in the array
//echo "<br>";
//print_r($tag_val);
//echo "<br>";
$tre = array_keys($tag_val);
//print_r($tre);
//echo "<br>";
$counter = array();
$result7 = mysql_query("SELECT tags,item_id from items");
while ($rows = mysql_fetch_array($result7))                                        // extracting the tags and item_id for every item 
{ 
	//echo $rows{'tags'}."<br>";
	$count = 0;
	$tag_s = explode(",",$rows{'tags'});
	//print_r($tag_s);
	//echo "<br>";
	for($x =0 ;$x < count($tag_s); $x++)
	{
		for($y=0;$y< count(5); $y++)                                        
		{
			if((strtolower($tag_s[$x])) == (strtolower($tre[$y])))                  // comparing tag values of ecah item against the tag values having highest 
			{                                                                       // priority and increasing the count for that item 
				$count++;
			}

		}
	}
//	echo $count."<br>";
	$counter[$rows{'item_id'}] = $count;

}
//print_r($counter);                                                                  
//echo "<br>";
arsort($counter);                                                                   // sorting the item and count values array 
//print_r($counter);
$names = array_keys($counter);
echo "Item Ids of trending items : ";
echo "<br>";
for($x = 0;$x < 3;$x++)
{
	echo $names[$x];
	echo "<br>";
}
?>