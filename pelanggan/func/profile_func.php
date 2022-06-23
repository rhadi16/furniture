<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if($action == "update") {

		$id_pelanggan 	= $_POST['id_pelanggan'];
		$email 			= $_POST['email'];
		if ($_POST['password'] == '') {
			$password  = $_POST['password_lama'];
		} else {
			$password 	= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
		}
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$no_hp 			= $_POST['no_hp'];
		$asal_kota 		= $_POST['asal_kota'];
		$alamat 		= $_POST['alamat'];

		$result = mysqli_query($mysqli, "UPDATE pelanggan
			  									SET 
			  									   email 			= '$email',
			  									   password 		= '$password',
			  									   nama_pelanggan	= '$nama_pelanggan',
			  									   no_hp			= '$no_hp',
			  									   asal_kota		= '$asal_kota',
			  									   alamat			= '$alamat'
			  									   WHERE id_pelanggan = '$id_pelanggan'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-pro" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-pro" </script>';
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