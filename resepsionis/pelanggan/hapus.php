<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_pelanggan    = $_GET['kd_pelanggan'];

$hapus = "DELETE FROM pelanggan WHERE kd_pelanggan='$kd_pelanggan'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Pelanggan Gagal";
}
?>
