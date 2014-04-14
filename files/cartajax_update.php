
    <?php
    require_once "class.MySQL.php";
    // your php code
    session_start();
    $username = $_SESSION['user_nm'];
    $q=$_GET["qtyStr"];
    $id=$_GET["item_id"];
    $omysql = new MySQL();
    $from = "items";
    $where = array("item_id like"=>$id);
    $omysql->Select($from, $where);
    $res = $omysql->arrayedResult;
    $rows = $omysql->records;
    if($rows>0 && $res[0]["quantity"] >= $q)
    {
        $from = $_GET["table"];
        $where = array("user_nm like"=>$username,"AND item_id like"=>$id);
        $set = array("qty"=>$q);
        $omysql->Update($from, $set, $where);
        $res1 = $omysql->arrayedResult;
        echo json_encode("1");
    }
    else
    {
        echo json_encode("0");
    }
    ?>

