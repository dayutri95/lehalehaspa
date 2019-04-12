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
  <title>Leha-leha Spa | Data Barang Masuk</title>
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
                <h3 class="card-title">Form Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

        <form action="update.php" method="post" name >
          <div class="modal-body">
            <div class="box-body">
            <?php
              include 'config.php';
              $kd_produk = $_GET['kd_produk'];
              $edit  = "SELECT * FROM produk WHERE kd_produk='$kd_produk'";
              $hasil = mysqli_query($connect, $edit);
              $data  = mysqli_fetch_array($hasil);
            echo"<div class=\"form-group\">
                  <label for=\"kd_produk\">Kode Produk</label>
                  <input type=\"text\" class=\"form-control\" name=\"kd_produk\" value=\"$data[kd_produk]\">
              </div>
              <div class=\"form-group\">
                <label for=\"nama_produk\">Nama Produk</label>
                <input type=\"text\" class=\"form-control\" name=\"nama_produk\" value=\"$data[nama_produk]\">
              </div>
              <div class=\"form-group\">
                <label for=\"harga_jual\">Harga Jual</label>
                <input type=\"text\" class=\"form-control\" name=\"harga_jual\" value=\"$data[harga_jual]\">
              </div>
              <div class=\"form-group\">
                <label for=\"satuan\" >Satuan</label>
                <select class=\"form-control\" name=\"satuan\">
                  <option if($data[satuan]=='pcs')selected endif>pcs</option>
                  <option if($data[satuan]=='lusin')selected endif>lusin</option>
                </select>
              </div>
              <div class=\"form-group\">
                <label>Tanggal Kadaluarsa</label>
                  <div class=\"input-group\">
                    <div class=\"input-group-prepend\">
                      <span class=\"input-group-text\"><i class=\"fa fa-calendar\"></i></span>
                    </div> 
                    <input type=\"text\" class=\"form-control\" name=\"tgl_kadaluarsa\" id=\"tgl_kadaluarsa\" data-inputmask=\"'alias': 'dd/mm/yyyy'\" data-mask value=\"$data[tgl_kadaluarsa]\">
                  </div>
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
