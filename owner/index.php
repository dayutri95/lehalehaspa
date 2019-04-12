<?php
  include 'config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../login.php");}
$nama=$_SESSION['nama'];
$bln = date("m");
$penjualan = mysqli_query($connect, "SELECT SUM(total) as 'total' FROM  penjualan WHERE MONTH(tgl_transaksi)= '$bln'")or die(mysqli_error($connect));
$a  = mysqli_fetch_array($penjualan)or die(mysqli_error($connect));
$booking = mysqli_query($connect, "SELECT SUM(total) as 'total' FROM booking WHERE MONTH(tgl_booking)= '$bln'")or die(mysqli_error($connect));
$b  = mysqli_fetch_array($booking)or die(mysqli_error($connect));
$barang_masuk = mysqli_query($connect, "SELECT SUM(subtotal) as 'total' FROM barang_masuk WHERE MONTH(tgl_terima)= '$bln'")or die(mysqli_error($connect));
$c  = mysqli_fetch_array($barang_masuk)or die(mysqli_error($connect));

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Dashboard Resepsionis</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'style.php'; ?>
  <!-- Font Awesome -->
  </head>
<body>
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
             <a href="../logout.php" class="fa fa-power-off"> Logout</a></li>
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
       <img src="../lehaleha2.png" width="350px">
       <p><br></p>
       <strong><h2>SELAMAT DATANG DI DASBOARD OWNER</h2></strong></center>
       <p></br></p>
        <div class="row">
            <!-- small box -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
              	
                <h3>Daily Sales</h3>
                <h3>and Expense</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <?php $tgl='' ?>
              <a href="sales.php?tgl=<?php echo"$tgl" ?>" class="small-box-footer">Halaman Laporan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
              	
                <h3>Quick Book</h3>
                <h3>Data (QBD)</h3>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="qbd.php?tgl=<?php echo"$tgl" ?>" class="small-box-footer">Halaman Laporan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                
                <h3>Laporan</h3>
                <h3>Bulanan</h3>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="bulanan.php" class="small-box-footer">Halaman Laporan <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- small box -->
    
        <script src="chart/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 20%;
                margin: 15px auto;
            }
        </style>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["penjualan","booking","barang masuk"],
                    datasets: [{
                        label: '',
                            data: [
                                <?php 
                                echo "$a[total]";
                                ?>, 
                                <?php 
                                echo "$b[total]";
                                ?>,
                                <?php 
                                echo "$c[total]";
                                ?>,
                                ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
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
