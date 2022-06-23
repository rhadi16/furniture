<?php 
	include 'admin/config/connect.php';
	session_start();

	$email = $_POST['email'];
	$pass  = $_POST['password'];
	$oten  = $_POST['oten'];

	if ($oten == "admin") {

		$query = "SELECT * FROM admin WHERE email = '$email'";
		$result = $mysqli->query($query);
		$cek_data = $result->fetch_assoc();

		$cek_pass = password_verify($pass, $cek_data["password"]);

		if ($cek_pass) {
			$_SESSION['oten'] = $oten;
			$_SESSION['user'] = $cek_data["id_admin"];
			echo '<script language="javascript"> window.location.href = "admin/index.php" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "index.php?desc=failed-log" </script>';
		}

	} 

	if ($oten == "pelanggan") {

		$query = "SELECT * FROM pelanggan WHERE email = '$email'";
		$result = $mysqli->query($query);
		$cek_data = $result->fetch_assoc();

		$cek_pass = password_verify($pass, $cek_data["password"]);

		if ($cek_pass) {
			$_SESSION['oten'] = $oten;
			$_SESSION['user'] = $cek_data["id_pelanggan"];
			echo '<script language="javascript"> window.location.href = "pelanggan/index.php" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "index.php?desc=failed-log" </script>';
		}

	}
	
?>