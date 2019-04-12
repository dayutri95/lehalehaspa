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
  <title>Leha-leha Spa | Data suplier</title>
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
            <h1>Data Suplier</h1>
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
              <a href="tambah.php" name="btntambah" class="btn btn-primary" style="margin-left: 10px;">Tambah Suplier</a>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <?php
            $hasil =  mysqli_query($connect, "SELECT * FROM suplier");
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Suplier</th>
                  <th>Nama Suplier</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>NPWP</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                echo "<tr>
                  <td>$data[kd_suplier]</td>
                  <td>$data[nama_suplier]</td>
                  <td>$data[telp_suplier]</td>
                  <td>$data[alamat]</td>
                  <td>$data[npwp]</td>
                  <td><a href=\"edit.php?kd_suplier=$data[kd_suplier]\" class=\"fa fa-edit\"></a>  
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
<?php include '../jscript2.php'; ?>
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
