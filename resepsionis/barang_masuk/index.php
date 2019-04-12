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
  <title>Leha-leha Spa | Data Barang Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <?php include '../style2.php' ?>
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
            <h1>Data Barang Masuk</h1>
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
              <a href="tambah.php" name="btntambah" class="btn btn-primary" style="margin-left: 10px;">Tambah Barang Masuk</a>
              
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <?php
            $hasil =  mysqli_query($connect, "SELECT produk.harga_jual,barang_masuk.subtotal,barang_masuk.kd_terima,produk.nama_produk,produk.stok,barang_masuk.harga_beli,barang_masuk.stok_awal,barang_masuk.jumlah,barang_masuk.stok_akhir,produk.nama_produk,user.username,DATE_FORMAT(barang_masuk.tgl_terima, '%d-%m-%Y' ) AS tgl_terima,DATE_FORMAT(barang_masuk.tgl_kadaluarsa, '%d-%m-%Y' ) AS tgl_kadaluarsa FROM barang_masuk INNER JOIN produk ON barang_masuk.kd_produk=produk.kd_produk INNER JOIN user ON user.kd_user=barang_masuk.kd_user");
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Terima</th>
                  <th>Tanggal Terima</th>
                  <th>Produk</th>
                  <th>Harga Beli</th>
                  <th>Harga Jual</th>
                  <th>Jumlah</th>
                  <th>Stok Awal</th>
                  <th>Stok Akhir</th>
                  <th>Tanggal Kadaluarsa</th>
                  <th>User</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                echo "<tr>
                  <td>$data[kd_terima]</td>
                  <td>$data[tgl_terima]</td>
                  <td>$data[nama_produk]</td>
                  <td>$data[harga_beli]</td>
                  <td>$data[harga_jual]</td>
                  <td>$data[jumlah]</td>
                  <td>$data[stok_awal]</td>
                  <td>$data[stok_akhir]</td>
                  <td>$data[tgl_kadaluarsa]</td>
                  <td>$data[username]</td>
                  <td><a href=\"cetak.php?kd_terima=$data[kd_terima]&tgl_terima=$data[tgl_terima]\" class=\"fa fa-print\" target=\"_blank\"></a>
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
