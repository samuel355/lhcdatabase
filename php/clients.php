<?php
    include_once "config.php";

    $sql = "SELECT * FROM clients ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";

    if(mysqli_num_rows($query) == 0){
        $output .= " No Clients have been added yet";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "php/data.php";
    }
    echo $output;
?>
