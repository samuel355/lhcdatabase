<?php
    session_start();
    include_once "config.php";
    
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repassword = mysqli_real_escape_string($conn, $_POST['re-password']);

    if(empty($fullname)){
        echo "Enter your fullname";
    }else if(empty($email)){
        echo "Enter you email";
    }else if(empty($password) && empty($repassword)){
        echo "Enter your password";
    }else if($password != $repassword){
        echo "passwords do not match";
    }else{

        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            echo "$email - This email already exist!";
        }else{
            $unique_id = rand(time(), 100000000);
            $encrypt_pass = md5($password);

            $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fullname, email, password)
            VALUES ({$unique_id}, '{$fullname}', '{$email}', '{$encrypt_pass}')");

            if($insert_query){
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
        }
    }

?>