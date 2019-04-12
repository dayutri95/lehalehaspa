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
  <title>Leha-leha Spa | QBD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <?php include 'style.php' ?>
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
            <h1>Quick Book Data (QBD)</h1>
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

          <div class="card">
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
            <?php
            $tgl= $_GET['tgl'];
            $hasil =  mysqli_query($connect, "SELECT * FROM kategori_treatment ORDER BY nama_kategori");
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Serv</th>
                  <th>Tax</th>
                  <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                $kd_kategori=$data['kd_kategori'];
                $tampil=mysqli_query($connect,"SELECT SUM(detail_booking.harga) AS 'harga',SUM(detail_booking.serv) AS 'serv',SUM(detail_booking.tax) AS 'tax' FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN booking ON detail_booking.kd_booking=booking.kd_booking where kd_kategori ='$kd_kategori' AND status_book='check in' AND tgl_booking='$tgl' OR kd_kategori ='$kd_kategori' AND status_book='check out' AND tgl_booking='$tgl'")or die(mysqli_error($connect));
                $a=mysqli_fetch_array($tampil)or die(mysqli_error($connect));
                $harga=$a['harga'];
                $tax=$a['tax'];
                $serv=$a['serv'];
                $subtotal=$harga+$tax+$serv;
                echo "<tr>
                  <td>$data[nama_kategori]</td>
                  <td>$harga</td>
                  <td>$serv</td>
                  <td>$tax</td>
                  <td>$subtotal</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
            $tampil1=mysqli_query($connect,"SELECT SUM(total) AS 'treatment' FROM booking WHERE status_book='check in' AND tgl_booking='$tgl' OR status_book='check out' AND tgl_booking='$tgl'")or die(mysqli_error($connect));
            $b=mysqli_fetch_array($tampil1);
            $treatment=$b['treatment'];
            $tampil2=mysqli_query($connect,"SELECT SUM(total) AS 'produk' FROM penjualan WHERE  tgl_transaksi='$tgl'")or die(mysqli_error($connect));
            $c=mysqli_fetch_array($tampil2);
            $produk=$c['produk'];
            $all=$treatment+$produk;
            $tampil3=mysqli_query($connect,"SELECT SUM(subtotal) AS 'beli' FROM barang_masuk WHERE  tgl_terima='$tgl'")or die(mysqli_error($connect));
            $d=mysqli_fetch_array($tampil3);
            $beli=$d['beli'];
            ?>
            </div>
            <div class='card-body'>
            <form action="cetak.php" method="POST"  target="_blank" >
            <table>
            <tr><td width='270px'>Total Penjualan Treatment</td>
               <td><input type="text" value="<?php echo"$treatment"?>" name="treatment" id="treatment" readonly="readonly"></td>
            </tr>
            <tr><td>Total Penjualan Produk</td>
               <td><input type="text" value="<?php echo"$produk"?>" name="produk" id="produk" readonly="readonly"></td>
            </tr>
            <tr><td>Total Penjualan Keseluruhan</td>
               <td><input type="text" value="<?php echo"$all"?>" name="all" id="all" readonly="readonly"></td>
            </tr>
            <tr><td>Total Pembelian Barang</td>
               <td><input type="text" value="<?php echo"$beli"?>" name="beli" id="beli" readonly="readonly"></td>
            </tr>
            </table>
            
              <td><input type="text" value="<?php echo"$tgl"?>" name="tgl" id="tgl" hidden></td>
              <a href="index.php"><button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Tutup</button><a>
              <input type="submit" class="btn btn-primary pull-right" style="margin-right: 10px;"value="Cetak" ></input>
            </form>
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
<?php include'jscript.php' ?> 
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
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
