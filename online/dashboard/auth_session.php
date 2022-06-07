<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: spider_add.php");
        exit();
    }
?>
