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
        <h3 class="card-title">Form Edit User</h3>
      </div>
              <!-- /.card-header -->
              <!-- form start -->
  <?php
  $kd_user    = $_GET['kd_user'];
  $edit  = "SELECT * FROM user WHERE kd_user='$kd_user'";
  $hasil = mysqli_query($connect, $edit);
  $data  = mysqli_fetch_array($hasil);

  echo"<form action=\"update.php\" method=\"post\" name=\"form\" onsubmit=\"return user()\">
        <div class=\"card-body\">
          <div class=\"form-group\">
            <label for=\"kd_user\">Kode User</label>
            <input type=\"text\" class=\"form-control\" name=\"kd_user\" value=\"$data[kd_user]\" readonly=\"readonly\"></td></tr>
          </div>
          <div class=\"form-group\">
            <label for=\"nama_user\">Nama User</label>
            <input type=\"text\" class=\"form-control\" name=\"nama_user\" value=\"$data[nama_user]\">
          </div>
          <div class=\"form-group\">
            <label for=\"username\">Username</label>
           <input type=\"text\" class=\"form-control\" name=\"username\" value=\"$data[username]\">
          </div>
          <div class=\"form-group\">
            <label for=\"exampleInputPassword1\">Password</label>
            <input type=\"password\" class=\"form-control\" name=\"password\" value=\"$data[password]\" id=\"exampleInputPassword1\" >
          </div>
          <div class=\"form-group\">
            <label for=\"telp_user\">Telepon</label>
            <input type=\"text\" class=\"form-control\" name=\"telepon\" value=\"$data[telepon]\">
          </div>
          <div class=\"form-group\">
            <label for=\"alamat\">Alamat</label>
            <input type=\"text\" class=\"form-control\" name=\"alamat\" value=\"$data[alamat]\">
           </div>
           <div class=\"form-group\">
            <label for=\"hak_akses\" >Hak Akses</label>
            <select class=\"form-control\" name=\"hak_akses\">";
            $hak_akses=$data['hak_akses'];
            echo" <option value =\"resepsionis\""; if($hak_akses=='resepsionis'){echo "selected";} echo">resepsionis</option>
              <option value =\"owner\""; if($hak_akses=='owner'){ echo"selected";} echo">owner</option>
              </select>
          </div>
          <div class=\"form-group\">
            <label for=\"status\">Status</label>
            <select class=\"form-control\" name=\"status\">";
            $status=$data['status'];
            echo"<option value=\"Aktif\"";if($status=='Aktif'){echo "selected";} echo">Aktif</option>
              <option value=\"Tidak Aktif\""; if($status=='Tidak Aktif'){echo"selected";} echo">Tidak Aktif</option>
            </select>
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
