<?php
    session_start();
    require_once("MySqlConnect.php");
    include_once("library_main.php");
    logout();
    header("Location: index.php");
?>