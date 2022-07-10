<?php
	require_once('connection.php');
	session_start();
	if($_SESSION['user_id'] == '')
	{
		header('Location: login.php');
		exit();
	}
	$user_id = $_SESSION['user_id'];
	if (isset($_GET['app_id'])){
		$app_id = $_GET['app_id'];
		if(mysqli_query($con,"DELETE FROM tbl_applied_master WHERE app_id = '$app_id'")>0){
			header('Location: applied_job_user.php');
			exit();
		}else{
			header('Location: applied_job_user.php');
			exit();
		}
	}
?>