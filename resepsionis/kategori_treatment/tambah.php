<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
 $carikd_kategori = mysqli_query($connect,"SELECT MAX(kd_kategori) FROM kategori_treatment");
    $datakd_kategori = mysqli_fetch_array($carikd_kategori);

    $nomor = intval(substr($datakd_kategori[0],2));

    $tambah = $nomor + 1;
    $kd_kategori = sprintf("K%02d", $tambah);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data kategori</title>
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
            <h1>Data kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="../../logout.php">Logout</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" name="form" onsubmit="return kategori()"  method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_kategori">Kode Kategori</label>
                    <input type="text" class="form-control" name="kd_kategori" id="kd_kategori" value=<?php echo"$kd_kategori"?> readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_kategori">Nama kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Input Nama kategori">
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
