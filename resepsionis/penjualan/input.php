<?php
		include "../config.php";
		$tgl_transaksi=$_POST['tgl_transaksi'];
		$format=date('Y-m-d', strtotime($tgl_transaksi));
		session_start();
		$tampil = mysqli_query($connect,"SELECT kd_user FROM user WHERE username='$_SESSION[nama]'")or die(mysqli_error($connect));
		$data=mysqli_fetch_array($tampil);
		$kd_user=$data['kd_user'];
		$in=mysqli_query($connect,"INSERT IGNORE INTO penjualan SET kd_penjualan ='$_POST[kd_penjualan]',tgl_transaksi='$format',kd_user='$kd_user'")or die(mysqli_error($connect));
		$input=mysqli_query($connect,"INSERT INTO detail_penjualan SET kd_penjualan='$_POST[kd_penjualan]',kd_produk ='$_POST[kd_produk]',harga='$_POST[harga]',qty='$_POST[qty]',subtotal='$_POST[subtotal]'")or die(mysqli_error($connect));
		$a=mysqli_query($connect,"SELECT qty FROM detail_penjualan WHERE kd_produk='$_POST[kd_produk]'")or die(mysqli_error($connect));
		$b=mysqli_fetch_array($a);
		$c=mysqli_query($connect,"SELECT stok FROM produk WHERE kd_produk='$_POST[kd_produk]'")or die(mysqli_error($connect));
		$d=mysqli_fetch_array($c);
		$hasil=$d['stok']-$b['qty'];
		$e=mysqli_query($connect,"UPDATE produk SET stok='$hasil' WHERE kd_produk='$_POST[kd_produk]'")or die(mysqli_error($connect));
		header("Location:tambah.php?kd_penjualan=$_POST[kd_penjualan]&tgl_transaksi=$_POST[tgl_transaksi]");
		
?>