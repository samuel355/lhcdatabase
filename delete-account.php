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
                                <?php
        
                                    if($row_user['utype'] == 'admin'){
                                        echo ' 
                                            <li><a href="dashboard.php" ><i class="lni lni-dashboard"></i> Dashboard</a></li>
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
                        <div class="dashboard-block close-content mt-0">
                            <h2>Client Detail</h2>
                            <h5>Wrong client id correspondent. Try editing client detail again and if the problem persist, contact the developer</h5>
                            <div class="button">
                                <a href="users.php" class="btn">Clients</a>
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