<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_kategori    = $_GET['kd_kategori'];

$hapus = "DELETE FROM kategori_treatment WHERE kd_kategori='$kd_kategori'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Kategori Gagal";
}
?>
