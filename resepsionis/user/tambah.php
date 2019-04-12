<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
  $carikd_user = mysqli_query($connect,"SELECT MAX(kd_user) FROM user");
    $datakd_user = mysqli_fetch_array($carikd_user);

    $nomor = intval(substr($datakd_user[0],2));

    $tambah = $nomor + 1;
    $kd_user = sprintf("U%02d", $tambah);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data User</title>
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
            <h1>Data user</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" method="post" name="form" onsubmit="return user()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_user">Kode User</label>
                    <input type="text" class="form-control" name="kd_user" id="kd_user" value="<?php echo "$kd_user" ?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_user">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Input Nama User">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Input Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Input Telepon">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Input Alamat">
                  </div>
                  <div class="form-group">
                  <label for="hak_akses" >Hak Akses</label>
                    <select class="form-control" name="hak_akses">
                      <option>resepsionis</option>
                      <option>owner</option>
                      </select>
                  </div>
                  <div class="form-group">
                  <label for="status">Status</label>
                    <select class="form-control" name="status">
                      <option>aktif</option>
                      <option>tidak aktif</option>
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
