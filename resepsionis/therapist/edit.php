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
  <title>Leha-leha Spa | Data Therapist</title>
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
            <h1>Data therapist</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Therapist</h3>
      </div>
              <!-- /.card-header -->
              <!-- form start -->
  <?php
  $kd_therapist    = $_GET['kd_therapist'];
  $edit  = "SELECT * FROM therapist WHERE kd_therapist='$kd_therapist'";
  $hasil = mysqli_query($connect, $edit);
  $data  = mysqli_fetch_array($hasil);

  echo"<form action=\"update.php\" method=\"post\" name=\"form\" onsubmit=\"return therapist()\">
        <div class=\"card-body\">
          <div class=\"form-group\">
            <label for=\"kd_therapist\">Kode Therapist</label>
            <input type=\"text\" class=\"form-control\" name=\"kd_therapist\" value=\"$data[kd_therapist]\" readonly=\"readonly\"></td></tr>
          </div>
          <div class=\"form-group\">
            <label for=\"nama_therapist\">Nama therapist</label>
            <input type=\"text\" class=\"form-control\" name=\"nama_therapist\" value=\"$data[nama_therapist]\">
          </div>
          <div class=\"form-group\">
            <label for=\"no_ktp\">No KTP</label>
           <input type=\"text\" class=\"form-control\" name=\"no_ktp\" value=\"$data[no_ktp]\">
          </div>
          <div class=\"form-group\">
            <label for=\"telp_therapist\">Telepon</label>
            <input type=\"text\" class=\"form-control\" name=\"telp_therapist\" value=\"$data[telp_therapist]\">
          </div>
          <div class=\"form-group\">
            <label for=\"jenis_kelamin\">Jenis Kelamin</label>
              <lable><input type=\"radio\" name=\"jenis_kelamin\" style=\"margin-left:50px;\" class=\"minimal\" value=\"laki-laki\"";if($data['jenis_kelamin']=='laki-laki'){echo"checked";} echo"></lable> laki-laki 
              <lable><input type=\"radio\" name=\"jenis_kelamin\" style=\"margin-left:20px;\" class=\"minimal\" value=\"perempuan\"";if($data['jenis_kelamin']=='perempuan'){echo"checked";} echo"></lable> perempuan 
          </div>
          <div class=\"form-group\">
            <label for=\"alamat\">Alamat</label>
            <input type=\"text\" class=\"form-control\" name=\"alamat\" value=\"$data[alamat]\">
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
