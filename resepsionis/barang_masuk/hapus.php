<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_terima    = $_GET['kd_terima'];

$hapus = "DELETE FROM barang_masuk WHERE kd_terima='$kd_terima'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Barang Masuk Gagal";
}
?>
