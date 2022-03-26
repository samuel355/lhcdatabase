<?php
    session_start();
    include_once "config.php";

    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM clients WHERE (firstname LIKE '%{$searchTerm}%' OR lastname LIKE '%{$searchTerm}%'  OR phone LIKE '%{$searchTerm}%'  OR plot_details LIKE '%{$searchTerm}%'  OR email LIKE '%{$searchTerm}%' ) ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){

            if($row['amount_payed'] == ''){
                $amount_payed = 0;
            }
            
            $amount_remaining = $row['total_amount'] - $amount_payed;
            $output .= '
                <div class="single-item-list">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="item-image">
                                <img src="client-images/'.$row['passport_pic'].'" alt="#">
                                <div class="content">
                                    <h3  class="title"><a style="color: #690308; font-weight: bold" href="javascript:void(0)"><span class="text-dark">Name: </span> ' .$row['title']. " " . $row['firstname']. " " . $row['lastname'].'</a></h3>
                                    <p style="color: #690308; font-weight: bold" class="price"> <span class="text-dark">Phone: </span> '.$row['phone'].' </p>
                                    <p style="color: #690308; font-weight: bold"><span class="text-dark">Email: </span> '.$row['email'].' </p>
                                    <p style="color: #690308; font-weight: bold"><span class="text-dark">ID Type: </span> '.$row['id_type'].' </p>
                                    <p style="color: #690308; font-weight: bold"><span class="text-dark">ID Number: </span> '.$row['id_number'].' </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="content">
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Agent: </span> '.$row['agent'].'</p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Plots: </span> '.$row['number_of_plots'].' </p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Total Amount: </span> GHS. '.$row['total_amount'].' </p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Amount Payed: </span> GHS. '.$row['amount_payed'].' </p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Amount Remaining: </span> GHS. '.$amount_remaining.' </p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Plot Details: </span> '.$row['plot_details'].' </p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="content">
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Allocation: </span> '.$row['allocation'].'</p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Site Plan: </span> '.$row['site_plan'].'</p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Search: </span> '.$row['search'].' </p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Cadastral Plan: </span> '.$row['cadastral_plan'].' </p>
                                <p style="color: #690308; font-weight: bold"><span class="text-dark">Registration: </span> '.$row['registration_lc'].'</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <ul class="action-button">
                                <li title="Edit"><a href="update-client.php?id='.$row['id'].'"><i class="lni lni-pencil"></i></a></li>
                                <li title="View/Update"><a href="update-client.php?id='.$row['id'].'"><i class="lni lni-eye"></i></a></li>
                                <li title="Delete"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            ';
        }
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>