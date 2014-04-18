    <?php
    require_once "class.MySQL.php";
    // your php code
    session_start();
    $username = $_SESSION['user_nm'];
    $id=$_GET["item_id"];
    $order_id  = $_GET["order_id"];
    $omysql = new MySQL();
    $from = "orders";
    $dt = date("Y/m/d");
    $where = array("order_id like"=>$order_id,"AND item_id like"=>$id);
    $set = array("status"=>"Delivered","delivery_time"=>$dt);
    $omysql->Update($from, $set, $where);
    $omysql->Select($from,$where);
    $res1 = $omysql->arrayedResult;
    $qty = $res1[0]["qty"];
    //echo $qty."<br>";
    $rows = $omysql->affected;
    if($rows)
    {
        //////////////////////////////order is confirmed so pay the seller///////////////////////////
        //get sellers name from items table
        $from = "items";
        $where = array("item_id like"=>$id);
        $omysql->Select($from,$where);
        $res2 = $omysql->arrayedResult;
        $seller = $res2[0]["user_nm"];
        //echo $seller."<br>";
        $price = $res2[0]["cost"] + (($res2[0]["cost"]*$res2[0]["tax"])/100);
        $tot = $price*$qty;
        //get the seller's' credits
        $from = "user";
        $where = array("user_nm like"=>trim($seller));
        $omysql->Select($from,$where);
        $res3 = $omysql->arrayedResult;
        $ini_credit = $res3[0]["credit"];
        //echo $ini_credit."<br>";
        //pay the seller
        $new_credit = $ini_credit+$tot;
        //echo $new_credit."<br>";
        $set = array("credit"=>$new_credit);
        $omysql->Update($from, $set, $where);
        ////////////////////////////////////////////////////////////////////////////////////////////
        echo json_encode("1");
    }
    else
    {
        echo json_encode("0");
    }

    ?>
