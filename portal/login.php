<?php
$active = "Login";
require_once('connection.php');
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: job_list1.php');
  exit();
}

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $password = $_POST['password'];
  $result = mysqli_query($con, "SELECT * FROM tbl_user_master WHERE user_name = '$user' AND password = '$password'");
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION["user_id"] = $row['user_id'];
    $_SESSION["full_name"] = $row['full_name'];
    //echo $_SESSION["user_id"];
    //echo $_SESSION["full_name"];
    header('Location: job_list1.php');
    exit();
  } else {
    echo '<div class="alert alert-danger" role="alert" align="center">';
    echo "Incorrect User Id OR Password.......";
    echo '</div>';
  }
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login-Job Portal </title>
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
  <div class="px-5 ms-xl-4">
    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
    <span class="h1 fw-bold mb-0"><a href="index.php"><img src="assets/img/logo/logo1.png" alt=""></a></span>
  </div>
  <section class="vh-100 ml-5 mr-5">
    <div class="containers py-5 h-100 pl-5 pr-5">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-sm-6 text-black">

          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

            <form action="login.php" method="post" style="width: 23rem;">

              <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

              <div class="form-outline mb-4">
                <input type="text" class="form-control" name="user" id="user" placeholder="User Name" required class="form-control form-control-lg" />
                <label class="form-label" for="form2Example18" hidden>User Name</label>
              </div>

              <div class="form-outline mb-4">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required class="form-control form-control-lg" />
                <label class="form-label" for="form2Example28" hidden="true">Password</label>
              </div>

              <div class="pt-1 mb-4">
                <button class="btn btn-info btn-lg btn-block" type="submit" name="submit" id="submit">Login</button>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-muted" href="change_password.php">Forgot password?</a></p>
              <p>Don't have an account? <a href="registration.php" class="link-info">Register here</a></p>

            </form>

          </div>

        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="assets/img/login.jpg" alt="Login image" height="500" width="500" style="object-fit: cover; object-position: left;">
        </div>
      </div>
    </div>
  </section>
</body>

</html>