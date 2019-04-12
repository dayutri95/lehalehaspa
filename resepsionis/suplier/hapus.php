<?php
include '../config.php';
// ambil id dari hasil klik link Hapus
$kd_suplier    = $_GET['kd_suplier'];

$hapus = "DELETE FROM suplier WHERE kd_suplier='$kd_suplier'";
$hasil = mysqli_query($connect, $hapus);

// apabila query untuk menghapus data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Hapus Data Suplier Gagal";
}
?>
