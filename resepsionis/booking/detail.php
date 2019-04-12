<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data Booking</title>
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
            <h1>Detail Booking</h1>
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
            include '../config.php';
            $kd_booking=$_GET['kd_booking'];
            $hasil =  mysqli_query($connect, "SELECT treatment.nama_treatment,detail_booking.harga,detail_booking.serv,detail_booking.tax,detail_booking.subtotal,therapist.nama_therapist FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN therapist ON therapist.kd_therapist=detail_booking.kd_therapist WHERE kd_booking='$kd_booking' ORDER BY nama_treatment")or die(mysqli_error($connect));
            ?>
            
            <?php
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Treatment</th>
                  <th>Harga</th>
                  <th>Service</th>
                  <th>Tax</th>
                  <th>Subtotal</th>
                  <th>Therapist</th>
                </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
        
                echo "
                <tr>
                  <td>$data[nama_treatment]</td>
                  <td>$data[harga]</td>
                  <td>$data[serv]</td>
                  <td>$data[tax]</td>
                  <td>$data[subtotal]</td>
                  <td>$data[nama_therapist]</td>
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
                $tanggal=mysqli_query($connect, "SELECT DATE_FORMAT(tgl_booking, '%d-%m-%Y' ) AS tgl_booking, status_book FROM booking WHERE kd_booking='$kd_booking'")or die(mysqli_error($connect));
                $tampil=mysqli_fetch_array($tanggal)or die(mysqli_error($connect));
                $tgl=$tampil['tgl_booking'];
                $status=$tampil['status_book'];
              ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
    <div class="modal-footer">
      <form action="cetak.php" method="GET" name="form" target="_blank" onsubmit="return book()">
        <input type="text" id="kd_booking" name="kd_booking" value = "<?php echo"$kd_booking" ?>" hidden>
        <input type="text" id="tgl" name="tgl_booking" value = "<?php echo"$tgl" ?>" hidden>
        <input type="text" id="status_book" name="status_book" value = "<?php echo"$status" ?>" hidden>
        <!-- /.<input type="submit" class="btn btn-primary pull-left" style="margin-left: 10px;" <?php //if ($status!='check out') {?> disable="disable"<?php// } ?> value="cetak" ></input>card-body -->
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
<?php include'../jscript2.php' ?>
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
