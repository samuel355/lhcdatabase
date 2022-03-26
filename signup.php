<?php include_once "include/head.php" ?>
<?php
    session_start();
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
                            <li><a href="#">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <section class="login registration section"  style="margin-top: 3rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">Registration</h4>
                        <form action="#" method="POST" class="signup-form">

                            <div class="form-group">
                                <label for="">
                                    <p style="display: none;" class="alert alert-danger text-center errorText"></p>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="">
                                    <p style="display: none;" class="alert alert-success text-center successText"></p>
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" id="fullname" name="fullname">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input name="re-password" type="password" id="re-password">
                            </div>
                            <div class="button">
                                <button id="signup-button" type="submit" class="btn signup-button">Register</button>
                            </div>
                        </form>
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

    <script>
        const form = document.querySelector(".signup-form"),
        signupButton = document.querySelector(".signup-button"),
        errorText = document.querySelector(".errorText"),
        successText = document.querySelector(".successText");

        form.onsubmit = (e) => {
            e.preventDefault();
        }

        signupButton.onclick = () =>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/signup.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data === "success") {
                            successText.style.display = "block";
                            successText.textContent = data;

                            setTimeout(function(){
                                $(".successText").fadeOut()
                            },3000)

                            location.href = "dashboard.php";
                        } else {
                            errorText.style.display = "block";
                            errorText.textContent = data;
                            setTimeout(function(){
                                $(".errorText").fadeOut()
                            },3000)
                        }
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }

    </script>
</body>

</html>