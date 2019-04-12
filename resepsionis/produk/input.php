<?php
// koneksi ke database
include '../config.php';

// ambil variabel yang dikirim dari form
$kd_produk  = $_POST['kd_produk'];
$nama_produk = $_POST['nama_produk'];
$satuan =$_POST['satuan'];
$kd_suplier=$_POST['kd_suplier'];

$input = "INSERT INTO produk(kd_produk,nama_produk,satuan,kd_suplier) VALUES('$kd_produk','$nama_produk','$satuan','$kd_suplier')";
	$hasil = mysqli_query($connect, $input);
// apabila query untuk menginput data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
}
else{
  echo "Input Data Produk Gagal";
}
?>
