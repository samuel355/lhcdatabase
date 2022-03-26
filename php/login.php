<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $user_pass = md5($password);
            $enc_pass = $row['password'];
            $utype = $row['utype'];
            if($user_pass === $enc_pass){

                if($utype == 'user'){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['user'] = 'user';
                    echo "success-user";
                }else if($utype == 'admin'){
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['admin'] = 'admin';
                    echo "success-admin";
                }
                
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>