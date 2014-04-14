<?php
    require_once "class.MySQL.php";
    // your php code
    session_start();
    $username = $_SESSION['user_nm'];
    $id=$_GET["item_id"];
    //////////////////////////Get credits to be pushed back///////////////////////////
    $from = "orders";
    $omysql = new MySQL();
    $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
    $omysql->Select($from, $where);
    $res = $omysql->arrayedResult;
    $qty = $res[0]["qty"];   //found quantity
    $from = "items";
    $omysql = new MySQL();
    $where = array("item_id like"=>$id);
    $omysql->Select($from, $where);
    $res1 = $omysql->arrayedResult;
    $ini_qty = $res1[0]["quantity"];
    /////////Calculate credits to be pushed back
    $price = $res1[0]["cost"] + (($res1[0]["cost"]*$res1[0]["tax"])/100);
    $tot = $price*$qty;
    /////////Get current credit
    $from = "user";
    $where = array("user_nm like"=>$username);
    $omysql->Select($from, $where);
    $res2 = $omysql->arrayedResult;
    $credits = $res2[0]["credit"];
    $newCredit = $credits+$tot;
    ////////push back credits
    $where = array("user_nm like"=>$username);
    $set = array("credit"=>$newCredit);
    $omysql->Update($from, $set, $where);
    $rows = $omysql->affected;
    ////////////////////////////////update the items table/////////////////////////////////
    $where = array("item_id like"=>$id);
    $newqty = $ini_qty + $qty;
    $set = array("quantity"=>$newqty);
    $omysql->Update("items", $set, $where);
    /////////////////////////////delete from orders table//////////////////////////////////
    $fromtable = "orders";
    $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
    $omysql->Delete($fromtable, $where);
    $rows1 = $omysql->affected;
    if($rows>0 && $rows1>0)
    {
        echo json_encode("1");
    }
    else
    {
        echo json_encode("0");
    }
?>
