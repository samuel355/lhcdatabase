<?php include_once "include/head.php" ?>
<?php
    session_start();
    ob_start();

    $connect = new PDO("mysql:host=localhost;dbname=lhc_clients_db", "root", "");
    $message = '';

    if(isset($_POST['email'])){

        $query = " INSERT INTO clients (firstname, lastname, phone, email) 
            VALUES (:first_name, :last_name, :phone, :email)";

        $user_data = array(
            ':first_name'  => $_POST["first_name"],
            ':last_name'  => $_POST["last_name"],
            ':phone'   => $_POST["mobile_no"],
            ':email'   => $_POST["email"]
        );
        $statement = $connect->prepare($query);

        if($statement->execute($user_data)){
            $message = '
            <div class="alert alert-success">
                Registration Completed Successfully
            </div>
            ';

        }else{
            $message = '
                <div class="alert alert-success">
                There is an error in Registration
                </div>
            ';
        }
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
                        <div class="user-image">
                            <img src="assets/images/blog/blog1.jpg" alt="#">
                            <h3>Steve Aldridge
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a href="dashboard.php" ><i class="lni lni-dashboard"></i> Dashboard</a></li>
                                <li><a href="users.php"><i class="lni lni-users "></i> Clients</a></li>
                                <li><a class="active" href="add-user.php"><i class="lni lni-circle-plus"></i> Add Client</a></li>
                            </ul>
                            <div class="button">
                                <a class="btn" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Insert Client Details</h3>
                            <div class="inner-block">
                                <div class="post-ad-tab">
                                    <form method="POST" id="register_form">
                                        <?php echo $message; ?>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="hide-errorText alert alert-danger text-center all-errorText"></p>
                                            </div>
                                        </div>
                                        <nav>
                                            <div class="nav nav-tabs">
                                                <button class="nav-link active active_tab1" aria-selected="true" style="border:1px solid #ccc" id="list_login_details" data-bs-target="#login_details" data-bs-toggle="tab" >Clients Details</button>
                                                <button class="nav-link inactive_tab1" aria-selected="false" id="list_personal_details" style="border:1px solid #ccc" data-bs-target="#personal_details" data-bs-toggle="tab" >PLot Details</button>
                                                <button class="nav-link inactive_tab1" aria-selected="false" id="list_contact_details" style="border:1px solid #ccc" data-bs-target="#contact_details" data-bs-toggle="tab" >Document Info</button>
                                            </div>
                                        </nav>

                                        <div class="tab-content" id="nav-tabContent" style="margin-top:16px;">
                                            <div class="tab-pane fade show active" id="login_details" role="tabpanel" aria-labelledby="login_details">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="step-one-content">
                                                            <div class="default-form-style" >
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Title * </label>
                                                                            <div class="selector-head title-container">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="title" id="title" class="user-chosen-select">
                                                                                    <option value="none">Select Title</option>
                                                                                    <option value="Mr.">Mr.</option>
                                                                                    <option value="Mrs.">Mrs.</option>
                                                                                    <option value="Miss.">Miss</option>
                                                                                    <option value="MrMrs.">Mr./Mrs.</option>
                                                                                </select>
                                                                            </div>
                                                                            <span id="error_title" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>First Name(s) *</label>
                                                                            <input class="first_name_container" name="first_name" id="first_name" type="text" placeholder="First Name">
                                                                            <span id="error_first_name" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Surname/Lastname(s) *</label>
                                                                            <input class="last_name_container" name="last_name" id="last_name" type="text" placeholder="Surname / Last Name(s) ">
                                                                            <span id="error_last_name" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Phone *</label>
                                                                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" />
                                                                            <span id="error_mobile_no" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>email</label>
                                                                            <input name="title" id="email" type="text" placeholder="Email">
                                                                            <span id="error_email" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>ID Type * </label>
                                                                            <div class="selector-head id_type_container">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="card-type" class="user-chosen-select" id="id_type" name="id_type">
                                                                                    <option value="none">Select ID</option>
                                                                                    <option value="voter-id">Voter ID </option>
                                                                                    <option value="passport">Passport</option>
                                                                                    <option value="driver-license">Drivers' License</option>
                                                                                    <option value="ghana-card">Ghana Card</option>
                                                                                </select>
                                                                            </div>
                                                                            <span id="error_id_type" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>ID Number * </label>
                                                                            <input name="id_number" type="text" placeholder="ID Number" id="id_number">
                                                                            <span id="error_id_number" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Upload Passport Picture </label>
                                                                            <input name="passport_pic" id="passport_pic" type="file" placeholder="Upload Passport Picture">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="text-center button">
                                                                            <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="personal_details" role="tabpanel" aria-labelledby="personal_details">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="step-two-content">
                                                            <div class="default-form-style" method="post" action="#">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Agent </label>
                                                                            <div class="selector-head agent-container">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="agent" class="user-chosen-select" id="agent">
                                                                                    <option value="none">Select Agent</option>
                                                                                    <option value="lhc">L.H.C</option>
                                                                                    <option value="gloria">Gloria</option>
                                                                                    <option value="nanaB">Nana B</option>
                                                                                </select>
                                                                            </div>
                                                                            <span class="error_agent text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Date *</label>
                                                                            <input name="date" type="date" id="date" placeholder="Set Date">
                                                                            <span class="error_date text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Number of Plots </label>
                                                                            <div class="selector-head number_of_plots_container">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="number-of-plots" id="number-of-plots" name="number-of-plots" class="user-chosen-select">
                                                                                    <option value="none">Select Number of Plots</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="2">2</option>
                                                                                    <option value="3">3</option>
                                                                                    <option value="4">4</option>
                                                                                    <option value="5">5</option>
                                                                                    <option value="6">6</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="8">8</option>
                                                                                    <option value="9">9</option>
                                                                                    <option value="10">10</option>
                                                                                </select>
                                                                            </div>
                                                                            <span class="error_number_of_plots text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="total-amount">Total Amount</label>
                                                                            <input name="total-amount" readonly id="total-amount" type="text">
                                                                            <span class="error_total_amount text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="amount-payed"> Amount Payed</label>
                                                                            <input name="amount-payed" id="amount-payed" type="text">
                                                                            <span class="error_amount_payed text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="amount-remaining">Amount Remaining</label>
                                                                            <input disabled name="amount-remaining" id="amount-remaining" type="text">
                                                                            <span class="error_amount_remaining text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mt-30">
                                                                            <label>Plot Details</label>
                                                                            <textarea class="plot_details_container" name="plot-details" id="plot-details" placeholder="Plot Details "></textarea>
                                                                            <span class="error_plot_details text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="text-center button">
                                                                            <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
                                                                            <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="contact_details" role="tabpanel" aria-labelledby="contact_details">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="step-three-content">
                                                            <div class="default-form-style">
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="form-group">
                                                                            <label>Allocation</label>
                                                                            <div class="selector-head">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="allocation" class="user-chosen-select">
                                                                                    <option selected value="No">No</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="form-group">
                                                                            <label>Site Plan</label>
                                                                            <div class="selector-head">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="site_plan" class="user-chosen-select">
                                                                                    <option selected value="No">No</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="form-group">
                                                                            <label>Cadastral Plan</label>
                                                                            <div class="selector-head">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="cadastral_plan" class="user-chosen-select">
                                                                                    <option selected value="No">No</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="form-group">
                                                                            <label>Search</label>
                                                                            <div class="selector-head">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="search" class="user-chosen-select">
                                                                                    <option selected value="No">No</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="form-group">
                                                                            <label>Lease Preparation</label>
                                                                            <div class="selector-head">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="lease_preparation" class="user-chosen-select">
                                                                                    <option selected value="No">No</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-12">
                                                                        <div class="form-group">
                                                                            <label>Registration / Lands Commission</label>
                                                                            <div class="selector-head">
                                                                                <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                                                                <select name="registration_lc" class="user-chosen-select">
                                                                                    <option selected value="No">No</option>
                                                                                    <option value="Yes">Yes</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="text-center button">
                                                                            <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                                                                            <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Add Client</button>
                                                                        </div>
                                                                     </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .box{
            width:800px;
            margin:0 auto;
        }
        .inactive_tab1{
            background-color: #f5f5f5;
            color: #333;
            cursor: not-allowed;
        }
        .has-error{
            border-color:#cc0000;
        }
        .div-error{
            border: 1.5px solid red;
            border-radius: 8px;
        }
        .hide-errorText{
            display: none;
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

    <script>
        $(document).ready(function(){
            $("#number-of-plots, #total-amount, #amount-payed, #amount-remaining").change(function(){

                var number_of_plots = Number($("#number-of-plots").val());
                var amount_payed = Number($("#amount-payed").val());
                var amount_remaining = Number($("#amount-remaining").val(0));
                var total_amount = Number($("#total-amount").val(0));

                total_amount = number_of_plots * 35000;

                amount_payed = total_amount - amount_remaining;

                $("#total-amount").val(total_amount);

                $("#amount-remaining").val(total_amount);
                
            });

            $("#total-amount, #amount-payed, #amount-remaining").keyup(function(){
                var total_amount= Number($("#total-amount").val());
                var amount_payed = Number($("#amount-payed").val());
                var amount_remaining = $("#amount-remaining").val();

                amount_remaining = total_amount - amount_payed;

                $("#amount-remaining").val(amount_remaining);
            });

            $('#btn_login_details').click(function(){

                var error_title = '';
                var error_email = '';
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                var error_mobile_no = '';
                var mobile_validation = /^\d{10}$/;
                var error_first_name = '';
                var error_last_name = '';
                var error_id_number = '';
                var error_id_type = '';

                if($.trim($("#title").val()) == "none"){
                    error_title = "Select Title";
                    $("#error_title").text(error_title);
                    $("#title").addClass('has-error');
                    $(".title-container").addClass("div-error");
                }else{
                    error_title = "";
                    $("#error_title").text(error_title);
                    $(".title-container").removeClass("div-error");
                }
                
                if($.trim($('#first_name').val()).length == 0){
                    error_first_name = 'Enter First Name';
                    $('#error_first_name').text(error_first_name);
                    $('#first_name').addClass('has-error');
                }else{
                    error_first_name = '';
                    $('#error_first_name').text(error_first_name);
                    $('#first_name').removeClass('has-error');
                }

                if($.trim($('#last_name').val()).length == 0){
                    error_last_name = 'Enter Last Name';
                    $('#error_last_name').text(error_last_name);
                    $('#last_name').addClass('has-error');
                }else{
                    error_last_name = '';
                    $('#error_last_name').text(error_last_name);
                    $('#last_name').removeClass('has-error');
                }

                if($.trim($('#mobile_no').val()).length == 0){
                    error_mobile_no = 'Enter Phone Number';
                    $('#error_mobile_no').text(error_mobile_no);
                    $('#mobile_no').addClass('has-error');
                }else{
                    if (!mobile_validation.test($('#mobile_no').val())){
                        error_mobile_no = 'Invalid Mobile Number';
                        $('#error_mobile_no').text(error_mobile_no);
                        $('#mobile_no').addClass('has-error');
                    }else{
                        error_mobile_no = '';
                        $('#error_mobile_no').text(error_mobile_no);
                        $('#mobile_no').removeClass('has-error');
                    }
                }
                
                if($.trim($('#email').val()).length == 0){
                    error_email = 'Email is required';
                    $('#error_email').text(error_email);
                    $('#email').addClass('has-error');
                }else{
                    if (!filter.test($('#email').val())){
                        error_email = 'Invalid Email';
                        $('#error_email').text(error_email);
                        $('#email').addClass('has-error');
                    }else{
                        error_email = '';
                        $('#error_email').text(error_email);
                        $('#email').removeClass('has-error');
                    }
                }
                
                if($.trim($("#id_type").val()) == "none"){
                    error_id_type = "Select ID Type";
                    $("#error_id_type").text(error_id_type);
                    $("#id_type").addClass('has-error');
                    $(".id_type_container").addClass("div-error");
                }else{
                    error_id_type = "";
                    $("#error_id_type").text(error_id_type);
                    $(".id_type_container").removeClass("div-error");
                }

                if($.trim($("#id_number").val()).length == 0){
                    error_id_number = "Enter ID Number";
                    $("#error_id_number").text(error_id_number);
                    $("#error_id_number").addClass("has-error");
                }else{
                    error_id_number = "";
                    $("#error_id_number").text(error_id_number);
                    $("#error_id_number").removeClass("has-error");
                }

                if(error_title != '' || error_first_name != '' || error_last_name != '' || error_mobile_no != '' || error_email != '' || error_id_type != '' || error_id_number != '' ){
                    return false;
                }else{
                    $("#register_form").submit();
                    //$('#list_login_details').removeClass('active active_tab1');
                    //$('#list_login_details').removeAttr('href data-toggle');
                    //$('#login_details').removeClass('active');
                    //$('#list_login_details').addClass('inactive_tab1');
                    //$('#list_personal_details').removeClass('inactive_tab1');
                    //$('#list_personal_details').addClass('active_tab1 active');
                    //$('#list_personal_details').attr('href', '#personal_details');
                    //$('#list_personal_details').attr('data-toggle', 'tab');
                    //$('#personal_details').addClass('active show');
                }
            });
 
            $('#previous_btn_personal_details').click(function(){
                $('#list_personal_details').removeClass('active active_tab1');
                $('#list_personal_details').removeAttr('href data-toggle');
                $('#personal_details').removeClass('active in');
                $('#list_personal_details').addClass('inactive_tab1');
                $('#list_login_details').removeClass('inactive_tab1');
                $('#list_login_details').addClass('active_tab1 active');
                $('#list_login_details').attr('href', '#login_details');
                $('#list_login_details').attr('data-toggle', 'tab');
                $('#login_details').addClass('active show');
            });
                
            $('#btn_personal_details').click(function(){
               
                var error_agent = '';
                var error_date = '';
                var error_number_of_plots = '';
                var error_total_amount = '';
                var error_amount_payed = '';
                var error_amount_remaining = '';
                var error_plot_details = '';

                if($.trim($("#agent").val()) == "none"){
                    error_agent = "Select Agent";
                    $(".error_agent").text(error_agent);
                    $(".error_agent").addClass("has-error")
                    $(".agent-container").addClass('div-error')
                }else{
                    error_agent = '';
                    $(".error_agent").text(error_agent);
                    $(".error_agent").removeClass("has-error")
                    $(".agent-container").removeClass('div-error')
                }

                if($.trim($("#date").val()) == ''){
                    error_date = "Choose Date";
                    $(".error_date").text(error_date);
                    $(".error_date").addClass('has-error');
                }else{
                    error_date = '';
                    $('.error_date').text(error_date);
                    $('.error_date').removeClass('has-error')
                }

                if($.trim($("#number-of-plots").val()) == "none"){
                    error_number_of_plots = "Select Number of plot(s) the client is buying";
                    $(".error_number_of_plots").text(error_number_of_plots);
                    $(".error_number_of_plots").addClass("has-error");
                    $(".number_of_plots_container").addClass('div-error');
                }else{
                    error_number_of_plots = '';
                    $(".error_number_of_plots").text(error_number_of_plots);
                    $(".error_number_of_plots").removeClass("has-error");
                    $(".number_of_plots_container").removeClass('div-error');
                }

                if($.trim($("#plot-details").val()).length == 0){
                    error_plot_details= "Enter plot details the client is buying";
                    $(".error_plot_details").text(error_plot_details);
                    $(".error_plot_details").addClass("has-error");
                    $(".plot_details_container").addClass('div-error');
                }else{
                    error_plot_details = '';
                    $(".error_plot_details").text(error_plot_details);
                    $(".error_plot_details").removeClass("has-error");
                    $(".plot_details_container").removeClass('div-error');
                }

                if(error_agent != '' || error_date != '' || error_number_of_plots != '' || error_total_amount != '' || error_amount_payed != '' || error_amount_remaining != '' || error_plot_details != '' ){
                    return false;
                }else{
                    $('#list_personal_details').removeClass('active active_tab1');
                    $('#list_personal_details').removeAttr('href data-toggle');
                    $('#personal_details').removeClass('active');
                    $('#list_personal_details').addClass('inactive_tab1');
                    $('#list_contact_details').removeClass('inactive_tab1');
                    $('#list_contact_details').addClass('active_tab1 active');
                    $('#list_contact_details').attr('href', '#contact_details');
                    $('#list_contact_details').attr('data-toggle', 'tab');
                    $('#contact_details').addClass('active show');
                }
            });

            $('#previous_btn_contact_details').click(function(){
                $('#list_contact_details').removeClass('active active_tab1');
                $('#list_contact_details').removeAttr('href data-toggle');
                $('#contact_details').removeClass('active in');
                $('#list_contact_details').addClass('inactive_tab1');
                $('#list_personal_details').removeClass('inactive_tab1');
                $('#list_personal_details').addClass('active_tab1 active');
                $('#list_personal_details').attr('href', '#personal_details');
                $('#list_personal_details').attr('data-toggle', 'tab');
                $('#personal_details').addClass('active show');
            });

            /** 
            $('#btn_contact_details').click(function(){
                var all_error_details = '';
                if($.trim($("#title").val()) == "none" || $.trim($("#first_name").val()) == "" || $.trim($("#last_name").val()) == "" || $.trim($("#mobile_no").val()) == "" || $.trim($("#email").val()) == "" || $.trim($("#id_type").val()) == "none" || $.trim($("#id_number").val()) == "" || $.trim($("#agent").val()) == "none" || $.trim($("#date").val()) == "" || $.trim($("#number-of-plots").val()) == "none" || $.trim($("#plot-details").val()) == ""){
                    all_error_details = "Check and fill all Fields correctly";
                    $('.all-errorText').removeClass('hide-errorText');
                    $('.all-errorText').text(all_error_details);
                    //$('.all-errorText').fadeOut(6000);
                    return false;
                }else{
                    $('#btn_contact_details').attr("disabled", "disabled");
                    $(document).css('cursor', 'progress');
                    $("#register_form").submit();
                }
                
            });
            */

            $('#btn_contact_details').click(function(){
                if($.trim($("#email").val()).length == 0){
                    return false;
                }else{
                    $('#btn_contact_details').attr("disabled", true);
                    $(document).css('cursor', 'progress');
                    $("#register_form").submit();
                }
            });
            

        });
    </script>
</body>
</html>