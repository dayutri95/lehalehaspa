<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_detail_booking    = $_GET['kd_detail_booking'];

$hapus = "DELETE FROM detail_booking WHERE kd_detail_booking='$kd_detail_booking'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Detail Booking Gagal";
}
?>
