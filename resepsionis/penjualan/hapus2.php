<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_detail_penjualan    = $_GET['kd_detail_penjualan'];
$tampil = mysqli_query($connect,"SELECT * FROM detail_penjualan WHERE kd_detail_penjualan=$kd_detail_penjualan");
$data=mysqli_fetch_array($tampil);
$del = "DELETE FROM detail_penjualan WHERE kd_detail_penjualan='$kd_detail_penjualan'";
$hasil = mysqli_query($connect, $del);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	
	header("location:tambah.php?kd_penjualan=$data[kd_penjualan]");
}
else{
  echo "Hapus Data Detail Penjualan Gagal";
}
?>
