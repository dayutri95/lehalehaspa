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
  <title>Laporan Barang Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <?php include 'style.php'; ?>
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-success navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item"><a href="bulanan.php" class="nav-link"> Penjualan Treatment </a></li>
      <li class="nav-item"><a href="bulan_produk.php" class="nav-link">Penjualan Produk</a></li>
      <li class="nav-item"><a href="bulan_pembelian.php" class="nav-link">Barang Masuk</a></li>
    </ul>
    
    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      

    </ul>
    
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
            <!-- Menu toggle button -->
            <a href="../logout.php">
              <i class="fa fa-power-off"></i> Logout

            </a>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <!-- Tasks Menu -->
          
      </div>
  </nav>
  <!-- /.navbar -->

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
            <h1>Laporan Barang Masuk Bulanan</h1>
          </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div id="content-wrapper">
      <div class="container-fluid">
        <div class="card mb-3">
          
          <div class="card-body">

            <form style="margin-right:5px; margin-top:0px" class="pull-left" action="" method="GET">
                  <select name="bulan" style="padding:4px" required>
                  <option value="">-- Pilih Bulan --</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
              </select>

              &nbsp;
                
              <select name="tahun" style="padding:4px" required>
                <option value="">-- Pilih Tahun --</option>
                <?php
                  $now=date('Y');
                  for ($a=2018;$a<=$now;$a++){
                       echo "<option value='$a'>$a</option>";
                  }
                ?>
              </select>
               
               &nbsp;     
              <input type="submit" style="margin-top:-4px" class="btn btn-primary btn-sm" value="Lihat">
            </form>

            <?php
              if (!isset($_GET['bulan']) && !isset($_GET['tahun'])){
            ?>
                <center style="padding:60px; color:red">Silahkan pilih bulan & tahun terlebih dahulu...</center>
            <?php
              }elseif($_GET['bulan'] == "" && $_GET['tahun'] == ""){
            ?>
                <center style="padding:60px; color:red">Silahkan pilih bulan & tahun terlebih dahulu...</center>
            <?php
              }else{
                echo '<br />';
                    $tahun = $_GET['tahun'];
                    $bulan = $_GET['bulan'];

                    // jalankan query untuk menampilkan semua data 
                    $query = "SELECT * FROM detail_booking INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking WHERE tgl_booking LIKE '$tahun-$bulan%'";
                    $result = mysqli_query($connect, $query);

                    //mengecek apakah ada error ketika menjalankan query
                    if(!$result){
                    die ("Query Error: ".mysqli_errno($connect).
                      " - ".mysqli_error($connect));
                    }

                    $query2 = "SELECT count(*) as hitung FROM detail_booking INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking WHERE tgl_booking LIKE '$tahun-$bulan%'";
                    $ada = mysqli_query($connect, $query2);
                    $cekdata=mysqli_fetch_assoc($ada);
                    if($cekdata['hitung'] < 1){
                      echo "<script language='javascript'>
                        alert('Data barang masuk tidak ditemukan atau masih kosong');
                        window.location='bulan_pembelian.php'
                      </script>";
                    }else{
                      if($bulan == 1){
                      $bulan_baru = "Januari";
                       }elseif($bulan == 2){
                        $bulan_baru = "Februari";
                         }elseif($bulan == 3){
                        $bulan_baru = "Maret";
                        }elseif($bulan == 4){
                         $bulan_baru = "April";
                         }elseif($bulan == 5){
                           $bulan_baru = "Mei";
                         }elseif($bulan == 6){
                         $bulan_baru = "Juni";
                         }elseif($bulan == 7){
                         $bulan_baru = "Juli";
                         }elseif($bulan == 8){
                         $bulan_baru = "Agustus";
                         }elseif($bulan == 9){
                        $bulan_baru = "September";
                          }elseif($bulan == 10){
                           $bulan_baru = "Oktober";
                           }elseif($bulan == 11){
                          $bulan_baru = "November";
                          }elseif($bulan == 12){
                          $bulan_baru = "Desember";
                      }
                      echo"<br /><br />";
                       echo "<center><h3>Data Barang Masuk Bulan <b>$bulan_baru $tahun</b></h3></center>";
                  ?>
                  <p><br></p>
                 <?php 
        $cari = mysqli_query($connect, "SELECT sum(subtotal) as 'jumlah' FROM barang_masuk where tgl_terima LIKE '$tahun-$bulan%'");
        $total=mysqli_fetch_assoc($cari);
        ?>
        <h4><?php echo"Total Pembelian : ";?><b>Rp. <?php echo "".number_format($total['jumlah'],2,",","."); ?></b></h4> 
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode produk</th>
                      <th>Produk</th>
                      <th>Harga Beli</th>
                      <th>Harga Jual</th>
                      <th>Jumlah</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                
                  <tbody>
                    <?php               
                      // jalankan query untuk menampilkan semua data 
                      $query = "SELECT * FROM produk ORDER BY kd_produk";
                      $result = mysqli_query($connect, $query);
                      //mengecek apakah ada error ketika menjalankan query
                      if(!$result){
                        die ("Query Error: ".mysqli_errno($connect).
                        " - ".mysqli_error($connect));
                      }

                      //buat perulangan untuk element tabel dari data pelanggan
                      $no = 1; //variabel untuk membuat nomor urut
                      // hasil query akan disimpan dalam variabel $data dalam bentuk array
                      // kemudian dicetak dengan perulangan while
                      while($data = mysqli_fetch_assoc($result)){
                        $kd_produk=$data['kd_produk'];
                        $tampil=mysqli_query($connect,"SELECT sum(barang_masuk.jumlah) as 'jumlah',barang_masuk.harga_beli,produk.harga_jual, SUM(barang_masuk.subtotal) AS 'subtotal' FROM barang_masuk INNER JOIN produk ON barang_masuk.kd_produk=produk.kd_produk where barang_masuk.kd_produk ='$kd_produk'AND tgl_terima LIKE '$tahun-$bulan%'")or die(mysqli_error($connect));
                        $a=mysqli_fetch_array($tampil)or die(mysqli_error($connect));
                        // mencetak / menampilkan data
                        echo "<tr>";
                        echo "<td>$data[kd_produk]</td>"; 
                        echo "<td>$data[nama_produk]</td>"; 
                        echo "<td>$a[harga_beli]</td>";
                        echo "<td>$a[harga_jual]</td>";
                        echo "<td>$a[jumlah]</td>";                                     
                        echo "<td>$a[subtotal]</td>";
                        echo "</tr>";
                        $no++; // menambah nilai nomor urut
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
          }
        ?>
      </div>
    </div>
  </div>

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
<?php include 'jscript.php' ?>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
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
