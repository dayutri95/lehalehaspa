<?php
include '../config.php';
// ambil variabel yang dikirim dari form
$kd_therapist = $_POST['kd_therapist'];
$nama_therapist = $_POST['nama_therapist'];
$no_ktp = $_POST['no_ktp'];
$telp_therapist = $_POST['telp_therapist'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

$update = "UPDATE therapist SET kd_therapist='$kd_therapist', nama_therapist='$nama_therapist', no_ktp='$no_ktp', telp_therapist='$telp_therapist', jenis_kelamin='$jenis_kelamin', alamat='$alamat'	WHERE kd_therapist='$kd_therapist'";
$hasil  = mysqli_query($connect, $update);

// apabila query untuk mengupdate data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil diubah!');window.location = 'index.php';</script>";
}
else{
  echo "Update Data Therapist Gagal";
}
?>
