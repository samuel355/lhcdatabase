<?php

    $connect = new PDO("mysql:host=localhost;dbname=lhc_clients_db", "root", "");

    $message = '';

    if(isset($_POST["email"])){

        //$title= trim($_POST['#title']);
        $firstname = trim($_POST['first_name']);
        $lastname = trim($_POST['last_name']);
        $phone= trim($_POST['mobile_no']);
        $email = trim($_POST['email']);
        //$id_type= trim($_POST['id_type']);
        //$id_number= trim($_POST['id_number']);

        //$passport_pc= trim($_FILES['passport_pic']); /////////////
        //$agent= trim($_POST['agent']);
        //$date_added= trim($_POST['date']);
        //$number_of_plots= trim($_POST['number-of-plots']);
        //$total_amount= trim($_POST['total-amount']);
        //$amount_payed= trim($_POST['amount-payed']);
        //$amount_remaining= trim($_POST['amount-remaining']);
        //$plot_details= trim($_POST['plot_details']);
        //$allocation= trim($_POST['allocation']);
        //$site_plan= trim($_POST['site_plan']);
        //$cadastral_plan= trim($_POST['cadastral_plan']);
        //$search= trim($_POST['search']);
        //$lease_preparation= trim($_POST['lease_preparation']);
        //$registration_lc= trim($_POST['registration_lc']);

        try{   
            //$query = " INSERT INTO clients (title, firstname, lastname, phone, email, id_type, id_number, agent, date_added, number_of_plots, total_amount, amount_payed, amount_remaining, plot_details, allocation, site_plan, cadastral_plan, search, lease_preparation, registration_lc) 
            //    VALUES (:title, :first_name, :last_name, :mobile_no, :email, :id_type, :id_number, :agent, :date_added, :number_of_plots, :total_amount, :amount_payed, :amount_remaining, :plot_details, :allocation, :site_plan, :cadastral_plan, :search, :lease_preparation, :registration_lc)";
            //$stmt = $connect->prepare($query);

            $query = " INSERT INTO clients (firstname, lastname, phone, email) 
                VALUES (:first_name, :last_name, :mobile_no, :email)";
            $stmt = $connect->prepare($query);

            $stmt->execute([
                //':title' => $title,
                ':first_name' => $firstname,
                ':last_name' => $lastname,
                ':mobile_no' => $phone,
                ':email' => $email
                //':id_type' => $id_type,
                //':id_number' => $id_number
                //':passport_pic' => $passport_pc, ///////
                //':agent' => $agent,
                //':date_added' => $date_added,
                //':number_of_plots' => $number_of_plots,
                //':total_amount' => $total_amount,
                //':amount_payed' => $amount_payed,
                //':amount_remaining' => $amount_remaining,
                //':plot_details' => $plot_details,
                //':allocation' => $allocation,
                //':site_plan' => $site_plan,
                //':cadastral_plan' => $cadastral_plan,
                //':search' => $search,
                //':lease_preparation' => $lease_preparation,
                //':registration_lc' => $registration_lc
            ]);

            $client_id = $connect->lastInsertId();

            $message = '
                <div class="alert alert-success">
                    User details added successfully
                </div>
            ';

        }catch(PDOException $e){
            $message = $e->getMessage();

            $message = '
                <div class="alert alert-danger">
                    '.$e->getMessage().'
                </div>
            ';
        }
    }


?>