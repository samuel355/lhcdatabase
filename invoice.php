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
                            <?php include_once "include/nav.php" ?>
                            <div class="button">
                                <a class="btn" href="javascript:void(0)">Logout</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">invoice</h3>

                            <div class="invoice-items default-list-style">

                                <div class="default-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Package</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Invoice date</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Due date</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Status</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p>Action</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Free Package
                                                <span>$0.00</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Jan 13,2023</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Feb 5,2021</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p class="paid">Paid</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Premuim Package
                                                <span>$59.00</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Mar 15,2023</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Jan 5,2022</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p class="pending">Pending</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Standard Package
                                                <span>$99.00</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Dec 13,2023</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Nov 25,2021</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p class="paid">Paid</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Free Package
                                                <span>$0.00</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Jan 13,2023</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Feb 5,2021</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p class="paid">Paid</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Premium Package
                                                <span>$79.00</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Apr 11,2023</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>May 23,2022</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p class="unpaid">Unpaid</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p>Free Package
                                                <span>$0.00</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Jan 13,2023</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Feb 5,2021</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p class="paid">Paid</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-trash"></i></a></li>
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