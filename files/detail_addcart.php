<?php
    require_once "class.MySQL.php";
    // your php code
    session_start();
    $username = $_SESSION['user_nm'];
    $id=$_GET["item_id"];
    $omysql = new MySQL();
    //////////////////////////////////////check if item avlbl///////////////////////////////////
    $from = "items";
    $where = array("item_id like"=>$id);
    $omysql->Select($from, $where);
    $res = $omysql->arrayedResult;
    $rows = $omysql->records;
    $stock = 0;
    if($rows)
    {
        //item found in items
        $stock=$res[0]["quantity"];
        //////////////////////////check if item already in cart///////////////////////
        $from = "cart";
        $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
        $omysql->Select($from, $where);
        $res = $omysql->arrayedResult;
        $rows1 = $omysql->records;
        if($rows1)
        {
            //item already in cart update qty
            $cartqty = $res[0]["qty"];
            $q = $cartqty+1;
            $from = "cart";
            $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
            $set = array("qty"=>$q);
            $omysql->Update($from, $set, $where);
            $res1 = $omysql->arrayedResult;
            echo json_encode("1");
        }
        else
        {
            /////////item not already in cart insert
            $vars=array("user_nm"=>$username,"item_id"=>$id,"qty"=>"1");
            $omysql->Insert($vars,"cart");
            $rows2 = $omysql->affected;
            echo json_encode("1");
        }
    }
    else
    {
        //item not in the items table
        echo json_encode("0");
    }
?>
