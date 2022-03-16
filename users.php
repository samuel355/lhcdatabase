<?php include_once "include/head.php" ?>

<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=lhc_clients_db", "root", "");
    if(isset($_SESSION['unique_id'])){
        $unique_id = $_SESSION['unique_id'];

        $query_user = " SELECT * FROM users WHERE unique_id = :unique_id";
        $stmt_user = $connect->prepare($query_user);
        $stmt_user->execute([
            ':unique_id' => $unique_id,
        ]);

        $row_user = $stmt_user->fetch();
    }else{
        header('location: index.php');
    }
?>
<body>
    <nav class="navbar-fixed">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">LHC DATABASE</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="dashboard.php">Home</a></li>
                            <li>Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <section class="dashboard section"  style="margin-top: 3rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="dashboard-sidebar">
                        <div class="m-3">
                            <h5>
                                <?php echo $row_user['fullname'] ?>
                                <p><?php echo $row_user['email'] ?> </p>
                            </h5>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a href="dashboard.php" ><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                <li><a class="active" href="users.php"><i class="lni lni-users "></i> Clients</a></li>
                                <li><a href="add-user.php"><i class="lni lni-circle-plus"></i> Add Client</a></li>
                            </ul>
                            <div class="button">
                                <a class="btn" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Adense Purchasers</h3>
                            <nav class="list-nav">
                                <ul>
                                    <li class="active"><a href="javascript:void(0)">All Purchasers <span>42</span></a></li>
                                </ul>
                                <form action="">
                                    <div class="form-group">
                                        <input style="margin: 2rem 2rem 0rem 2rem; width: 85%; padding: .8rem " type="search" name="search-client" id="search-client" placeholder="Search Client">
                                    </div>
                                </form>
                            </nav>

                            <div class="my-items">

                                <div class="item-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <h5>Client Details</h5>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <h5>Plot Details</h5>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <h5>Todo List</h5>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <h5 class="text-center">Action</h5>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    include_once "php/config.php";

                                    $sql = "SELECT * FROM clients ORDER BY id DESC";
                                    $query = mysqli_query($conn, $sql);
                                    $output = "";

                                    if(mysqli_num_rows($query) == 0){
                                        $output .= " No Clients have been added yet";
                                    }elseif(mysqli_num_rows($query) > 0){
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
                                                                <img src="assets/images/blog/blog1.jpg" alt="#">
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
                                    }
                                    echo $output;
                                ?>


                                <div class="pagination left">
                                    <ul class="pagination-list">
                                        <li><a href="javascript:void(0)">1</a></li>
                                        <li class="active"><a href="javascript:void(0)">2</a></li>
                                        <li><a href="javascript:void(0)">3</a></li>
                                        <li><a href="javascript:void(0)">4</a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .action-button{
            margin: auto 1rem;
        }
        .action-button li{
            margin: .3rem;
        }
        .action-button li a{
            color: black;
            font-size: 16px !important;
        }
        .action-button li a:hover{
            background: #690308;
            color: white;
            border: 1px solid #690308;
            border-radius: 50%;
        }
        .action-button li a i{
            padding: .4rem;
            border: 1px solid #690308;
            border-radius: 50%;
        }
    </style>

    <?php include_once "include/footer.php" ?>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
</body>

</html>