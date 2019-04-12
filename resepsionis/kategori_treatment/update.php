<?php
include '../config.php';
$kd=$_POST['kd_kategori'];
$nama=$_POST['nama_kategori'];
$update = "UPDATE kategori_treatment SET kd_kategori='$kd', nama_kategori='$nama' WHERE kd_kategori='$kd'";
$hasil  = mysqli_query($connect, $update);
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil diubah!');window.location = 'index.php';</script>";
}
else{
  echo "Update Data Kategori Treatment Gagal";
}
?>
?>