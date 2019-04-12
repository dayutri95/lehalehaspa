<?php
		include "../config.php";
		$input=mysqli_query($connect,"UPDATE penjualan SET total='$_POST[total]' where kd_penjualan='$_POST[kd_penjualan]' ")or die(mysqli_error($connect));
		

		echo "<script>alert('Data berhasil ditambahkan!');window.location = 'index.php'</script>";
		
?>