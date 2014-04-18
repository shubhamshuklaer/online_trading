<?php
include_once "../config/config.php";

$username = constant("USERNAME");                                                                // database connection
$password = constant("PASS");
$hostname = constant("DB_HOST");
$dbhandle = mysql_connect($hostname, $username, $password)
		or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
$selected = mysql_select_db("online_trading",$dbhandle)
	or die("Could not select examples");

$search_pre = 5;
$sep = array();
$result6 = mysql_query("SELECT search_text FROM search_history WHERE user_nm=  '".$_SESSION["user_nm"]."'");       // getting all the search text for a particular user over time
while ($row = mysql_fetch_array($result6)) {
   $sep1 = explode(" ",$row{'search_text'});                                                     // seperating all the search words
   for($z = 0;$z < count($sep1); $z++)
   	{
   		array_push($sep,$sep1[$z]);                                                              // pushing the same into an array named $sep
   	}
}
print_r($sep);
echo "<br>";
$result = mysql_query("SELECT tag_values from rec_pre where user_nm =  '".$_SESSION["user_nm"]."'");               // getting corresponding tag_values for the same user
while($row = mysql_fetch_array($result)){
	$mstr2 = explode(",",$row{'tag_values'});
  	
}
foreach($mstr2 as $nstr )
	{            
    	$narr = explode("=",$nstr);
		$narr[0] = str_replace("\x98","",$narr[0]);                                              // get this array in the form of associate array
		$ytr[1] = $narr[1];
		$a[$narr[0]] = $ytr[1];
	}
print_r($a);                                                                            
echo "<br>";
$newArray = array_keys($a);                                                                       
for($x =0 ;$x < count($sep); $x++)
{
	for($y=0;$y< count($newArray); $y++)
	{
		if((strtolower($sep[$x])) == (strtolower($newArray[$y])))                               // checking whether the search word is a tag and is already present in
		{                                                                                       // tag values for the user,then we add the value corresponding to search 
			$a[$newArray[$y]] = $a[$newArray[$y]] + $search_pre;                                // preference 
		}

	}
	if(!in_array(strtolower($sep[$x]),$newArray))                                               // if not present in tag values of the user and is a valid tag then 
	{                                                                                           // we the corresponding tag to his tag values list
		$a[$sep[$x]] = $search_pre;
	}
}
print_r($a);
$newArray = array_keys($a);
$string = "";
for($y = 0; $y < count($newArray); $y++){
	$string = $string.$newArray[$y]."=".$a[$newArray[$y]].",";                                  // concatenating the string to push back
}
echo "<br>";
echo $string;
$string1 = substr($string ,0 ,strlen($string)-1);
$some = mysql_query("UPDATE rec_pre SET tag_values = '".$string1."' where user_nm = '".$_SESSION["user_nm"]."'");
?>