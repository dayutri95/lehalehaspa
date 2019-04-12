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
  <title>Leha-leha Spa | Data Penjualan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <?php include '../style2.php'; ?>
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include '../top.php' ?>
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
            <h1>Detail Penjualan</h1>
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
            
            <!-- /.card-header -->

            <div class="card-body">
            <?php
            $kd_penjualan=$_GET['kd_penjualan'];
            $hasil =  mysqli_query($connect, "SELECT * FROM detail_penjualan INNER JOIN produk ON detail_penjualan.kd_produk=produk.kd_produk WHERE kd_penjualan='$kd_penjualan' ORDER BY nama_produk")or die(mysqli_error($connect));
            ?>
            
            <?php
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
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
                  <td>$data[nama_produk]</td>
                  <td>$data[harga]</td>
                  <td>$data[qty]</td>
                  <td>$data[subtotal]</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
                $tanggal=mysqli_query($connect, "SELECT tgl_transaksi FROM penjualan WHERE kd_penjualan='$kd_penjualan'")or die(mysqli_error($connect));
                $tampil=mysqli_fetch_array($tanggal)or die(mysqli_error($connect));
                $tgl=$tampil['tgl_transaksi'];
              ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
    <div class="modal-footer">
    <form action="cetak.php" method="GET" target="_blank" >
    <input type="text" id="kd_penjualan" name="kd_penjualan" value = "<?php echo"$kd_penjualan" ?>" hidden>
    <input type="text" id="tgl" name="tgl" value = "<?php echo"$tgl" ?>" hidden>
      <!-- /.<input type="submit" class="btn btn-primary pull-left" style="margin-left: 10px;"value="cetak" ></input>-->
      <a href="index.php"><button type="button" class="btn btn-danger pull-left" style="margin-left:5px;" data-dismiss="modal">Tutup</button><a>
    </form>
    </div>
  </div>
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
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
