<?php
    require_once "class.MySQL.php";
    // your php code
    session_start();
    $username = $_SESSION['user_nm'];
    $id=$_GET["item_id"];
    $omysql = new MySQL();
    $from = $_GET["table"];
    $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
    $omysql->Delete($from, $where);
    $res1 = $omysql->arrayedResult;
    $rows = $omysql->affected;
    if($rows)
    {
        echo json_encode("1");
    }
    else
    {
        echo json_encode("0");
    }
    ?>
