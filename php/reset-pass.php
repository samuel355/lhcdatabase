<?php
    session_start();
    include_once "config.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repassword = mysqli_real_escape_string($conn, $_POST['re-password']);

    if(empty($email)){
        echo "Enter you email";
    }else if(empty($password) && empty($repassword)){
        echo "Enter your password";
    }else if($password != $repassword){
        echo "passwords do not match";
    }else{

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $encrypt_pass = md5($password);
            $update_query = mysqli_query($conn, "UPDATE users SET password = '{$encrypt_pass}' WHERE email = '{$email}'");

            if($update_query){
                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                if(mysqli_num_rows($select_sql2) > 0){
                    $result = mysqli_fetch_assoc($select_sql2);
                    $_SESSION['unique_id'] = $result['unique_id'];
                    echo "success";
                }else{
                    echo "This email address not Exist!";
                }
            }else{
                echo "Sorry something went wrong";
            }
        }else{
            echo "Email Does not exist";
        }
    }

?>