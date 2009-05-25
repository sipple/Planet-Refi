<?php
    session_start();
    require_once("library_main.php");
    logout();
    header("Location: index.php");
?>
