<?php
session_start();
if(isset($_POST['login'])){
 $user = $_POST['username'];
 $pass = $_POST['password'];
include 'config.php';
 
  if(mysqli_connect_errno()){
   echo "Koneksi Ke Server Gagal";
   exit();
  }

 $sql="select * from user where username='".$user."'AND password='".$pass."' AND status='aktif'";
    $result=mysqli_query($connect, $sql);
    $data=mysqli_fetch_array($result);
    $hak_akses="$data[hak_akses]";
    $num_rows=mysqli_num_rows($result);
    $row=mysqli_fetch_row($result);
    if($num_rows>0){
        
        $_SESSION["nama"]=$user;
        $_SESSION["pass"]=$row['password'];
        $_SESSION['status'] = "login";
        

       header('location:'.$hak_akses);
       
    } else {
        echo "<script>alert('Username atau Password Admin tidak benar !!!');</script>";
        echo "<script>location='login.php?pesan=gagal';</script>";
    }
}
?>