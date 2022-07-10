<?php
$active = "Job";
require_once('connection.php');
session_start();
if ($_SESSION['user_id'] == '') {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];
}
if (isset($_POST['submit'])) {
    $job_id = $_POST['job_id'];
    $job = $_POST['job'];
    $compony = $_POST['compony'];
    $salary = $_POST['salary'];
    $experience = $_POST['experience'];
    $skill = $_POST['skill'];
    $education = $_POST['education'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $update = "UPDATE tbl_job_master SET job_name = '$job', job_compony = '$compony',salary = '$salary',experience = '$experience',skill = '$skill',education = '$education',start_date = '$start_date',end_date = '$end_date'
		WHERE job_id = '$job_id'";


    if (mysqli_query($con, $update)) {
        $_SESSION['update'] = "Job Updated Successfully";
        header('Location: job_list1.php');
        exit();
    } else {
        $_SESSION['unupdate'] = "Job Not Updated Please Try Again...!!!";
        header('Location: job_list1.php');
        exit();
    }
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Edit Job-Job Portal </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mystyle.css">
</head>

<body>
    <!-- Preloader Start ->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <! Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparrent">
            <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo1.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="job_list1.php">Job List</a></li>
                                            <!-- <li><a href="about.html">About</a></li -->
                                            <!-- <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                    <!-- <li><a href="elements.html">Elements</a></li> 
                                                    <li><a href="job_details.html">job Details</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- <li><a href="contact.html">Contact</a></li> -->
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    <!-- <a href="registration.php" class="btn head-btn1">Register</a> -->
                                    <a href="logout.php" class="btn head-btn2">Logout</a>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>

        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Edit your job</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-xl-8 ">
                            <!-- form -->
                            <form action="job_list1.php" method="post" enctype="multipart/form-data" class="search-box">
                                <!-- <div class="input-form">
                                    <input type="text" name="quiry" id="quiry" placeholder="Job Tittle or keyword">
                                    <button type="submit" value="search" name="search" class="btn btn-info btn-lg btn-block">Search</button>
                                </div> --
                                <div class="input-group">
                                    <input type="search" class="form-control rounded" name="quiry" id="quiry" placeholder="Job Tittle or keyword" style="height: 55px;" />
                                    <button type="submmit" name="search" value="search" class="btn btn-outline-primary">search</button>
                                </div>
                                <!-<div class="select-form">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">Location BD</option>
                                                <option value="">Location PK</option>
                                                <option value="">Location US</option>
                                                <option value="">Location UK</option>
                                            </select>
                                        </div>
                                    </div>-->
                                <!-- <div class="search-form">
                                    <!- <a href="#">Find job</a> --

                                    <button type="submit" value="search" name="search" class="btn btn-info btn-lg btn-block">Search</button>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured_job_start -->
        <?php
        $result = mysqli_query($con, "SELECT * FROM tbl_job_master WHERE job_id = '$job_id' AND user_id = '$user_id'");
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

        ?>

                <section style="margin-bottom: 5%; margin-top: 40px;">
                    <div class="container">
                        <form action="edit_job.php" method="post" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col-lg-12 form-group">
                                    <input type="hidden" class="form-control" name="job_id" value="<?= $row['job_id']; ?>" placeholder="Job ID" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 form-group">
                                    <label style="font-size: 22px;">Job Name :</label>
                                    <input type="text" class="form-control" name="job" value="<?= $row['job_name']; ?>" placeholder="Job Name" required />
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-size: 22px;">Compony Name :</label>
                                    <input type="text" class="form-control" name="compony" value="<?= $row['job_compony']; ?>" placeholder="Compony Name" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 form-group">
                                    <label style="font-size: 22px;">Salary :</label>
                                    <input type="text" class="form-control" name="salary" value="<?= $row['salary']; ?>" placeholder="Salary" pattern="[0-9]{6-7}" required />
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-size: 22px;">Experience :</label>
                                    <input type="text" class="form-control" name="experience" value="<?= $row['experience']; ?>" placeholder="Experience" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 form-group">
                                    <label style="font-size: 22px;">Skill :</label>
                                    <input type="text" class="form-control" name="skill" value="<?= $row['skill']; ?>" placeholder="Skill" required />
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-size: 22px;">Education :</label>
                                    <input type="text" class="form-control" name="education" value="<?= $row['education']; ?>" placeholder="Education" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6 form-group">
                                    <label style="font-size: 22px;">Apply From Date :</label>
                                    <input type="date" class="form-control" name="start_date" value="<?= $row['start_date']; ?>" required />
                                </div>
                                <div class="col-lg-6">
                                    <label style="font-size: 22px;">Apply Upto Date :</label>
                                    <input type="date" class="form-control" name="end_date" value="<?= $row['end_date']; ?>" required />
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    <button type="submit" class="form-control btn btn-primary" style="margin-top: 40px;" name="submit" id="submit" placeholder="Submit" required>Submit</button>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        </form>
                <?php
            }
        } else {
            header('Location: job_list.php');
            exit();
        }
                ?>
                    </div>
                </section>
                <!-- Featured_job_end -->



    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <div class="footer-tittle">
                                    <h4>About Us</h4>
                                    <div class="footer-pera">
                                        <p>Heaven frucvitful doesn't cover lesser dvsays appear creeping seasons so
                                            behold.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address :Your address goes
                                            here, your demo address.</p>
                                    </li>
                                    <li><a href="#">Phone : +8880 44338899</a></li>
                                    <li><a href="#">Email : info@mail.com</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Important Link</h4>
                                <ul>
                                    <li><a href="#"> View Project</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Proparties</a></li>
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <div class="footer-pera footer-pera2">
                                    <p>Heaven fruitful doesn't over lesser in days. Appear creeping.</p>
                                </div>
                                <!-- Form --
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm"><img src="assets/img/icon/form.png" alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
                <!--  -->
                <div class="row footer-wejed justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <!-- logo -->
                        <div class="footer-logo mb-20">
                            <a href="index.html"><img src="assets/img/logo/logo_blk-removebg-preview.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>5000+</span>
                            <p>Students Placed</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>451</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <!-- Footer Bottom Tittle --
                        <div class="footer-tittle-bottom">
                            <span>568</span>
                            <p>Talented Hunter</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <div class="footer-copy-right">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved |
                                    by <a href="#" target="_blank">Job Portal</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2">
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/price_rangs.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>