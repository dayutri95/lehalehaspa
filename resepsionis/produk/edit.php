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
  <title>Leha-leha Spa | Data Produk</title>
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
            <h1>Data Produk</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

        <form action="update.php" method="post" name="form" onsubmit="return produk()">
          <div class="modal-body">
            <div class="box-body">
            <?php
              $kd_produk = $_GET['kd_produk'];
              $edit  = "SELECT * FROM produk WHERE kd_produk='$kd_produk'";
              $hasil = mysqli_query($connect, $edit);
              $data  = mysqli_fetch_array($hasil);
              $tampil = "SELECT * FROM suplier ORDER BY nama_suplier";
              $hasil2  = mysqli_query($connect, $tampil);
            echo"<div class=\"form-group\">
                  <label for=\"kd_produk\">Kode Produk</label>
                  <input type=\"text\" class=\"form-control\" name=\"kd_produk\" value=\"$data[kd_produk]\" readonly=\"readonly\">
              </div>
              <div class=\"form-group\">
                <label for=\"nama_produk\">Nama Produk</label>
                <input type=\"text\" class=\"form-control\" name=\"nama_produk\" value=\"$data[nama_produk]\">
              </div>
              <div class=\"form-group\">
                <label for=\"satuan\" >Satuan</label>
                <select class=\"form-control\" name=\"satuan\">
                 <option value=\"pcs\""; if($data['satuan']=='pcs'){ echo"selected";}echo ">pcs</option>
                  <option value=\"lusin\""; if($data['satuan']=='lusin'){echo "selected";}echo">lusin</option>
                </select>
              </div>
              <div class=\"form-group\">
                <label for=\"suplier\">Suplier</label>
                <select class=\"form-control\" name=\"kd_suplier\">";
                while ($data2=mysqli_fetch_array($hasil2)){
                $kd_suplier=$data['kd_suplier'];
                echo"<option value=\"$data2[kd_suplier]\""; if($kd_suplier==$data2['kd_suplier']){echo "selected";} echo">$data2[nama_suplier]</option>";}
                echo "</select>
              </div>
              
            </div>
            <div class=\"modal-footer\">              
              <a href=\"index.php\"><button type=\"button\" class=\"btn btn-danger pull-left\" data-dismiss=\"modal\">Tutup</button><a>
              <button type=\"submit\" class=\"btn btn-primary\">Simpan</button>
            </div>
          </div>
        </form>";
        ?>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'footer.php' ?>
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
