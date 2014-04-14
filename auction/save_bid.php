<?php  
           require_once "check_session.php";
            require_once "class.MySQL.php";           
            $omysql=new MySQL();
            if(isset("item_id") && isset("bid")){
              $item_id = $_GET['item_id'];
              $user_nm = $_SESSION["user_nm"];
              $bid = $_GET['bid'];
              $vars = array('user_nm'=>$_SESSION["user_nm"],'item_id'=>$item_id,'bid'=>$bid);
              $omysql->Insert($vars,"auction_bidder");
           }
            
?>