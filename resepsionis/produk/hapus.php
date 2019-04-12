<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_produk    = $_GET['kd_produk'];

$hapus = "DELETE FROM produk WHERE kd_produk='$kd_produk'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Admin Gagal";
}
?>
