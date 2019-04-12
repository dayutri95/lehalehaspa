<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_penjualan    = $_GET['kd_penjualan'];

$del = "DELETE FROM detail_penjualan WHERE kd_penjualan='$kd_penjualan'";
$hapus = "DELETE FROM penjualan WHERE kd_penjualan='$kd_penjualan'";
$hasil = mysqli_query($connect, $del);
$hasil2=mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil && $hasil2){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data penjualan Gagal";
}
?>
