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
  <title>Leha-leha Spa | Data Treatment</title>
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
            <h1>Data treatment</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Treatment</h3>
      </div>
              <!-- /.card-header -->
              <!-- form start -->
  <?php
  $kd_treatment    = $_GET['kd_treatment'];
  $edit  = "SELECT * FROM treatment WHERE kd_treatment='$kd_treatment'";
  $hasil = mysqli_query($connect, $edit);
  $data  = mysqli_fetch_array($hasil);
  $tampil = "SELECT * FROM kategori_treatment ORDER BY nama_kategori";
  $hasil2  = mysqli_query($connect, $tampil);

  echo"<form action=\"update.php\" method=\"post\" name=\"form\" onsubmit=\"return treatment()\">
        <div class=\"card-body\">
          <div class=\"form-group\">
            <label for=\"kd_treatment\">Kode treatment</label>
            <input type=\"text\" class=\"form-control\" name=\"kd_treatment\" value=\"$data[kd_treatment]\" readonly=\"readonly\"></td></tr>
          </div>
          <div class=\"form-group\">
            <label for=\"nama_treatment\">Nama treatment</label>
            <input type=\"text\" class=\"form-control\" name=\"nama_treatment\" value=\"$data[nama_treatment]\">
          </div>
          <div class=\"form-group\">
            <label for=\"harga\">Harga</label>
           <input type=\"text\" class=\"form-control\" name=\"harga\" value=\"$data[harga]\">
          </div>
          <div class=\"form-group\">
            <label>Lama Treatment</label>";
              $jam=$data['lama']/60;
              $h=floor($jam);
              $mnt=$data['lama']%60;
              echo"<select id=\"jam\" name=\"jam\" style=\"margin-left:10px;\">";
                for($i=00; $i<=24; $i++){ 
                echo"<option value=\"$i\""; if($i==$h){echo"selected";} $s=sprintf("%02d", $i); echo">$s </option>";
                }
              echo"</select>:
              <select id=\"mnt\" name=\"mnt\">";
                for($i=00; $i<=60; $i++){ 
                echo"<option value=\"$i\""; if($i==$mnt){echo"selected";}$s=sprintf("%02d", $i); echo">$s</option>";
                }
              echo"</select>
          </div>
        
          <div class=\"form-group\">
            <label for=\"kategori\">Kategori</label>
            <select class=\"form-control\" name=\"kategori\">";
            while ($data2=mysqli_fetch_array($hasil2)){
              $kategori=$data['kd_kategori'];
              echo"<option value=\"$data2[kd_kategori]\""; if($kategori==$data2['kd_kategori']){echo "selected";} echo">$data2[nama_kategori]</option>";}
            echo "</select>
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
