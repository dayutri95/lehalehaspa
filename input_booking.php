<?php
		include "config.php";
		$carikode = mysqli_query($connect,"SELECT MAX(kd_detail_booking) FROM detail_booking");
		$datakode = mysqli_fetch_array($carikode);

		$nomor = intval(substr($datakode[0],2));

		$tambah = $nomor + 1;
		$kode = sprintf("DB%03d", $tambah);
		
		
		$tgl_booking=$_POST['tgl_booking'];
		//$format=date('Y-m-d', strtotime($tgl_booking));
		$in=mysqli_query($connect,"INSERT IGNORE INTO booking SET kd_booking ='$_POST[kd_booking]',kd_pelanggan='$_POST[kd_pelanggan]',tgl_booking='$tgl_booking'")or die(mysqli_error($connect));
		$input=mysqli_query($connect,"INSERT INTO detail_booking SET kd_detail_booking='$kode',kd_booking='$_POST[kd_booking]',kd_treatment ='$_POST[kd_treatment]',harga='$_POST[harga]',serv='$_POST[serv]',tax='$_POST[tax]',subtotal='$_POST[subtotal]'")or die(mysqli_error($connect));
		

		header("Location:booking.php?kd_booking=$_POST[kd_booking]&tgl_booking=$_POST[tgl_booking]&kd_pelanggan=$_POST[kd_pelanggan]");
		
?>