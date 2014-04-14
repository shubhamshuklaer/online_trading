<?php
session_start();
if($_SESSION['authentication']==false)
{
    $username = $_SESSION['user_nm'];
    $omysql = new MySQL();
    $from = "cart";
    $where = array("user_nm like"=>$username);
    $omysql->Delete($from, $where);
    $res1 = $omysql->arrayedResult;
    $rows = $omysql->affected;
}
session_unset($_SESSION['user_nm']);
session_unset($_SESSION['authentication']);
session_unset($_SESSION['name']);
setcookie("user_nm","",time()-3600,'/');
header("Location: http://localhost/online_trading/files/Profile/login.php");
?>
