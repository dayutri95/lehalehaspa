<?php
// koneksi ke database
include '../config.php';

// ambil variabel yang dikirim dari form
$kd_user  = $_POST['kd_user'];
$nama_user  = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$telepon =$_POST['telepon'];
$alamat =$_POST['alamat'];
$hak_akses =$_POST['hak_akses'];
$status=$_POST['status'];
	$input = "INSERT INTO user(kd_user,nama_user,username,password,telepon,alamat,hak_akses,status) VALUES('$kd_user','$nama_user','$username','$password','$telepon','$alamat','$hak_akses','$status')";
	$hasil = mysqli_query($connect, $input);

// apabila query untuk menginput data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
}
else{
  echo "Input Data User Gagal";
}
?>
