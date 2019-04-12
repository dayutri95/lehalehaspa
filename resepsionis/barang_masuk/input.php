<?php
// koneksi ke database
include '../config.php';
// ambil variabel yang dikirim dari form
$kd_terima  = $_POST['kd_terima'];
$tgl_terima = $_POST['tgl_terima'];
$kd_produk = $_POST['kd_produk'];
$harga_beli=$_POST['harga_beli'];
$jumlah=$_POST['jumlah'];
$stok=$_POST['stok'];
$akhir=$_POST['akhir'];
$subtotal=$_POST['subtotal'];
$jual=$_POST['jual'];
$format = date('Y-m-d', strtotime($tgl_terima));
if($_POST['tgl_kadaluarsa'] !=''){
$tgl_kadaluarsa=$_POST['tgl_kadaluarsa'];
}else{
	$tgl_kadaluarsa='';
}
session_start();

$tampil = mysqli_query($connect,"SELECT kd_user FROM user WHERE username='$_SESSION[nama]'")or die(mysqli_error($connect));
$data=mysqli_fetch_array($tampil);
$kd_user=$data['kd_user'];
	$hasil = mysqli_query($connect, "INSERT INTO barang_masuk(kd_terima,tgl_terima,kd_produk,harga_beli,jumlah,stok_awal,stok_akhir,tgl_kadaluarsa,subtotal,kd_user) VALUES('$kd_terima','$format','$kd_produk','$harga_beli','$jumlah','$stok','$akhir','$tgl_kadaluarsa','$subtotal','$kd_user')")or die(mysqli_error($connect));
	$hasil2 = mysqli_query($connect, "UPDATE produk SET stok='$akhir',harga_jual='$jual' WHERE kd_produk='$kd_produk'")or die(mysqli_error($connect));
// apabila query untuk menginput data benar
if ($hasil && $hasil2){ 
	// lakukan redirect
	
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
	
}
else{
  echo "Input Data Barang Masuk Gagal";
}
?>
