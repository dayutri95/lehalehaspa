<?php
		include "config.php";
		$jam=$_POST['jam']*60;
		$check_in=$jam+$_POST['mnt'];
		$check_out=$check_in+$_POST['lama'];
		$jumlah=mysqli_query($connect,"SELECT count(*) as 'jumlah' FROM booking where check_in >= $check_in and check_in<=$check_out and tgl_booking='$_POST[tgl_booking]' OR check_out >= $check_in and check_out<=$check_out and tgl_booking='$_POST[tgl_booking]'")or die(mysqli_error($connect));
		$tes=mysqli_fetch_array($jumlah);
		if ($tes['jumlah'] >= 5){
			$jam=sprintf("%02d", $_POST['jam']);
			$mnt=sprintf("%02d", $_POST['mnt']);
			echo "<script>alert('Maaf Untuk Jam Booking $jam:$mnt Sudah Penuh');window.location ='booking.php?kd_booking=$_POST[kd_booking]&tgl_booking=$_POST[tgl_booking]&kd_pelanggan=$_POST[kd_pelanggan]'</script>";	
		}else{

		
		$input=mysqli_query($connect,"UPDATE booking SET total='$_POST[total]',check_in='$check_in',check_out='$check_out',status_book='booking', diskon= '$_POST[diskon]' where kd_booking='$_POST[kd_booking]' ")or die(mysqli_error($connect));
		
		echo "<script>alert('Data berhasil disimpan!');window.location = 'index.php'</script>";
		}
?>