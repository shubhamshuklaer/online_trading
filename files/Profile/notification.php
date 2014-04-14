<?php
if(!($connection=mysql_connect("localhost", "root", "")))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 if(!mysql_select_db("online_trading", $connection))
  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
 else{
 	session_start();
 	$rs=mysql_query("SELECT * from wishlist where user_nm='".$_SESSION['user_nm']."'");
 	$query="SELECT * from items where user_nm='".$_SESSION['user_nm']."' AND ";
 	while($row=mysql_fetch_assoc($rs)){
 		$item_nm=$row['item_nm'];
 		$tags=$row['Tags'];
 		$query=$query." category='".$row['category']."' AND ( item_nm like '$item_nm' or author_nm like 'item_nm' or genre like 'item_nm' or brand like 'item_nm' or model like 'item_nm' or ";
 		$tok=strtok("Tags",";");
 		while($tok!==false)
 		{
 			$fut=strtok(";")
 			if($fut!==false)
 			$query=$query."item_nm like '$tok' or item_condition like '$tok' or type like '$tok' or  author_nm like 'tok' or genre like 'tok' or brand like 'tok' or model like 'tok' or ";
 		    else
 		    {
 		    	$query=$query."item_nm like '$tok' or item_condition like '$tok' or type like '$tok' or  author_nm like 'tok' or genre like 'tok' or brand like 'tok' or model like 'tok'"; 		    	
 		    }
 		}
 	}

 }
?>