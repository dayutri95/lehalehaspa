<?php
// koneksi ke database
include '../config.php';
// ambil variabel yang dikirim dari form
$kd_kategori  = $_POST['kd_kategori'];
$nama_kategori = $_POST['nama_kategori'];
	$input = "INSERT INTO kategori_treatment(kd_kategori,nama_kategori) VALUES('$kd_kategori','$nama_kategori')";
	$hasil = mysqli_query($connect, $input);

// apabila query untuk menginput data benar
if ($hasil){ 
	// lakukan redirect
	echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
}
else{
  echo "Input Data Kategori Gagal";
}
?>
