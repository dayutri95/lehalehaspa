<?php
// koneksi ke database
include 'config.php';
// ambil variabel yang dikirim dari form
$kd_pelanggan  = $_POST['kd_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$telp_pelanggan = $_POST['telp_pelanggan'];
$email =$_POST['email'];
$book='';
$tgl='';

	$input = "INSERT INTO pelanggan(kd_pelanggan,nama_pelanggan,jenis_kelamin,telp_pelanggan,email,status) VALUES('$kd_pelanggan','$nama_pelanggan','$jenis_kelamin','$telp_pelanggan','$email','-')";
	$hasil = mysqli_query($connect, $input);

// apabila query untuk menginput data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'booking.php?kd_pelanggan=$kd_pelanggan&kd_booking=$book&tgl_booking=$tgl'</script>";

}
else{
  echo "Input Data Pelanggan Gagal";
}
?>
