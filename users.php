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

    $count_query = "SELECT *, COUNT(*) AS numofclients FROM clients";
    $stmt_count = $connect->prepare($count_query);
    $stmt_count->execute();
    $rowcount = $stmt_count->fetch();
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
                            <li>Clients</li>
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
                                <?php echo $row_user['fullname']; ?>
                                <p><?php echo $row_user['email']; ?> </p>
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
                                <li><a class="active" href="users.php"><i class="lni lni-users "></i>All Clients</a></li>
                                <li><a href="add-user.php"><i class="lni lni-circle-plus"></i> Add Client</a></li>
                                <li><a target="_blank" href="https://plots.landandhomesconsult.org"><i class="lni lni-circle-pls"></i> Adense Plots</a></li>
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
                                    <li class="active"><a href="javascript:void(0)">All Purchasers <span><?php echo $rowcount['numofclients'] ?></span></a></li>
                                </ul>
                                <form action="" class="search_client" >
                                    <div class="form-group">
                                        <input style="margin: 2rem 2rem 0rem 2rem; width: 85%; padding: .8rem " type="search" name="search_client" id="search_client" placeholder="Search Client">
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

                                <div class="single-item-list" id="item_div">

                                </div>
                                
                                
                                <div class="pagination left">
                                    <?php
                                        include_once "php/config.php"; 
                                        $limit = 4;
                                        $sql = "SELECT COUNT(id) FROM clients";  
                                        $rs_result = mysqli_query($conn, $sql);  
                                        $row = mysqli_fetch_row($rs_result);  
                                        $total_records = $row[0];  
                                        $total_pages = ceil($total_records / $limit);
                                        
                                        
                                    ?>
                                    <ul class="pagination-list">
                                        <?php 
                                            if(!empty($total_pages)){
                                                for($i=1; $i<=$total_pages; $i++){
                                                    if($i == 1){
                                                        ?>
                                                            <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>
                                                                                
                                                        <?php 
                                                    }
                                                    else{
                                                        ?>
                                                            <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h4 class="text-center">Are you sure you want to delete this user</h4>
            </div>
            <div class="modal-footer">
                <form action="" >
                    <div class="button">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger confirm_delete">Delete</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

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
    <script>
        const searchBar = document.querySelector("#search_client"),
        clientList = document.querySelector(".single-item-list");

        searchBar.onkeyup = () =>{
            let searchTerm = searchBar.value;
            let xhr = new XMLHttpRequest();

            xhr.open("POST", "php/search.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        clientList.innerHTML = data;
                    }
                }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("searchTerm=" + searchTerm);
        }

        ////Delete Client

        $('.delete_client').on('click', function (e) {
            var id = $(this).attr('data-id');
            console.log(id)
            $('.confirm_delete').attr('data-id',id);
        });
        
        $(".confirm_delete").on('click', function (e) {
            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: 'php/delete.php',
                type: 'GET',
                data: {id: id},
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    $("#"+id).remove();
                    window.location.reload(true);
                    
                }
            });
        });

        //pagination
        $(".single-item-list").load("php/pagination.php?page=1");
		$(".page-link").click(function(){
			var id = $(this).attr("data-id");
			var select_id = $(this).parent().attr("id");
            const itemDiv = document.getElementById("#item_div");
			$.ajax({
				url: "php/pagination.php",
				type: "GET",
				data: {
					page : id
				},
				cache: false,
				success: function(dataResult){
					$(".single-item-list").html(dataResult);
					$(".pageitem").removeClass("active");
					$("#"+select_id).addClass("active");
					
				}
			});
		});


    </script>
</body>

</html>