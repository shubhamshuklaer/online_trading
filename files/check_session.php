<?php
session_start();
// echo $_SESSION["authentication"]=="false";
    if (!isset($_SESSION['authentication'])||!$_SESSION["authentication"]) {
        header("Location: login.php");
    }
?>
