<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}

    $carikd_pelanggan = mysqli_query($connect,"SELECT MAX(kd_pelanggan) FROM pelanggan");
    $datakd_pelanggan = mysqli_fetch_array($carikd_pelanggan);

    $nomor = intval(substr($datakd_pelanggan[0],2));

    $tambah = $nomor + 1;
    $kd_pelanggan = sprintf("PE%03d", $tambah);
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
                <h3 class="card-title">Form Tambah Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input2.php" method="post" name="form" onsubmit="return pelanggan()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_pelanggan">Kode pelanggan</label>
                    <input type="text" class="form-control" name="kd_pelanggan" id="kd_pelanggan" value="<?php echo "$kd_pelanggan"?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_pelanggan">Nama pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Input Nama pelanggan">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <lable><input type="radio" name="jenis_kelamin" class="minimal" value="laki-laki" style="margin-left:40px" checked> laki-laki </lable>
                    <lable><input type="radio" name="jenis_kelamin" class="minimal" value="perempuan" style="margin-left:20px"> perempuan </lable>
                  </div>
                  <div class="form-group">
                    <label for="telp_pelanggan">Telepon</label>
                    <input type="text" class="form-control" name="telp_pelanggan" id="telp_pelanggan" placeholder="Input Telepon">
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Input Email">
                  </div>
                  </div>
        <!-- /.card-body -->
                <div class="card-footer">
                  <div class="modal-footer">
                  <?php
                  $a='';
                  $b='';
                  $c='';
                  echo"<a href=\"tambah.php?kd_booking=$a&tgl_booking=$b&kd_pelanggan=$c\"><button type=\"button\" class=\"btn btn-danger pull-right\" style=\"margin-left: 10px;\"  data-dismiss=\"modal\">Tutup</button><a>
                  ";?>
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
