<?php
include '../config.php';
// ambil variabel yang dikirim dari form
$kd_suplier = $_POST['kd_suplier'];
$nama_suplier = $_POST['nama_suplier'];
$telp_suplier = $_POST['telp_suplier'];
$alamat = $_POST['alamat'];
$npwp = $_POST['npwp'];

$update = "UPDATE suplier SET kd_suplier='$kd_suplier', nama_suplier='$nama_suplier', telp_suplier='$telp_suplier', alamat='$alamat', npwp='$npwp'	WHERE kd_suplier='$kd_suplier'";
$hasil  = mysqli_query($connect, $update);

// apabila query untuk mengupdate data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil diubah!');window.location = 'index.php';</script>";
}
else{
  echo "Update Data Suplier Gagal";
}
?>
