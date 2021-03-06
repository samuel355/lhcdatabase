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

    $query = "SELECT *, COUNT(*) AS numrows FROM clients";
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch();
?>
<?php
    if(!isset($_SESSION['admin'])){
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

    <section class="dashboard section" style="margin-top: 3rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="dashboard-sidebar">
                        <div class="m-3">
                            <h5>
                                <?php echo $row_user['fullname']; ?>
                                <p><?php echo $row_user['email']; ?> </p>
                            </h5>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <?php
        
                                    if($row_user['utype'] == 'admin'){
                                        echo ' 
                                            <li><a class="active" href="dashboard.php" ><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                        ';
                                    }
                                ?>
                                <li><a href="users.php"><i class="lni lni-users "></i>All Clients</a></li>
                                <li><a href="add-user.php"><i class="lni lni-circle-plus"></i> Add Client</a></li>
                                <li><a target="_blank" href="https://plots.landandhomesconsult.org"><i class="lni lni-circle-pls"></i> Adense Plots</a></li>
                            </ul>
                            <div class="button">
                                <a class="btn" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">

                        <div class="details-lists">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">

                                    <div class="single-list">
                                        <div class="list-icon">
                                            <i class="lni lni-users"></i>
                                        </div>
                                        <h3 style="color: #690008">
                                            <?php echo number_format($row['numrows']) ?>
                                            <span style="color: black; font-weight: bold">Total Customers Purchased</span>
                                        </h3>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-md-4 col-12">

                                    <div class="single-list two">
                                        <div class="list-icon">
                                            <i class="lni lni-money"></i>
                                        </div>
                                        <h3 style="color: #690308">
                                            <?php
                                               include_once "php/config.php";
                                               $query_ta = mysqli_query($conn, "SELECT * FROM clients");

                                               $total_amount = 0;
                                               while($num = mysqli_fetch_assoc($query_ta)){
                                                    $total_amount += $num['total_amount'];
                                                }
                                                $total_amount = number_format($total_amount);
                                                echo " GHS. ". $total_amount;
                                            ?>
                                            <span style="color: black; font-weight: bold">Total Amount Paid By Clients</span>
                                        </h3>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-md-4 col-12">

                                    <div class="single-list three">
                                        <div class="list-icon">
                                            <i class="lni lni-money"></i>
                                        </div>
                                        <h3 style="color: #690308">
                                            <?php
                                               include_once "php/config.php";
                                               $query_tr = mysqli_query($conn, "SELECT * FROM clients");

                                               $total_amount_remaining = 0;
                                               while($num = mysqli_fetch_assoc($query_tr)){
                                                    $total_amount_remaining += $num['amount_remaining'];
                                                }
                                                $total_amount_remaining = number_format($total_amount_remaining);
                                                echo " GHS. ". $total_amount_remaining;
                                            ?>
                                            <span style="color: black; font-weight: bold">Total Amount Remaining</span>
                                        </h3>
                                    </div>

                                </div>
                                <div class="row mt-5">
                                    <div class="col-12">
                                        <h4 class="text-center">RECENTLY ADDED CUSTOMERS</h4>
                                        <div class="my-items mt-5">

                                            <div class="item-list-title">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <h5>Client Details</h5>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <h5>Plot Details</h5>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-12">
                                                        <h5>Todo List</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-item-list">
                                                <?php
                                                    include_once "php/config.php";

                                                    $sql = "SELECT * FROM clients ORDER BY id DESC LIMIT 4";
                                                    $query = mysqli_query($conn, $sql);

                                                    if(mysqli_num_rows($query) == 0){
                                                        echo(" No Clients have been added yet");
                                                    }elseif(mysqli_num_rows($query) > 0){
                                                        while($row = mysqli_fetch_assoc($query)){
                                                            echo '
                                                                <div class="row align-items-center">
                                                                    <div class="col-lg-6 col-md-6 col-12">
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
                                                                            <p style="color: #690308; font-weight: bold"><span class="text-dark">Amount Remaining: </span> GHS. '.$row['amount_remaining'].' </p>
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
                                                                </div>
                                                                <hr>
                                                            ';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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