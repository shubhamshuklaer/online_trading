<?php
    session_start();
	include_once 'class.MySQL.php';
	$object=new MYSQL();
	$result=array();
	$notifications=array();
	$i=0;
 	$row=$object->ExecuteSQL("SELECT * from wish_list where user_nm='".$_SESSION['user_nm']."'");
 	while(isset($row[$i]))
 	{
 		$result[$i]="";
 		$query="SELECT * from items where user_nm='".$_SESSION['user_nm']."' AND ";
 		$item_nm=$row[$i]['item_nm'];
 		$tags=$row[$i]['Tags'];
 		$query=$query." category='".$row[$i]['category']."' AND ( `item_nm` like '%$item_nm%' or author_nm like '%$item_nm%' or genre like '%$item_nm%' or `brand` like '%$item_nm%' or `model` like '%$item_nm%' or ";
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
 						$notifications[$i]='<a href="wishlist_confirmation.php">Items relevant to your wishlist item '.$row[$i]["item_nm"].' are available.</a>';
 					}
 				}
 		++$j;
 	}
 	++$i;
}
	$_SESSION['wishlist_found']=$result;
	$_SESSION['notifications']=$notifications;
 	echo json_encode($result);
?>