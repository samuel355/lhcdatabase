<?php
    session_start();
    include_once "config.php";
    $id = $_GET['id'];
    echo $id;

    // sql to delete a record
    $sql = mysqli_query($conn, "DELETE FROM clients WHERE id = '{$id}'");
    echo"success message";
?>