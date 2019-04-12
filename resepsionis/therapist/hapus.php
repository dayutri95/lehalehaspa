<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_therapist    = $_GET['kd_therapist'];

$hapus = "DELETE FROM therapist WHERE kd_therapist='$kd_therapist'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Therapist Gagal";
}
?>
