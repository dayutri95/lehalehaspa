<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_treatment    = $_GET['kd_treatment'];

$hapus = "DELETE FROM treatment WHERE kd_treatment='$kd_treatment'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Treatment Gagal";
}
?>
