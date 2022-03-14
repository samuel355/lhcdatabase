<?php
session_start();
ob_start();

$connect = new PDO("mysql:host=localhost;dbname=lhc_clients_db", "root", "");
$message = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $first_name  = $_POST["first_name"];
    $last_name  = $_POST["last_name"];
    $phone   = $_POST["phone"];
    $email   = $_POST["email"];

    $query = " INSERT INTO clients (firstname, lastname, phone, email) 
        VALUES (:first_name, :last_name, :phone, :email)";

    $user_data = array(
        ':first_name'  => $_POST["first_name"],
        ':last_name'  => $_POST["last_name"],
        ':phone'   => $_POST["phone"],
        ':email'   => $_POST["email"]
    );
    $statement = $connect->prepare($query);

    if($statement->execute($user_data)){
        $message = '
        <div class="alert alert-success">
            Registration Completed Successfully
        </div>
        ';

    }else{
        $message = '
            <div class="alert alert-success">
            There is an error in Registration
            </div>
        ';
    }
}
?>