<?php
session_start();
if(isset($_POST['login'])){
 $user = $_POST['email'];
 $pass = $_POST['password'];
include 'config.php';
 
  if(mysqli_connect_errno()){
   echo "Koneksi Ke Server Gagal";
   exit();
  }

 $sql="select * from pelanggan where email='".$user."'AND password='".$pass."'";
    $result=mysqli_query($connect, $sql);
    $num_rows=mysqli_num_rows($result);
    $row=mysqli_fetch_row($result);
    if($num_rows>0){
        
        $_SESSION["email"]=$user;
        $_SESSION["password"]=$row['password'];
        $_SESSION['status'] = "login";
        $kd="";
        $tgl="";
       header("location:booking.php?kd_booking=$kd&tgl_booking=$tgl");
       
    } else {
        echo "<script>alert('Username atau Password Admin tidak benar !!!');</script>";
        echo "<script>location='login_p.php?pesan=gagal';</script>";
    }
}
?>