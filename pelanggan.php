<?php
  include 'config.php';
  

    $carikd_pelanggan = mysqli_query($connect,"SELECT MAX(kd_pelanggan) FROM pelanggan");
    $datakd_pelanggan = mysqli_fetch_array($carikd_pelanggan);

    $nomor = intval(substr($datakd_pelanggan[0],2));

    $tambah = $nomor + 1;
    $kd_pelanggan = sprintf("PE%03d", $tambah);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data pelanggan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include 'style.php' ?>
  <!-- Font Awesome -->
  </head>
<body class="bg-gray">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="container">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input_pelanggan.php" method="post" name="form" onsubmit="return pelanggan()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_pelanggan">Kode pelanggan</label>
                    <input type="text" class="form-control" name="kd_pelanggan" id="kd_pelanggan" value="<?php echo "$kd_pelanggan"?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label for="nama_pelanggan">Nama pelanggan</label>
                    <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Input Nama pelanggan">
                  </div>
                  <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <lable><input type="radio" name="jenis_kelamin" class="minimal" value="laki-laki" style="margin-left:40px" checked> laki-laki </lable>
                    <lable><input type="radio" name="jenis_kelamin" class="minimal" value="perempuan" style="margin-left:20px"> perempuan </lable>
                  </div>
                  <div class="form-group">
                    <label for="telp_pelanggan">Telepon</label>
                    <input type="text" class="form-control" name="telp_pelanggan" id="telp_pelanggan" placeholder="Input Telepon">
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Input Email">
                  </div>
                  </div>
        <!-- /.card-body -->
                <div class="card-footer">
                  <div class="modal-footer">
                  <?php
                  $a='';
                  $b='';
                  $c='';
                  echo"<a href=\"index.php?kd_booking=$a&tgl_booking=$b&kd_pelanggan=$c\"><button type=\"button\" class=\"btn btn-danger pull-right\" style=\"margin-left: 10px;\"  data-dismiss=\"modal\">Tutup</button><a>
                  ";?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  
                  </div>
                </div>
              </div>
            </form>
            
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

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
  <?php include 'jscript.php' ?>

</body>
</html>
