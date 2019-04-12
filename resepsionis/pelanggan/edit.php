<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data pelanggan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include '../style2.php' ?>
  <!-- Font Awesome -->
  </head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include '../top.php' ?>
  <!-- Main Sidebar Container -->
  <?php include 'sidebar.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data pelanggan</h1>
          </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit pelanggan</h3>
      </div>
              <!-- /.card-header -->
              <!-- form start -->
  <?php
  $kd_pelanggan    = $_GET['kd_pelanggan'];
  $edit  = "SELECT * FROM pelanggan WHERE kd_pelanggan='$kd_pelanggan'";
  $hasil = mysqli_query($connect, $edit);
  $data  = mysqli_fetch_array($hasil);
  $jenis_kelamin=$data['jenis_kelamin'];
  $status=$data['status'];

  echo"<form action=\"update.php\" method=\"post\" name=\"form\" onsubmit=\"return pelanggan()\">
        <div class=\"card-body\">
          <div class=\"form-group\">
            <label for=\"kd_pelanggan\">Kode pelanggan</label>
            <input type=\"text\" class=\"form-control\" name=\"kd_pelanggan\" value=\"$data[kd_pelanggan]\" readonly=\"readonly\"></td></tr>
          </div>
          <div class=\"form-group\">
            <label for=\"nama_pelanggan\">Nama pelanggan</label>
            <input type=\"text\" class=\"form-control\" name=\"nama_pelanggan\" value=\"$data[nama_pelanggan]\">
          </div>
          <div class=\"form-group\">
            <label for=\"jenis_kelamin\">Jenis Kelamin</label>";
              echo"<lable><input type=\"radio\" name=\"jenis_kelamin\" class=\"minimal\" value=\"laki-laki\" style=\"margin-left:40px\" "; if($jenis_kelamin=="laki-laki"){echo"checked>";} echo"</lable>laki-laki 
              <lable><input type=\"radio\" name=\"jenis_kelamin\" class=\"minimal\" value=\"perempuan\" style=\"margin-left:20px\" "; if($jenis_kelamin=='perempuan'){echo " checked> ";} echo "</lable>perempuan 
          </div>
          <div class=\"form-group\">
            <label for=\"telp_pelanggan\">Telepon</label>
            <input type=\"text\" class=\"form-control\" name=\"telp_pelanggan\" value=\"$data[telp_pelanggan]\">
          </div>
          <div class=\"form-group\">
            <label for=\"email\">Email</label>
            <input type=\"text\" class=\"form-control\" name=\"email\" value=\"$data[email]\">
          </div>
          <div class=\"form-group\">
            <label for=\"status\">Status</label>
            <input type=\"checkbox\" name=\"status\" class=\"minimal-red\" value=\"member\" style=\"margin-left:55px\""; if($status=="member"){echo"checked=checked>";} echo" members
          </div>
        </div>
         <div class=\"card-footer\">
          <div class=\"modal-footer\">
            <a href=\"index.php\"><button type=\"button\" class=\"btn btn-danger pull-left\" data-dismiss=\"modal\">Tutup</button><a>
            <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
          </div>
        </div>
      </form>";?>
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include '../footer.php' ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
  <?php include '../jscript2.php' ?>

</body>
</html>
