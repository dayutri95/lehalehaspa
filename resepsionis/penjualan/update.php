<?php
include '../config.php'; 
// ambil variabel yang dikirim dari form
$kd_treatment = $_POST['kd_treatment'];
$nama_treatment = $_POST['nama_treatment'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

$update = "UPDATE treatment SET kd_treatment='$kd_treatment', nama_treatment='$nama_treatment', harga='$harga', kd_kategori='$kategori'	WHERE kd_treatment='$kd_treatment'";
$hasil  = mysqli_query($connect, $update);

// apabila query untuk mengupdate data benar
if ($hasil){ 
	// lakukan redirect
	header("location:index.php");
}
else{
  echo "Update Data Treatment Gagal";
}
?>
