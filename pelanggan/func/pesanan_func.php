<?php 

	include '../config/connect.php';

	$action  = $_GET['action'];

	if ($action == "insert") {
		
		$id_pesanan		= 'PES'.rand();
		$id_pelanggan	= $_POST['id_pelanggan'];
		$id_barang 		= $_POST['id_barang'];
		$jum_dibeli 	= $_POST['jum_dibeli'];
		$harga_barang 	= $_POST['harga_barang'];

		$dt = mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_barang = $id_barang AND id_pelanggan = $id_pelanggan");
        $d  = mysqli_fetch_array($dt);

		$dt1 = mysqli_query($mysqli, "SELECT * FROM tb_barang WHERE id_barang = $id_barang");
        $d1  = mysqli_fetch_array($dt1);

		if ($d1['stok'] < $jum_dibeli) {

			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-in-pes2" </script>';

		} else {
			if (isset($d['jum_dibeli'])) {
				$jum_ker = $d['jum_dibeli'];
			} else {
				$jum_ker = 0;
			}
			
	        $sisa_stok	= $d1['stok'] - $jum_dibeli;
	        $up_pesanan = $jum_ker + $jum_dibeli;
			$total_harga = $harga_barang * $up_pesanan;

			if (isset($d)) {

				$result = mysqli_query($mysqli, "UPDATE pesanan SET jum_dibeli = '$up_pesanan', total_harga = '$total_harga' WHERE id_barang = '$id_barang' AND id_pelanggan = '$id_pelanggan'") or die(mysqli_error($mysqli));

				$result1= mysqli_query($mysqli, "UPDATE tb_barang SET stok = '$sisa_stok' WHERE id_barang = '$id_barang'") 
											or die(mysqli_error($mysqli));

			} else {

				$result = mysqli_query($mysqli, "INSERT INTO pesanan (id_pesanan, id_pelanggan, id_barang, jum_dibeli, total_harga, tgl_pesan) 
										 VALUES('$id_pesanan', '$id_pelanggan', '$id_barang', '$jum_dibeli', '$total_harga', NOW())") or die(mysqli_error($mysqli));

				$result1= mysqli_query($mysqli, "UPDATE tb_barang SET stok = '$sisa_stok' WHERE id_barang = '$id_barang'") 
											or die(mysqli_error($mysqli));

			}
		}

		if ($result) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-in-pes" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-in-pes" </script>';
		}
		
	} elseif($action == "delete-ker") {

		$id_pesanan = $_GET['id_pesanan'];
		$id_barang  = $_GET['id_barang'];

		$dt = mysqli_query($mysqli, "SELECT * FROM tb_barang WHERE id_barang = $id_barang");
        $d  = mysqli_fetch_array($dt);

        $dt1 = mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
        $d1  = mysqli_fetch_array($dt1);

        $stok = $d['stok'] + $d1['jum_dibeli'];

		$result = mysqli_query($mysqli, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'") or die(mysqli_error($mysqli));
		$result1 = mysqli_query($mysqli, "UPDATE tb_barang SET stok = '$stok' WHERE id_barang = '$id_barang'") or die(mysqli_error($mysqli));

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=timeout-ker" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=imeout-fal" </script>';
		}

	} elseif($action == "delete") {

		$id_pesanan = $_GET['id_pesanan'];
		$id_barang  = $_GET['id_barang'];

		$dt = mysqli_query($mysqli, "SELECT * FROM tb_barang WHERE id_barang = $id_barang");
        $d  = mysqli_fetch_array($dt);

        $dt1 = mysqli_query($mysqli, "SELECT * FROM pesanan WHERE id_pesanan = '$id_pesanan'");
        $d1  = mysqli_fetch_array($dt1);

        $stok = $d['stok'] + $d1['jum_dibeli'];

		$result = mysqli_query($mysqli, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'") or die(mysqli_error($mysqli));
		$result1 = mysqli_query($mysqli, "UPDATE tb_barang SET stok = '$stok' WHERE id_barang = '$id_barang'") or die(mysqli_error($mysqli));

		if ($result && $result1) {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=suc-del-pes" </script>';
		} else {
			echo '<script language="javascript"> window.location.href = "../index.php?desc=fal-del-pes" </script>';
		}

	}

?>