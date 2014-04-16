<?php
session_start();
    if (!isset($_SESSION['user_nm'])) {
        header("Location: ./Profile/login.php");
    }
?>
