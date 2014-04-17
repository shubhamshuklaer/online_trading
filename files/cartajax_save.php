<?php
    require_once "class.MySQL.php";
    // your php code
    session_start();
    $username = $_SESSION['user_nm'];
    $id=$_GET["item_id"];
    $fromtable = $_GET["fromtable"];
    $totable = $_GET["totable"];
    $omysql = new MySQL();
    //////////////////////Get quantity from fromtable//////////////////
    $qty = 0;
    $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
    $omysql->Select($fromtable, $where);
    $res = $omysql->arrayedResult;
    $qty = $res[0]["qty"];
    ////////////////////////check if item_id already in user's totable////////////////////
    $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
    $omysql->Select($totable, $where);
    $res1 = $omysql->arrayedResult;
    $ini_rows = $omysql->records;
    ////////////////////////take initial qty if already in totable
    $ini_qty = 0;
    if($ini_rows==0)
    {
        $ini_qty = 0; //set initial qty
    }
    else if($ini_rows>0)
    {
        $ini_qty = $res1[0]["qty"]; //get initial qty from totable
    }
    $q = $ini_qty + $qty; //qty to be moved
    ///////////////////////check if stock is available for the changes//////////////////
    $omysql1 = new MySQL();
    $from = "items";
    $where = array("item_id like"=>$id);
    $omysql1->Select($from, $where);
    $result = $omysql1->arrayedResult;
    $stock = $result[0]["quantity"]; //get stock amount
    if($stock>=$q)
    {
        ////////////////ENOUGH STOCK////////////////
        //delete from fromtable
        $omysql->Delete($fromtable, $where);
        $rows = $omysql->affected;
        //check fr duplicate entries
        if($ini_rows>0)
        {
            //entry already exists in totable, update qty
            $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
            $set = array("qty"=>$q);
            $omysql->Update($totable, $set, $where);
            $res2 = $omysql->arrayedResult;
            $rows1 = $omysql->affected;
        }
        else if($ini_rows==0)
        {
            //not in table so just insert in totable
            $vars=array("user_nm"=>$username,"item_id"=>$id,"qty"=>$qty);
            $omysql->Insert($vars,$totable);
            $rows1 = $omysql->affected;
        }
        if($rows && $rows1)
        {
            echo json_encode("1");
        }
        else
        {
            echo json_encode("0");
        }
    }
    else
    {
        /////////NOT ENOUGH STOCK////////////
        echo json_encode("stock alert");
    }
?>
