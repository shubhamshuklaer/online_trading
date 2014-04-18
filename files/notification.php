<?php
	if(!isset($_SESSION))
    session_start();
	include_once 'class.MySQL.php';
	$object=new MYSQL();
	$result=array();
	$notifications=array();
	$type=array();
	$link=array();
	$i=0;
 	$row=$object->ExecuteSQL("SELECT * from wish_list where user_nm='".$_SESSION['user_nm']."'");
 	while(isset($row[$i]))
 	{
 		$result[$i]="";
 		$query="SELECT * from items where ";
 		$item_nm=$row[$i]['item_nm'];
 		$tags=$row[$i]['Tags'];
 		$query=$query." category like'%".$row[$i]['category']."%' AND ( ";
 		$tok=strtok($row[$i]['item_nm']," ");
 		while($tok!==false)
 		{
 			$query=$query."`item_nm` like '%$tok%'  or  `author_nm` like '%$tok%' or `genre` like '%$tok%' or `brand` like '%$tok%' or `model` like '%$tok%' or `description` like '%$tok%' or ";
 			$tok=strtok(" ");
 		}
 		$tok=strtok("$tags",";");
 		while($tok!==false)
 		{
 			$fut=strtok(";");
 			if($fut!==false)
 			$query=$query."`item_nm` like '%$tok%'  or  `author_nm` like '%$tok%' or `genre` like '%$tok%' or `brand` like '%$tok%' or `model` like '%$tok%' or `description` like '%$tok%' or ";
 		    else
 		    {
 				$query=$query."`item_nm` like '%$tok%'  or  `author_nm` like '%$tok%' or `genre` like '%$tok%' or `brand` like '%$tok%' or `model` like '%$tok%' or `description` like '%$tok%' ) AND `item_id` not in (";
 		    }
 		    $tok=$fut;	
 		}
 		$tok=strtok($row[0]['Exceptions'],";");
 		while($tok!=false)
 		{
 			$query=$query."'$tok',";
 			$tok=strtok(";");
 		}
 		$query=$query." '')";
 		$j=0;
 		$output=$object->ExecuteSQL($query);
 		while(isset($output[$j])){
	 			$found=true;
	 			// if($key=="item_nm")
	 			// {
	 			// 	$token=strtok($value," ");
	 			// 	while($token!=false)
	 			// 	{
	 			// 	$pattern="/".$token."/i";
	 			// 	if(preg_match($pattern, $row[$i]['item_nm'])==1)
	 			// 		{
	 			// 			$found=true;
	 			// 			break;
	 			// 		}
	 			// 	$token=strtok(" ");
	 			// 	}
	 			// 	if($found==false)
	 			// 	{
	 			// 	$token=strtok($row[$i]['item_nm']," ");
	 			// 	while($token!=false)
	 			// 	{
	 			// 	$pattern="/".$token."/i";
	 			// 	if(preg_match($pattern, $value)==1)
	 			// 		{
	 			// 			$found=true;
	 			// 			break;
	 			// 		}
	 			// 		$token=strtok(" ");
	 			// 	}
	 			// 	}
	 			// }
	 			if($found==true)
 				{
 					foreach ($result as $key => $value) {
 						$pattern=$value;
 						$tok=strtok($pattern,";");
 						while($tok!=false)
 						{
 							if($tok==$output[$j]["item_id"])
 								{$found=false;
 									break;}
 									$tok=strtok(";");
 						}
 					}
 					if($found==true)
 					{
 						$result[$i]=$result[$i].$output[$j]["item_id"].";";
 						
 					}
 				}
 		++$j;
 	}
 	if($result[$i]!="")
 		{
 			$notifications[$i]='Items relevant to your wishlist item '.$row[$i]["item_nm"].' are available.';
 			$type[$i]="wishlist";
			$link[$i]="wishlist_confirmation.php";
 		}
 	++$i;
}
	$row=$object->ExecuteSQL("SELECT * from watch_list where user_nm='".$_SESSION['user_nm']."'");
	$j=0;
	while(isset($row[$j])){
		$output=$object->ExecuteSQL("SELECT * from items where item_id='".$row[$j]["item_id"]."'");
		if($output[0]["cost"]>$row[$j]["previous_cost"])
			{
				$notifications[$i]="The cost of ".$output[0]["item_nm"]." has increased";
				$type[$i]=$output[0]["item_id"];
				$link[$i]=$output[0]["type"].".php?item_id=".$type[$i];
				++$i;
			}
		else if($output[0]["cost"]<$row[$j]["previous_cost"])
			{
				$notifications[$i]="The cost of ".$output[0]["item_nm"]." has decreased";
				$type[$i]=$output[0]["item_id"];
				$link[$i]=$output[0]["type"].".php?item_id=".$type[$i];
				++$i;
			}
			++$j;
		}
		$j=0;
	$row=$object->ExecuteSQL("SELECT * from auction_bidder where user_nm='".$_SESSION['user_nm']."' ORDER by `item_id` DESC, `bid` DESC");
	while(isset($row[$j])){
                  $k=$j+1;
                  while(isset($row[$k]))
                  {
                    if($row[$k]['item_id']==$row[$j]['item_id'])
                      ++$k;
                    else
                      break;
                  }
		$curr=$object->ExecuteSQL("SELECT * from auction_bidder where item_id='".$row[$j]['item_id']."' ORDER BY `bid` DESC");
        $curr_bid=$curr[0]['bid'];
        $krow=$object->ExecuteSQL("SELECT * from items where item_id='".$row[$j]['item_id']."'");
		if($row[$j]['bid']<$curr_bid)
		{
			$notifications[$i]="You are losing the bid for ".$krow[0]['item_nm']."";
				$link[$i]="auction.php?item_id=".$row[$j]['item_id'];
				$type[$i]="bid";
				++$i;
		}
		$j=$k;
	}
	$_SESSION['wishlist_found']=$result;
	$_SESSION['notifications']=$notifications;
	$_SESSION['notifications_type']=$type;
	$_SESSION['notifications_link']=$link;
?>