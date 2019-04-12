<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
  $carikd_treatment = mysqli_query($connect,"SELECT MAX(kd_treatment) FROM treatment");
    $datakd_treatment = mysqli_fetch_array($carikd_treatment);

    $nomor = intval(substr($datakd_treatment[0],2));

    $tambah = $nomor + 1;
    $kd_treatment = sprintf("TR%03d", $tambah);
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
            <h1>Data Treatment</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Treatment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" method="post" name="form" onsubmit="return treatment()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_treatment">Kode Treatment</label>
                    <input type="text" class="form-control" name="kd_treatment" id="kd_treatment" value="<?php echo"$kd_treatment" ?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_treatment">Nama treatment</label>
                    <input type="text" class="form-control" name="nama_treatment" id="nama_treatment" placeholder="Input Nama treatment">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Input Harga">
                  </div>
                  <div class="form-group">
                    <label>Lama Treatment</label>
                    <select id="jam" name="jam" style="margin-left:10px;">
                    <?php
                      for($i=00; $i<=24; $i++){ 
                    ?>
                      <option value="<?php echo $i ?>"> <?php $s=sprintf("%02d", $i); echo $s ?></option>
                    <?php
                      }
                    ?>
                    </select>:
                    <select id="mnt" name="mnt">
                    <?php
                      for($i=00; $i<=60; $i++){ 
                    ?>
                      <option value="<?php echo $i ?>"> <?php $s=sprintf("%02d", $i); echo $s ?></option>
                    <?php
                      }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori">
                    <option>--pilih kategori treatment--</option>
                    <?php
                    include 'config.php';
                    $tampil = "SELECT * FROM kategori_treatment ORDER BY nama_kategori";
                    $hasil  = mysqli_query($connect, $tampil);
                    $total  = mysqli_num_rows($hasil);
                    while ($data=mysqli_fetch_array($hasil)){
                    echo"<option value=\"$data[kd_kategori]\">$data[nama_kategori]</option>";}
                    ?>
                    </select>
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
