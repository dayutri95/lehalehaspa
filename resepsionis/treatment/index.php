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
  <title>Leha-leha Spa | Data treatment</title>
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
            <h1>Data Treatment</h1>
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
              <a href="tambah.php" name="btntambah" class="btn btn-primary" style="margin-left: 10px;">Tambah Treatment</a>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
            <?php
            $hasil =  mysqli_query($connect, "SELECT * FROM treatment INNER JOIN kategori_treatment where treatment.kd_kategori = kategori_treatment.kd_kategori");
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode treatment</th>
                  <th>Nama treatment</th>
                  <th>Harga</th>
                  <th>Lama Treatment</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                $jam=$data['lama']/60;
                $h=floor($jam);
                $a=sprintf("%02d", $h); 
                $mnt=$data['lama']%60;
                $b=sprintf("%02d", $mnt);
                echo "<tr>
                  <td>$data[kd_treatment]</td>
                  <td>$data[nama_treatment]</td>
                  <td>$data[harga]</td>
                  <td>$a:$b</td>
                  <td>$data[nama_kategori]</td>
                  <td><a href=\"edit.php?kd_treatment=$data[kd_treatment]\" class=\"fa fa-edit\"></a> 
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
  <?php include '../footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include'../jscript2.php'; ?>

<script >
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
