<?php include_once "include/head.php" ?>

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
                <div class="col-lg-3 col-md-12 col-12">

                    <div class="dashboard-sidebar">
                        <div class="user-image">
                            <img src="assets/images/blog/blog1.jpg" alt="#">
                            <h3>Steve Aldridge
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
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
                                        <div class="col-lg-3 col-md-3 col-12 align-right">
                                            <h5>Action</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="item-image">
                                                <img src="assets/images/blog/blog1.jpg" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)"><span class="text-dark">Name: </span>Mr. Samuel Osei Adu</a></h3>
                                                    <span class="price"><span class="text-dark">Phone: </span>  0246562377</span>
                                                    <p><span class="text-dark">Email: </span> asamuel355@gmail.com</p>
                                                    <p><span class="text-dark">Address: </span> Plot 16, Ekuaba Estate, Spintex-Accra </p>
                                                    <p><span class="text-dark">Agent: </span> L.H.C </p>
                                                    <p><span class="text-dark">ID Type: </span> Passport </p>
                                                    <p><span class="text-dark">ID Number: </span> G-150-89793</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="content">
                                                <p><span class="text-dark">Plots: </span> 1</p>
                                                <p><span class="text-dark">Amount</span> GHs. 35000 </p>
                                                <p><span class="text-dark">Amount Payed </span> 25000 </p>
                                                <p><span class="text-dark">Amount Remaining </span> 10000</p>
                                                <p><span class="text-dark">Plot Details</span> 14, Osei Tutu Street</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="content">
                                                <p><span class="text-dark">Allocation: </span> No </p>
                                                <p><span class="text-dark">Site Plan: </span> Yes</p>
                                                <p><span class="text-dark">Search</span> Yes </p>
                                                <p><span class="text-dark">Cadastral Plan</span> No </p>
                                                <p><span class="text-dark">Registration</span> No</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <ul class="action-button">
                                                <li title="Edit"><a href="javascript:void(0)"><i class="lni lni-pencil"></i></a></li>
                                                <li title="View/Update"><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li title="Delete"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>


                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="item-image">
                                                <img src="assets/images/blog/blog1.jpg" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)"><span class="text-dark">Name: </span>Mr. Samuel Osei Adu</a></h3>
                                                    <span class="price"><span class="text-dark">Phone: </span>  0246562377</span>
                                                    <p><span class="text-dark">Email: </span> asamuel355@gmail.com</p>
                                                    <p><span class="text-dark">Address: </span> Plot 16, Ekuaba Estate, Spintex-Accra </p>
                                                    <p><span class="text-dark">Agent: </span> L.H.C </p>
                                                    <p><span class="text-dark">ID Type: </span> Passport </p>
                                                    <p><span class="text-dark">ID Number: </span> G-150-89793</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="content">
                                                <p><span class="text-dark">Plots: </span> 1</p>
                                                <p><span class="text-dark">Amount</span> GHs. 35000 </p>
                                                <p><span class="text-dark">Amount Payed </span> 25000 </p>
                                                <p><span class="text-dark">Amount Remaining </span> 10000</p>
                                                <p><span class="text-dark">Plot Details</span> 14, Osei Tutu Street</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-3 col-md-3 col-12">
                                            <div class="content">
                                                <p><span class="text-dark">Allocation: </span> No </p>
                                                <p><span class="text-dark">Site Plan: </span> Yes</p>
                                                <p><span class="text-dark">Search</span> Yes </p>
                                                <p><span class="text-dark">Cadastral Plan</span> No </p>
                                                <p><span class="text-dark">Registration</span> No</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <ul class="action-button">
                                                <li title="Edit"><a href="javascript:void(0)"><i class="lni lni-pencil"></i></a></li>
                                                <li title="View/Update"><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li title="Delete"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                
                                </div>

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