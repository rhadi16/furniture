<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$id_pesanan 	= $_POST['id_pesanan'];
		$id_checkout 	= "CKO".rand();
		$id_pelanggan 	= $_POST['id_pelanggan'];
		$kum_id_brg		= $_POST['id_barang'];
		$ongkir 		= $_POST['ongkir'];
		$total_harga 	= $_POST['total_harga'];
		$bayar_via		= $_POST['bayar_via'];
		$status_pesanan	= "Dikemas";
		$tgl_pesan 		= $_POST['tgl_pesan'];

		$id_barang= '';

		for ($i=0; $i < count($kum_id_brg); $i++) { 
			$id_barang .= $kum_id_brg[$i].'||';

			$result2 = mysqli_query($mysqli, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan[$i]'") or die(mysqli_error($mysqli));
		}

		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;

		// Set path folder tempat menyimpan gambarnya
		$path = "../bukti_tf/".$foto;

		if (move_uploaded_file($tmp_file, $path)) {
			$result = mysqli_query($mysqli, "INSERT INTO check_out (id_checkout, id_pelanggan, id_barang, ongkir, total_harga, bayar_via, foto_bukti_tf, status_pesanan, tgl_pesan) 
											 VALUES('$id_checkout', '$id_pelanggan', '$id_barang', '$ongkir', '$total_harga', '$bayar_via', '$foto', '$status_pesanan', '$tgl_pesan')") or die(mysqli_error($mysqli));

			if ($result) {
				echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-in-cko" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-in-cko" </script>';
			}
		}
		
	} elseif($action == "update") {

		$id_checkout 		= $_POST['id_checkout'];
		$file_name_sebelum  = $_POST['file_name_sebelum'];

		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;
		// Set path folder tempat menyimpan gambarnya
		$path = "../bukti_tf/".$foto;

		if (move_uploaded_file($tmp_file, $path)) {
			$nfoto = $foto;
			unlink("../bukti_tf/".$file_name_sebelum);
		} else {
			$nfoto = $file_name_sebelum;
		}

		$result = mysqli_query($mysqli, "UPDATE check_out
			  									SET 
			  									   foto_bukti_tf = '$nfoto'
			  									   WHERE id_checkout = '$id_checkout'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-cko" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-cko" </script>';
		}

	} elseif($action == "delete") {

		$id_barang = $_GET['id_barang'];
		$foto 	   = $_GET['foto'];

		$result = mysqli_query($mysqli, "DELETE FROM tb_barang WHERE id_barang = '$id_barang'") or die(mysqli_error($mysqli));

		if ($result) {
			$hapus_foto = unlink("../foto_brg/".$foto);
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-del-brg" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-del-brg" </script>';
		}

	}

?>