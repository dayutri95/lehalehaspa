<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
   $carikd_therapist = mysqli_query($connect,"SELECT MAX(kd_therapist) FROM therapist");
    $datakd_therapist = mysqli_fetch_array($carikd_therapist);

    $nomor = intval(substr($datakd_therapist[0],2));

    $tambah = $nomor + 1;
    $kd_therapist = sprintf("T%02d", $tambah);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data therapist</title>
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
                <h3 class="card-title">Form Tambah Therapist</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" method="post" name="form" onsubmit="return therapist()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_therapist">Kode Therapist</label>
                    <input type="text" class="form-control" name="kd_therapist" id="kd_therapist" value="<?php echo"$kd_therapist" ?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_therapist">Nama Therapist</label>
                    <input type="text" class="form-control" name="nama_therapist" id="nama_therapist" placeholder="Input Nama therapist">
                  </div>
                  <div class="form-group">
                    <label for="no_ktp">No KTP</label>
                    <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Input No KTP">
                  </div>
                  <div class="form-group">
                    <label for="telp_therapist">Telepon</label>
                    <input type="text" class="form-control" name="telp_therapist" id="telp_therapist" placeholder="Input Telepon">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <lable><input type="radio" name="jenis_kelamin" style="margin-left:50px;" class="minimal" value="laki-laki" checked> laki-laki </lable>
                    <lable><input type="radio" name="jenis_kelamin" style="margin-left:20px;"class="minimal" value="perempuan"> perempuan </lable>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Input Alamat">
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
