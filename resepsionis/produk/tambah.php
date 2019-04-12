<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
  $carikd_produk = mysqli_query($connect,"SELECT MAX(kd_produk) FROM produk");
    $datakd_produk = mysqli_fetch_array($carikd_produk);

    $nomor = intval(substr($datakd_produk[0],2));

    $tambah = $nomor + 1;
    $kd_produk = sprintf("PR%03d", $tambah);
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
                <h3 class="card-title">Form Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" method="post" name="form" onsubmit="return produk()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_produk">Kode Produk</label>
                    <input type="text" class="form-control" name="kd_produk" id="kd_produk" value="<?php echo"$kd_produk" ?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Input Nama Produk">
                  </div>
                  <!--<div class="form-group">
                    <label for="harga_jual">Harga Jual</label>
                    <input type="text" class="form-control" name="harga_jual" id="harga_jual" placeholder="Input Harga Jual">
                  </div> -->
                  <div class="form-group">
                  <label for="satuan" >Satuan</label>
                    <select class="form-control" name="satuan">
                      <option>--pilih satuan--</option>
                      <option>pcs</option>
                      <option>lusin</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="suplier">Suplier</label>
                    <select class="form-control" name="kd_suplier">
                    <option value="" selected="selected">--pilih suplier--</option>";
                    <?php $a  = mysqli_query($connect, "SELECT * FROM suplier ORDER BY nama_suplier");
                    while ($b=mysqli_fetch_array($a)){
                    echo"<option value=\"$b[kd_suplier]\">$b[nama_suplier]</option>";}
                    echo"</select>";?>
                  </div>
                  
                  </div>
        <!-- /.card-body -->
                <div class="card-footer">
                  <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-danger pull-left"  data-dismiss="modal">Tutup</button><a>
                    <button type="submit" class="btn btn-primary" >Simpan</button>
                  </div>
                </div>
              </div>
            </form>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

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
