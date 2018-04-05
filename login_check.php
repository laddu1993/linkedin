<?php

	session_start();
	include('config.php');


	$method = $_POST;
	if (isset($method['submit']) && !empty($method['submit'])) { 	
		
		$login = $method['email'];
		$password = $method['password'];

		$fetch = mysqli_query($con, "select * from registers where register_email = '$login' AND register_password = '$password'");
		if (mysqli_num_rows($fetch) > 0) {
			while ($row = mysqli_fetch_assoc($fetch)) {
				$user_details = $row;
			}
			if (!empty($user_details)) {
				session_start();
				$_SESSION['user_id'] = $user_details['register_id'];
				$_SESSION['username'] = $user_details['register_name'];
				header("location: welcome.php");
				exit();
			}

		}else{
			header("location:index.php?msg_invalid='Invalid login credentials!'");
			exit();
		}
	
	}

?>