<?php
	require_once('connection.php');
	session_start();
	if($_SESSION['user_id'] == ''){
		header('Location: login.php');
		exit();
	}
	$user_id = $_SESSION['user_id'];
	if (isset($_POST['submit'])){
		$current = $_POST['current']; 
		$new = $_POST['new'];
		$confirm = $_POST['confirm'];
		
		$result = mysqli_query($con,"SELECT * FROM tbl_user_master WHERE user_id = '$user_id' AND password = '$current'");
		if(mysqli_num_rows($result)>0){
			if($new == $confirm){
				$upadate = mysqli_query($con,"UPDATE tbl_user_master SET password = '$new'");
				//echo "Password Changed...";
				header('Location: my_profile.php');
				exit();
			}else{
				echo "New Password & Confirm Password Are Not Matched.!!!!!!";
			}
		}else{
			echo "Wrong Current Password.!!!!";
		}
	}
	


?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="asset/style.css" />
	<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta charset="utf-8" />
</head>
<body>

<section>
 	<div class="container-fluid" style="background-image:linear-gradient(to left,#03001e,#7303c0,#ec38bc,#fdeff9); margin-top:5px; margin-bottom:5px;">
		<div class="row">
			<div class="col-lg-3" align="center"><button style="margin-top: 8px;" class="btn btn-primary badge-pill"><a href="my_profile.php" style="text-decoration: none; color:#fff;">Profile</a></button></div>
			<div class="col-lg-6">
				<h3 style=" margin-top:10px; margin-bottom:10px; color:#fff;" align="center">Change Password</h3>	
			</div>
			<div class="col-lg-3" align="center"><button style="margin-top: 7px;" class="btn btn-primary badge-pill"><a href="logout.php" style="text-decoration: none; color:#fff;">Logout</a></button></div>
		</div>
	</div>
</section>


<section style="margin-bottom: 8%; margin-top: 20px;">
	<div class="container">
		<form action="change_password.php" method="post" enctype="multipart/form-data">
			<div class="row form-group">
				<div class="col-lg-6 form-group">
					<label style="font-size: 22px;">Current Password :</label>
					<input type="password" class="form-control" name="current" id="current" placeholder="Current Password" required />
				</div>
				<div class="col-lg-6">
					<label style="font-size: 22px;">New Password :</label>
					<input type="password" class="form-control" name="new" id="new" placeholder="New Password" required />
				</div>
			</div>
			<div class="row form-group">
				<div class="col-lg-6 form-group">
					<label style="font-size: 22px;">Confirm Password :</label>
					<input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirm Password" required />
				</div>
				<div class="col-lg-6">
					<!--<input type="submit" class="form-control btn btn-success" style="margin-top: 40px;" name="Change" id="Change" placeholder="Change" required />-->
					<button type="submit" name="submit" id="submit" class="btn btn-success form-control" style="margin-top: 40px;">Change</button>
				</div>
			</div>
		</form>
	</div>
</section>











<?php require_once('footer.php'); ?>
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>
</html>