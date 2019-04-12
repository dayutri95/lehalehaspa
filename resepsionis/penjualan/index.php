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
            <h1>Data Penjualan Produk</h1>
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

            
            <!-- /.card-header -->

            <div class="card-body">
            <?php
            $hasil =  mysqli_query($connect, "SELECT user.username,penjualan.kd_penjualan,penjualan.total,DATE_FORMAT(penjualan.tgl_transaksi, '%d-%m-%Y') AS tgl_transaksi FROM penjualan INNER JOIN user ON penjualan.kd_user=user.kd_user");
            ?>
            <div class="card-header">
            <form method = "get" action="tambah.php">
              <input id="kd_penjualan" name="kd_penjualan" type="text" value="" hidden></input>
              <input id="tgl_transaksi" name="tgl_transaksi" type="date" value="" hidden></input>
              <input type="submit" class="btn btn-primary pull-left" style="margin-left: 10px;"  value="Tambah Data penjualan" ></input>
            </form>
            </div>
            <?php
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode penjualan</th>
                  <th>Tanggal Transaksi</th>
                  <th>Total Pembayaran</th>
                  <th>User</th>
                  <th>Aksi</th>
                </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
        
                echo "
                <tr>
                  <td>$data[kd_penjualan]</td>
                  <td>$data[tgl_transaksi]</td>
                  <td>$data[total]</td>
                  <td>$data[username]</td>
                  <td><a href=\"detail.php?kd_penjualan=$data[kd_penjualan]\" class=\"fa fa-info\"></a> |
                      <a href=\"cetak.php?kd_penjualan=$data[kd_penjualan]&tgl=$data[tgl_transaksi]\" class=\"fa fa-print\" target=\"_blank\"></a>
                      </td> 
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>
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
