<?php
// koneksi ke database
$konek = mysqli_connect("localhost","root","","dbspa");

// ambil variabel yang dikirim dari form
$kd_treatment  = $_POST['kd_treatment'];
$nama_treatment = $_POST['nama_treatment'];
$harga = $_POST['harga'];
$kategori =$_POST['kategori'];
$jam = $_POST['jam']*60;
$lama = $jam+$_POST['mnt'];
	$input = "INSERT INTO treatment(kd_treatment,nama_treatment,harga,lama,kd_kategori) VALUES('$kd_treatment','$nama_treatment','$harga','$lama','$kategori')";
	$hasil = mysqli_query($konek, $input) or die(mysqli_error($konek));

// apabila query untuk menginput data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
}
else{
  echo "Input Data Treatment Gagal";
}
?>
