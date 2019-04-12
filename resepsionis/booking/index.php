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
            <h1>Data Booking</h1>
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
            $hasil =  mysqli_query($connect, "SELECT kd_therapist,kd_user,pelanggan.kd_pelanggan,booking.kd_booking,booking.status_book,booking.check_in,booking.check_out,pelanggan.nama_pelanggan,DATE_FORMAT(booking.tgl_booking, '%d-%m-%Y' ) AS tgl_booking FROM booking INNER JOIN pelanggan ON booking.kd_pelanggan=pelanggan.kd_pelanggan ORDER BY booking.check_in DESC");
            
            
            ?>
            <div class="card-header">
            <form method = "get" action="tambah.php">
              <input id="kd_booking" name="kd_booking" type="text" value="" hidden></input>
              <input id="tgl_booking" name="tgl_booking" type="date" value="" hidden></input>
              <input id="kd_pelanggan" name="kd_pelanggan" type="text" hidden></input>
              <input id="kd_therapist" name="kd_therapist" type="text" hidden></input>
              <input type="submit" class="btn btn-primary pull-left" style="margin-left: 10px;"  value="Tambah Data Booking" ></input>
            </form>
            </div>
            <?php
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Kode Booking</th>
                  <th>Tanggal Booking</th>
                  <th>Check in</th>
                  <th>Check out</th>
                  <th>Pelanggan</th>
                  <th>Status</th>
                  <th>Therapist</th>
                  <th>User</th>
                  <th>Aksi</th>
                </tr> 
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil)){
                $jam=$data['check_in']/60;
                $h=floor($jam);
                $a=sprintf("%02d", $h);
                $mnt=$data['check_in']%60;
                $b=sprintf("%02d", $mnt);
                $c=$data['check_out']/60;
                $d=floor($c);
                $e=sprintf("%02d", $d);
                $f=$data['check_out']%60;
                $g=sprintf("%02d", $f);
                if($data['kd_user'] != ''){
                $hasil2 =  mysqli_query($connect, "SELECT * FROM booking INNER JOIN user ON booking.kd_user=user.kd_user INNER JOIN therapist ON therapist.kd_therapist=booking.kd_therapist WHERE kd_booking='$data[kd_booking]'");
                $data2=mysqli_fetch_array($hasil2) or die(mysqli_error($connect));
                $user=$data2['username'];
                $therapist=$data2['nama_therapist'];
                }else{
                  $user='pelanggan';
                  $therapist='';

                }

                echo "
                <tr>
                  <td>$data[kd_booking]</td>
                  <td>$data[tgl_booking]</td>
                  <td>$a:$b</td>
                  <td>$e:$g</td>
                  <td>$data[nama_pelanggan]</td>
                  <td>$data[status_book]</td>
                  <td>$therapist</td>
                  <td>$user</td>
                  <td><a href=\"detail.php?kd_booking=$data[kd_booking]\" class=\"fa fa-info\"></a> | ";
                  if ($data['status_book']!="check out"){
                      echo"<a href=\"tambah.php?kd_booking=$data[kd_booking]&tgl_booking=$data[tgl_booking]&kd_pelanggan=$data[kd_pelanggan]&kd_therapist=$data[kd_therapist]\" class=\"fa fa-edit\"></a>  ";
                  }else{
                      echo"<a href=\"cetak.php?kd_booking=$data[kd_booking]&tgl_booking=$data[tgl_booking]&kd_pelanggan=$data[kd_pelanggan]\" class=\"fa fa-print\" target=\"_blank\"></a>  ";
                      }
                  echo"</tr>";
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
