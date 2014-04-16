<?php  
           require_once "check_session.php";
            require_once "class.MySQL.php";           
            $omysql=new MySQL();
            if(isset($_SESSION["item_id"]) && isset($_GET["bid"])){
              $item_id = $_SESSION['item_id'];
              $bid = $_GET['bid'];
              $cur_bid = $_SESSION['cur_bid'];
              if($bid > $cur_bid){
              $vars = array('user_nm'=>$_SESSION["user_nm"],'item_id'=>$item_id,'bid'=>$bid);
              $omysql->Insert($vars,"auction_bidder");
              echo "Your bid has been saved.Please keep checking the bid.";
            }
            else{
              echo "your bid could not be placed as the bid value is less than current bid";
            }
        }

            
?>