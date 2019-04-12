<?php
// koneksi ke database
$konek = mysqli_connect("localhost","root","","dbspa");

// ambil variabel yang dikirim dari form
$kd_suplier  = $_POST['kd_suplier'];
$nama_suplier = $_POST['nama_suplier'];
$telp_suplier = $_POST['telp_suplier'];
$alamat =$_POST['alamat'];
$npwp =$_POST['npwp'];
	$input = "INSERT INTO suplier(kd_suplier,nama_suplier,telp_suplier,alamat,npwp) VALUES('$kd_suplier','$nama_suplier','$telp_suplier','$alamat','$npwp')";
	$hasil = mysqli_query($konek, $input);

// apabila query untuk menginput data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
}
else{
  echo "Input Data Suplier Gagal";
}
?>
