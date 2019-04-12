<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}

  $hitung = mysqli_query($connect, "SELECT count(*) as 'jumlah' FROM produk WHERE stok <=2");
  $tes=mysqli_fetch_array($hitung);
  if ($tes['jumlah'] != 0){
    $a = mysqli_query($connect, "SELECT * FROM produk WHERE stok <=2");
    $b = mysqli_fetch_array($a);
      echo "<script>alert('Stok Produk $b[nama_produk] di bawah 3');</script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data Produk</title>
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
            <h1>Data Produk</h1>
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
              <a href="tambah.php" name="btntambah" class="btn btn-primary" style="margin-left: 10px;">Tambah produk</a>
              
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <?php
            $hasil =  mysqli_query($connect, "SELECT produk.kd_produk,produk.nama_produk,produk.harga_jual,produk.satuan,produk.stok,suplier.nama_suplier FROM suplier INNER JOIN produk ON produk.kd_suplier=suplier.kd_suplier");
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Produk</th>
                  <th>Nama Produk</th>
                  <th>Harga Jual</th>
                  <th>Satuan</th>
                  <th>Stok</th>
                  <th>Suplier</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                echo "<tr>
                  <td>$data[kd_produk]</td>
                  <td>$data[nama_produk]</td>
                  <td>$data[harga_jual]</td>
                  <td>$data[satuan]</td>
                  <td>$data[stok]</td>
                  <td>$data[nama_suplier]</td>
                  <td><a href=\"edit.php?kd_produk=$data[kd_produk]\" class=\"fa fa-edit\"></a> 
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
  <?php include'../footer.php'; ?>

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
