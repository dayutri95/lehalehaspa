<?php
  include 'config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../login.php");}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Dashboard Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'style.php'; ?>
  <!-- Font Awesome -->
  </head>
<body bgcolor="blue">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item">
            <a href="../logout.php">
              <i class="fa fa-power-off"> </i> Logout
            </a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      
      <div class="card-body">
       <center>
       <img src="../lehaleha2.png" width="350 px"><p><br></p>
        
       <h2>SELAMAT DATANG DI HALAMAN RESEPSIONIS</h2>
       <p><br></p>
       </center>
       <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
              <?php
              $tampil = "SELECT * FROM user ORDER BY kd_user";
              $hasil  = mysqli_query($connect, $tampil);
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="user" class="small-box-footer">Halaman Data User <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM treatment ORDER BY kd_treatment");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Treatment</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-flower"></i>
              </div>
              <a href="treatment" class="small-box-footer">Halaman Data treatment <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM kategori_treatment ORDER BY kd_kategori");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Kategori Treatment</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-flower-outline"></i>
              </div>
              <a href="kategori_treatment" class="small-box-footer">Halaman Data Kategori treatment <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM therapist ORDER BY kd_therapist");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Therapist</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="therapist" class="small-box-footer">Halaman Data Therapist <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM produk ORDER BY kd_produk");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="produk" class="small-box-footer">Halaman Data Produk <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM suplier ORDER BY kd_suplier");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Suplier</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-plane"></i>
              </div>
              <a href="suplier" class="small-box-footer">Halaman Data suplier <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- small box -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM pelanggan ORDER BY kd_pelanggan");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Pelanggan</p>
              </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            <a href="pelanggan" class="small-box-footer">Halaman Data Pelanggan <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM booking");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Booking Treatment</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-bookmarks"></i>
              </div>
              <a href="booking" class="small-box-footer">Halaman Data Booking <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM barang_masuk");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-paper"></i>
              </div>
              <a href="barang_masuk" class="small-box-footer">Halaman Barang Masuk <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
              $hasil  = mysqli_query($connect, "SELECT * FROM detail_penjualan");
              $total  = mysqli_num_rows($hasil);
                echo"<h3>$total</h3>"
              ?>
                <p>Data Penjualan</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-cart"></i>
              </div>
              <a href="penjualan" class="small-box-footer">Halaman Penjualan <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

        </div>

        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
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
  <?php include 'jscript.php' ?>

</body>
</html>
