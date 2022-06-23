<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if($action == "update") {

		$id_checkout 	= $_POST['id_checkout'];
		$status_pesanan = $_POST['status_pesanan'];

		$result = mysqli_query($mysqli, "UPDATE check_out
			  									SET 
			  									   status_pesanan = '$status_pesanan'
			  									   WHERE id_checkout = '$id_checkout'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-cko" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-cko" </script>';
		}

	}

?>