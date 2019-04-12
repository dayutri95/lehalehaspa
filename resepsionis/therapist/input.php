<?php
// koneksi ke database
include '../config.php';
// ambil variabel yang dikirim dari form
$kd_therapist  = $_POST['kd_therapist'];
$nama_therapist = $_POST['nama_therapist'];
$no_ktp = $_POST['no_ktp'];
$telp_therapist = $_POST['telp_therapist'];
$jenis_kelamin =$_POST['jenis_kelamin'];
$alamat =$_POST['alamat'];
	$input = "INSERT INTO therapist(kd_therapist,nama_therapist,no_ktp,telp_therapist,jenis_kelamin,alamat) VALUES('$kd_therapist','$nama_therapist','$no_ktp',$telp_therapist,'$jenis_kelamin','$alamat')";
	$hasil = mysqli_query($connect, $input);

// apabila query untuk menginput data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
}
else{
  echo "Input Data Therpist Gagal";
}
?>
