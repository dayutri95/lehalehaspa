<?php
include '../config.php';
// ambil variabel yang dikirim dari form
$kd_user = $_POST['kd_user'];
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$telepon = $_POST['telepon'];
$alamat =$_POST['alamat'];
$hak_akses = $_POST['hak_akses'];
$status = $_POST['status'];

$update = "UPDATE user SET kd_user='$kd_user',nama_user='$nama_user',username='$username',password='$password',telepon='$telepon',alamat='$alamat',hak_akses='$hak_akses',status='$status'	WHERE kd_user='$kd_user'";
$hasil  = mysqli_query($connect, $update);

// apabila query untuk mengupdate data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil diubah!');window.location = 'index.php';</script>";
}
else{
  echo "Update Data User Gagal";
}
?>
