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
                <div class="col-lg-3 col-md-4 col-12">

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
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0 pb-0">
                            <h3 class="block-title mb-0">Messages</h3>

                            <div class="messages-body">
                                <div class="form-head">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-12">
                                            <form class="chat-search-form">
                                                <input type="text" placeholder="Search username" name="search">
                                                <button value="search" type="submit"><i class="lni lni-search-alt"></i></button>
                                            </form>
                                        </div>
                                        <div class="col-lg-7 col-12 align-right">
                                            <h3 class="username-title">Carlos Dobson</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5 col-12">

                                        <div class="user-list">
                                            <ul>

                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="image">
                                                            <img src="assets/images/messages/image1.jpg" alt="#">
                                                        </div>
                                                        <span class="username">Laura Cormier</span>
                                                        <span class="short-message">Hi, how are ...</span>
                                                        <span class="unseen-message">02</span>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="image">
                                                            <img src="assets/images/messages/image2.jpg" alt="#">
                                                        </div>
                                                        <span class="username">Paul Cox</span>
                                                        <span class="short-message">I love your design...</span>
                                                        <span class="time">NOW</span>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="image">
                                                            <img src="assets/images/messages/image3.jpg" alt="#">
                                                        </div>
                                                        <span class="username">Carlos Dobson</span>
                                                        <span class="short-message">Hi, how are ...</span>
                                                        <span class="time">2 mins</span>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="image busy">
                                                            <img src="assets/images/messages/image4.jpg" alt="#">
                                                        </div>
                                                        <span class="username">Dahia Divers</span>
                                                        <span class="short-message">Nice to meet u ...</span>
                                                        <span class="time">5 mins</span>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="image">
                                                            <img src="assets/images/messages/image5.jpg" alt="#">
                                                        </div>
                                                        <span class="username">Jenifer Lofes</span>
                                                        <span class="short-message">Hello, I need so...</span>
                                                        <span class="time">NOW</span>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="javascript:void(0)">
                                                        <div class="image">
                                                            <img src="assets/images/messages/image6.jpg" alt="#">
                                                        </div>
                                                        <span class="username">jebs Kristin</span>
                                                        <span class="short-message">Hi, I have...</span>
                                                        <span class="time">20 mins</span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="col-lg-7 col-12">

                                        <div class="chat-list">
                                            <ul class="single-chat-head">
                                                <li class="left">
                                                    <img src="assets/images/messages/image1.jpg" alt="#">
                                                    <p class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        <span class="time">9:51 AM</span>
                                                    </p>
                                                </li>
                                                <li class="right">
                                                    <img src="assets/images/messages/image2.jpg" alt="#">
                                                    <p class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        <span class="time">11:00 AM</span>
                                                    </p>
                                                </li>
                                                <li class="left">
                                                    <img src="assets/images/messages/image1.jpg" alt="#">
                                                    <p class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        <span class="time">12:00 AM</span>
                                                    </p>
                                                </li>
                                                <li class="right">
                                                    <img src="assets/images/messages/image2.jpg" alt="#">
                                                    <p class="text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                        <span class="time">12:25 AM</span>
                                                    </p>
                                                </li>
                                            </ul>
                                            <div class="reply-block">
                                                <ul class="add-media-list">
                                                    <li><a href="javascript:void(0)"><i class="lni lni-link"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="lni lni-image"></i></a></li>
                                                </ul>
                                                <input name="reply" type="text" placeholder="Type your message here...">
                                                <button class="reply-btn"><img src="assets/images/messages/send.svg" alt="#"></button>
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