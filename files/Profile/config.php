<?php
define("HOST11", "http://localhost/online_trading");
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASS", "shubham@781039");
define("DBNAME", "online_trading");


function getUserNamePattern() {
    return "/^[a-zA-Z0-9_\.]+$/";
}

function getPasswordPattern() {
    return "/^[a-zA-Z0-9]+$/";
}

function getNamePattern(){
    return "/^[a-zA-Z\s\.]+$/";
}
?>
