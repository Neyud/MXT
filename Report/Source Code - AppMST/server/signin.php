<?php
	include"connect.php";
	mysqli_set_charset($conn,'utf8');
	/** Array for JSON response*/
	$response = array();

		$username = $_POST['username'];
		$password = $_POST['password'];
		$sqlCheck = "SELECT * FROM khachhang WHERE username = '$username' AND password = '$password' ";
		$result = mysqli_query($conn,$sqlCheck);
		if (mysqli_num_rows($result) != 0) {	
			$row = mysqli_fetch_assoc($result);
				$response["success"] = 1;
				$response["message"] = "Đăng nhập thành công!";
				$response["user_name"] = $row['username'];
				$response["email"] = $row['email'];
				$response["password"] = $row['password'];
			} else {	
				$response["success"] = 0;
				$response["message"] = "Tài khoản không tồn tại. Thử lại!";
			}	
			/**Return json*/
		echo json_encode($response);
	
?>