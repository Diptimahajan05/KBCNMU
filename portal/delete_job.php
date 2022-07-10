<?php
	require_once('connection.php');
	session_start();
	if($_SESSION['user_id'] == '')
	{
		header('Location: login.php');
		exit();
	}
	$user_id = $_SESSION['user_id'];
	if (isset($_GET['job_id'])){
		$job_id = $_GET['job_id'];
		if(mysqli_query($con,"DELETE FROM tbl_job_master WHERE job_id = '$job_id'")>0){
			header('Location: job_list1.php');
			exit();
		}else{
			header('Location: job_list1.php');
			exit();
		}
	}
?>