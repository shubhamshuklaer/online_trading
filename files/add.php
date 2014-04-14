<?php
    session_start();
    $username=$_SESSION['user_nm'];;
    require_once "class.MySQL.php";
    $omysql=new MySql();
    $p_address=$_POST['address'];
    //session_start();
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $address="C/O: ".$first_name." ".$last_name."<br>".$p_address;
    $phone=$_POST['contact_no'];
    //Set the global variable
    if(isset($_POST['check'])){
        if($_POST['check']=="checked"){
            //Update the user table
            $from="user";
            $where=array("user_nm like"=>$username);
            $set=array("address"=>$address,"phone"=>$phone);
            $omysql->Update($from, $set, $where);
            $affect=$omysql->affected;
        }
    }
    else{
        $_SESSION['address']=$address;
        //echo $_SESSION['address'];
    }
    session_write_close();
    include_once "checkout.php";
 ?>
