<?php
    session_start();
    session_destroy();
    unset($_SESSION['admin']);
    unset($_SESSION['user']);
    unset($_SESSION['unique_id']);
    header("location: index.php");
?>