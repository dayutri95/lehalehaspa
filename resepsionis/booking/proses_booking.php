<?php
		include "../config.php";
		$jam=$_POST['jam']*60;
		$check_in=$jam+$_POST['mnt'];
		$check_out=$check_in+$_POST['lama'];
		session_start();
		$tampil = mysqli_query($connect,"SELECT kd_user FROM user WHERE username='$_SESSION[nama]'")or die(mysqli_error($connect));
		$data=mysqli_fetch_array($tampil);
		$kd_user=$data['kd_user'];
		$input=mysqli_query($connect,"UPDATE booking SET total='$_POST[total]',check_in='$check_in',check_out='$check_out',status_book='$_POST[status_book]', diskon= '$_POST[diskon]',kd_therapist='$_POST[kd_therapist]',kd_user='$kd_user' where kd_booking='$_POST[kd_booking]' ")or die(mysqli_error($connect));
		

		header("Location:index.php");
		
?>