<?php
include '../config.php';
// ambil variabel yang dikirim dari form
$kd_pelanggan = $_POST['kd_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp_pelanggan = $_POST['telp_pelanggan'];
$email = $_POST['email'];
if ($_POST['status']!=''){
$status = $_POST['status'];
}else{
	$status='-';
}
$update = "UPDATE pelanggan SET kd_pelanggan='$kd_pelanggan', nama_pelanggan='$nama_pelanggan', jenis_kelamin='$jenis_kelamin', telp_pelanggan='$telp_pelanggan', email='$email', status='$status'	WHERE kd_pelanggan='$kd_pelanggan'";
$hasil  = mysqli_query($connect, $update);

// apabila query untuk mengupdate data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil diubah!');window.location = 'index.php';</script>";
}
else{
  echo "Update Data Produk Gagal";
}
?>
