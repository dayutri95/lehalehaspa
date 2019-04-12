<?php
  include 'config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
?>
<!DOCTYPE html>
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Sales And Expense</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <?php include 'style.php'; ?>
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include 'top.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'sidebar.php' ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daily Sales and Expense</h1>
          </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            
            <!-- /.card-body -->
          <!-- /.card -->

            <div class="card-header">
            <form method="GET" action="" name = "form" onsubmit="return qbd()">
              <div class="form-group">
                <div class="input-group">
                  <label>Tanggal</label>
                    <div class="input-group-prepend" style="margin-left:25px;">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div> 
                      <input type="date" name="tgl" id="tgl"/>
                      <button style="margin-left:10px;" type="submit" class="btn btn-primary">Tampil</button>
                </div>
              </div>
            </form>
            </div>
            <!-- /.card-header -->

            
            <div class="card-body">
            <h3>Treatment</h3>
            <?php
            $tgl=$_GET['tgl'];
            $hasil =  mysqli_query($connect, "SELECT DISTINCT treatment.kd_treatment FROM treatment LEFT JOIN detail_booking ON detail_booking.kd_treatment=treatment.kd_treatment  INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking WHERE status_book='check in' AND tgl_booking='$tgl' OR status_book='check out' AND tgl_booking='$tgl' ");
            
              ?>
            <?php
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Treatment</th>
                  <th>Treatment</th>
                  <th>Harga</th>
                  <th>Service</th>
                  <th>Tax</th>
                  <th>Subtotal</th>
                  <th>Qty</th>
                  <th>Therapist</th>
                </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                $kd_treatment=$data['kd_treatment'];
                $tampil=mysqli_query($connect,"SELECT COUNT(*) AS 'jumlah' , SUM(detail_booking.serv) AS 'serv',SUM(detail_booking.tax) AS 'tax',SUM(detail_booking.subtotal) AS 'subtotal',detail_booking.kd_booking,treatment.kd_treatment,treatment.nama_treatment,therapist.nama_therapist,detail_booking.harga FROM detail_booking INNER JOIN treatment ON treatment.kd_treatment=detail_booking.kd_treatment INNER JOIN (booking INNER JOIN therapist ON booking.kd_therapist=therapist.kd_therapist) ON booking.kd_booking=detail_booking.kd_booking where treatment.kd_treatment ='$kd_treatment'")or die(mysqli_error($connect));
                $a=mysqli_fetch_array($tampil)or die(mysqli_error($connect));
                $kd_booking=$a['kd_booking'];
                $qty=$a['jumlah'];
                $serv=$a['serv'];
                $tax=$a['tax'];
                $subtotal=$a['subtotal'];
                $therapist=$a['nama_therapist'];
                $treatment=$a['nama_treatment'];
                $harga=$a['harga'];
        
                echo "
                <tr>
                  <td>$kd_treatment</td>
                  <td>$treatment</td>
                  <td>$harga</td>
                  <td>$serv</td>
                  <td>$tax</td>
                  <td>$subtotal</td>
                  <td>$qty</td>
                  <td>$therapist</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>
            </div>
            <div class="card-body">
            <h3>Produk</h3>
            <?php
            $hasil =  mysqli_query($connect, "SELECT DISTINCT produk.kd_produk FROM produk LEFT JOIN detail_penjualan  ON detail_penjualan.kd_produk=produk.kd_produk INNER JOIN penjualan ON penjualan.kd_penjualan=detail_penjualan.kd_penjualan WHERE tgl_transaksi='$tgl'")or die(mysqli_error($connect));
            ?>
            <?php
              echo "<table id=\"example3\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Penjualan</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                  </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                $kd_produk=$data['kd_produk'];
                $tampil=mysqli_query($connect,"SELECT SUM(detail_penjualan.qty) AS 'jumlah',SUM(detail_penjualan.subtotal) AS 'subtotal',detail_penjualan.kd_penjualan,produk.nama_produk,detail_penjualan.harga FROM detail_penjualan INNER JOIN produk ON produk.kd_produk=detail_penjualan.kd_produk where produk.kd_produk ='$kd_produk' order by jumlah DESC ")or die(mysqli_error($connect));
                $a=mysqli_fetch_array($tampil)or die(mysqli_error($connect));
                $jumlah=$a['jumlah'];
                $kd_penjualan=$a['kd_penjualan'];
                $produk=$a['nama_produk'];
                $harga=$a['harga'];
                $subtotal=$a['subtotal'];
        
                echo "
                <tr>
                  <td>$kd_penjualan</td>
                  <td>$produk</td>
                  <td>$harga</td>
                  <td>$jumlah</td>
                  <td>$subtotal</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>
            </div>
            <div class="card-body">
            <h3>Barang Masuk</h3>
            <?php
             $hasil =  mysqli_query($connect, "SELECT * FROM barang_masuk INNER JOIN produk ON barang_masuk.kd_produk=produk.kd_produk WHERE tgl_terima='$tgl'")or die(mysqli_error($connect));
            ?>
            <?php
              echo "<table id=\"example4\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Terima</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                  </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
        
                echo "
                <tr>
                  <td>$data[kd_terima]</td>
                  <td>$data[nama_produk]</td>
                  <td>$data[harga_beli]</td>
                  <td>$data[jumlah]</td>
                  <td>$data[subtotal]</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>
            </div>
            <div class='card-body'>
            <form action="cetak1.php" method="POST"  target="_blank" >
              <td><input type="text" value="<?php echo"$tgl"?>" name="tgl" id="tgl" hidden></td>
              <a href="index.php"><button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</button><a>
              <input type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;"value="Cetak" ></input>
            </form>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include'footer.php' ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include 'jscript.php' ?>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
