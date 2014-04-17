<?php
    require_once "class.MySQL.php";
    // your php code
    session_start();
    $username = $_SESSION['user_nm'];
    $id=$_GET["item_id"];
    $omysql = new MySQL();
    //////////////////////////////////////check if item in watch list///////////////////////////////////
    $from = "watch_list";
    $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
    $omysql->Select($from, $where);
    $res = $omysql->arrayedResult;
    $rows = $omysql->records;
    if($rows)
    {
        //item found in watch list
        echo json_encode("duplicate");
    }
    else
    {
        //item not in the watch_list table
        $select_where=array("item_id ="=>$id);
        $omysql->Select("items",$select_where);
        $vars=array("user_nm"=>$username,"item_id"=>$id,"previous_cost"=>$omysql->arrayedResult[0]["cost"]);
        $omysql->Insert($vars,"watch_list");
        $rows2 = $omysql->affected;
        echo json_encode("1");
    }
?>
