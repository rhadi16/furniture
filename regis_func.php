<?php 
	include 'admin/config/connect.php';

	$email 			= $_POST['email'];
	$password 		= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
	$nama_pelanggan = $_POST['nama_pelanggan'];
	$no_hp 			= $_POST['no_hp'];
	$asal_kota 		= $_POST['asal_kota'];
	$alamat 		= $_POST['alamat'];

	$cek_data = mysqli_query($mysqli,"SELECT * FROM pelanggan WHERE email = '$email'");
	$jum_data = mysqli_num_rows($cek_data);

	if ($jum_data >= 1) {
		echo '<script language="javascript"> window.location.href = "registrasi.php?desc=failed-reg" </script>';
	} else {
		$result = mysqli_query($mysqli, "INSERT INTO pelanggan (id_pelanggan, email, password, nama_pelanggan, no_hp, asal_kota, alamat) 
										VALUES(null, '$email', '$password', '$nama_pelanggan', '$no_hp', '$asal_kota', '$alamat')") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "index.php?desc=success-reg" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "index.php?desc=failed-reg2" </script>';
		}
	}
?>