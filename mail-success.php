<?php include_once  "include/head.php" ?>

<body>

    <div class="maill-success">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="success-content">
                        <h1>Congratulations!</h1>
                        <h2>Your Mail Sent Successfully</h2>
                        <p>Thanks for contacting with us, We will get back to you asap.</p>
                        <div class="button">
                            <a href="index.html" class="btn">Go To Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script>
        window.onload = function() {
            window.setTimeout(fadeout, 500);
        }

        function fadeout() {
            document.querySelector('.preloader').style.opacity = '0';
            document.querySelector('.preloader').style.display = 'none';
        }
    </script>
</body>

</html>