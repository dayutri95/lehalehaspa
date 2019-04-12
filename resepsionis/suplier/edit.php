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
  <title>Leha-leha Spa | Data Suplier</title>
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
            <h1>Data suplier</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit suplier</h3>
      </div>
              <!-- /.card-header -->
              <!-- form start -->
  <?php
  $kd_suplier    = $_GET['kd_suplier'];
  $edit  = "SELECT * FROM suplier WHERE kd_suplier='$kd_suplier'";
  $hasil = mysqli_query($connect, $edit);
  $data  = mysqli_fetch_array($hasil);

  echo"<form action=\"update.php\" method=\"post\" name=\"form\" onsubmit=\"return suplier()\">
        <div class=\"card-body\">
          <div class=\"form-group\">
            <label for=\"kd_suplier\">Kode suplier</label>
            <input type=\"text\" class=\"form-control\" name=\"kd_suplier\" value=\"$data[kd_suplier]\"></td></tr>
          </div>
          <div class=\"form-group\">
            <label for=\"nama_suplier\">Nama suplier</label>
            <input type=\"text\" class=\"form-control\" name=\"nama_suplier\" value=\"$data[nama_suplier]\">
          </div>
          <div class=\"form-group\">
            <label for=\"telp_suplier\">Telepon</label>
            <input type=\"text\" class=\"form-control\" name=\"telp_suplier\" value=\"$data[telp_suplier]\">
          </div>
          <div class=\"form-group\">
            <label for=\"alamat\">Alamat</label>
            <input type=\"text\" class=\"form-control\" name=\"alamat\" value=\"$data[alamat]\">
          </div>
          <div class=\"form-group\">
            <label for=\"npwp\">NPWP</label>
            <input type=\"text\" class=\"form-control\" name=\"npwp\" value=\"$data[npwp]\">
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
