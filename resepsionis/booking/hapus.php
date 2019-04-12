<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_booking    = $_GET['kd_booking'];

$del = "DELETE FROM detail_booking WHERE kd_booking='$kd_booking'";
$hapus = "DELETE FROM booking WHERE kd_booking='$kd_booking'";
$hasil = mysqli_query($connect, $del);
$hasil2=mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil && $hasil2){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data booking Gagal";
}
?>
