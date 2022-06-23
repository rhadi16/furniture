<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$email 		= $_POST['email'];
		$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
		$nama_admin = $_POST['nama_admin'];

		$result = mysqli_query($mysqli, "INSERT INTO admin (id_admin, email, password, nama_admin) 
										 VALUES(null, '$email', '$password', '$nama_admin')") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-in-adm" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-in-adm" </script>';
		}
		
	} elseif($action == "update") {

		$id_admin 		= $_POST['id_admin'];
		$email 			= $_POST['email'];
		if ($_POST['password'] == '') {
			$password  = $_POST['password_lama'];
		} else {
			$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
		}
		$nama_admin 	= $_POST['nama_admin'];

		$result = mysqli_query($mysqli, "UPDATE admin
			  									SET 
			  									   email 		= '$email',
			  									   password 	= '$password',
			  									   nama_admin 	= '$nama_admin'
			  									   WHERE id_admin = '$id_admin'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-adm" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-adm" </script>';
		}

	} elseif($action == "delete") {

		$id_admin = $_GET['id_admin'];

		$result = mysqli_query($mysqli, "DELETE FROM admin WHERE id_admin = '$id_admin'") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-del-adm" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-del-adm" </script>';
		}

	}

?>