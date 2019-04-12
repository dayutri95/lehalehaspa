<?php
include '../config.php'; 
// ambil variabel yang dikirim dari form
$kd_treatment = $_POST['kd_treatment'];
$nama_treatment = $_POST['nama_treatment'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$jam = $_POST['jam']*60;
$lama = $jam+$_POST['mnt'];

$update = "UPDATE treatment SET kd_treatment='$kd_treatment', nama_treatment='$nama_treatment', harga='$harga', lama='$lama', kd_kategori='$kategori'	WHERE kd_treatment='$kd_treatment'";
$hasil  = mysqli_query($connect, $update);

// apabila query untuk mengupdate data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil diubah!');window.location = 'index.php';</script>";
}
else{
  echo "Update Data Treatment Gagal";
}
?>
