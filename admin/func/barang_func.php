<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$nama_barang 	= $_POST['nama_barang'];
		$harga_barang	= $_POST['harga_barang'];
		$berat 			= $_POST['berat'];
		$desk_barang	= $_POST['desk_barang'];
		$stok 			= $_POST['stok'];
		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;

		// Set path folder tempat menyimpan gambarnya
		$path = "../foto_brg/".$foto;

		if (move_uploaded_file($tmp_file, $path)) {
			$result = mysqli_query($mysqli, "INSERT INTO tb_barang (id_barang, nama_barang, harga_barang, berat, desk_barang, stok, foto) 
											 VALUES(null, '$nama_barang', '$harga_barang', '$berat', '$desk_barang', '$stok', '$foto')") or die(mysqli_error($mysqli));

			if ($result) {
				echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-in-brg" </script>';
			} else {
				echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-in-brg" </script>';
			}
		}
		
	} elseif($action == "update") {

		$id_barang 			= $_POST['id_barang'];
		$nama_barang 		= $_POST['nama_barang'];
		$harga_barang		= $_POST['harga_barang'];
		$berat 				= $_POST['berat'];
		$desk_barang		= $_POST['desk_barang'];
		$stok 				= $_POST['stok'];
		$file_name_sebelum  = $_POST['file_name_sebelum'];

		// Ambil Data yang Dikirim dari Form
		$nama_file = $_FILES['file_name']['name'];
		$tmp_file  = $_FILES['file_name']['tmp_name'];

		$foto = rand().$nama_file;
		// Set path folder tempat menyimpan gambarnya
		$path = "../foto_brg/".$foto;

		if (move_uploaded_file($tmp_file, $path)) {
			$nfoto = $foto;
			unlink("../foto_brg/".$file_name_sebelum);
		} else {
			$nfoto = $file_name_sebelum;
		}

		$result = mysqli_query($mysqli, "UPDATE tb_barang
			  									SET 
			  									   nama_barang	= '$nama_barang',
			  									   harga_barang	= '$harga_barang',
			  									   berat		= '$berat',
			  									   desk_barang	= '$desk_barang',
			  									   stok			= '$stok',
			  									   foto			= '$nfoto'
			  									   WHERE id_barang = '$id_barang'
			  									") or die(mysqli_error($mysqli));

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-ed-brg" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-ed-brg" </script>';
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