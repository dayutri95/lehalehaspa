<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_user    = $_GET['kd_user'];

$hapus = "DELETE FROM user WHERE kd_user='$kd_user'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data User Gagal";
}
?>
