<?php
$konek = mysqli_connect("localhost","root","","dbspa");

// ambil variabel yang dikirim dari form
$kd_produk = $_POST['kd_produk'];
$nama_produk = $_POST['nama_produk'];
$satuan = $_POST['satuan'];
$kd_suplier=$_POST['kd_suplier'];

$update = "UPDATE produk SET kd_produk='$kd_produk', nama_produk='$nama_produk', satuan='$satuan', kd_suplier='$kd_suplier' WHERE kd_produk='$kd_produk'";
$hasil  = mysqli_query($konek, $update);

// apabila query untuk mengupdate data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil diubah!');window.location = 'index.php';</script>";
}
else{
  echo "Update Data Produk Gagal";
}
?>
