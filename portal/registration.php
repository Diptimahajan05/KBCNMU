<?php
$active = "Register";
require_once('connection.php');
session_start();
if (isset($_SESSION['user_id'])) {
  header('Location: job_list1.php');
  exit();
}
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $user = $_POST['user'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $compony = $_POST['compony'];
  $address = $_POST['address'];

  $image_name = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = "asset/img/user/" . $image_name;

  if (move_uploaded_file($image_tmp_name, $image_folder)) {
    //echo "image uploaded and Moved....";
  } else {
    echo "image not uploaded and not moved!!!!!!";
  }


  $insert = "INSERT INTO tbl_user_master (full_name,user_name,password,email,mobile,image,compony,address)
		VALUES ('$name','$user','$password','$email','$mobile','$image_name','$compony','$address')";
  if (mysqli_query($con, $insert)) {

    header("Location: login.php");
    exit();
  } else {
    echo '<div class="alert alert-danger" role="alert" align="center">';
    echo "User Not Registered.......";
    echo '</div>';
  }
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Registration-Job Portal </title>
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
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
              <form action="registration.php" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" name="name" id="name" placeholder="Full Name" required class="form-control form-control-lg" />
                      <label class="form-label" for="firstName">Full Name</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" name="user" id="user" placeholder="User Name" required class="form-control form-control-lg" />
                      <label class="form-label" for="username">User Name</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">

                    <div class="form-outline">
                      <input type="password" name="password" id="password" placeholder="Password" required class="form-control form-control-lg" />
                      <label class="form-label" for="password">password</label>
                    </div>

                    <!--<div class="form-outline datepicker w-100">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" required type="text" class="form-control form-control-lg" id="birthdayDate" />
                      <label for="birthdayDate" class="form-label">Birthday</label>
                    </div>-->

                  </div>
                  <div class="col-md-6 mb-4">

                    <div class="form-outline">
                      <input type="text" name="mobile" id="mobile" placeholder="Mobile"  pattern="[0-9]{10}" required class="form-control form-control-lg"  title="Please enter valid phone number" />
                      <label class="form-label" for="mobile">Mobile Number</label>
                    </div>

                    <!-- <h6 class="mb-2 pb-1">Gender: </h6>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="option1" checked />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="option2" />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="option3" />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div> -->

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="email" name="email" id="email" placeholder="Email" required class="form-control form-control-lg" />
                      <label class="form-label" for="emailAddress">Email</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="file" name="image" id="image" placeholder="Image" requiredclass="form-control form-control-lg" />
                      <label class="form-label" for="pic">Profile Picture</label>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="text" name="compony" id="compony" placeholder="Compony Name" required class="form-control form-control-lg" />
                      <label class="form-label" for="Compony">Compony</label>
                    </div>

                  </div>
                  <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                      <input type="text" name="address" id="address" placeholder="Address" required class="form-control form-control-lg" />
                      <label class="form-label" for="address">Address</label>
                    </div>

                  </div>
                </div>

                <!-- <div class="row">
                  <div class="col-12">

                    <select class="select form-control-lg">
                      <option value="1" disabled>Choose option</option>
                      <option value="2">Subject 1</option>
                      <option value="3">Subject 2</option>
                      <option value="4">Subject 3</option>
                    </select>
                    <label class="form-label select-label">Choose option</label>

                  </div>
                </div> -->

                <!-- <div class="mt-4 pt-2">
                  <input class="btn btn-primary btn-lg " type="submit" value="Submit" name="submit" id="submit" placeholder="Register" />
                </div> -->
                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-lg btn-block" type="submit" value="Submit" name="submit" id="submit">Register</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>