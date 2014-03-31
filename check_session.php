<?php
session_start();
echo $_SESSION["user_nm"];
    if (!isset($_SESSION['user_nm'])) {
        header("Location: ".constant("HOSTNAME")."/login.php");
    }
?>