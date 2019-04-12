<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}

    $carikd_suplier = mysqli_query($connect,"SELECT MAX(kd_suplier) FROM suplier");
    $datakd_suplier = mysqli_fetch_array($carikd_suplier);

    $nomor = intval(substr($datakd_suplier[0],2));

    $tambah = $nomor + 1;
    $kd_suplier = sprintf("S%03d", $tambah);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data suplier</title>
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
            <h1>Data Suplier</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Suplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" method="post" name="form" onsubmit="return suplier()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_suplier">Kode suplier</label>
                    <input type="text" class="form-control" name="kd_suplier" id="kd_suplier" value="<?php echo"$kd_suplier" ?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_suplier">Nama suplier</label>
                    <input type="text" class="form-control" name="nama_suplier" id="nama_suplier" placeholder="Input Nama suplier">
                  </div>
                  <div class="form-group">
                    <label for="telp_suplier">Telepon</label>
                    <input type="text" class="form-control" name="telp_suplier" id="telp_suplier" placeholder="Input Telepon">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Input Alamat">
                  </div>
                  <div class="form-group">
                    <label for="npwp">NPWP</label>
                    <input type="text" class="form-control" name="npwp" id="npwp" placeholder="Input NPWP">
                  </div>
                  </div>
        <!-- /.card-body -->
                <div class="card-footer">
                  <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button><a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
