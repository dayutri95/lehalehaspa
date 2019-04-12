<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
  $caribarang_masuk = mysqli_query($connect,"SELECT MAX(kd_terima) FROM barang_masuk");
    $databarang_masuk = mysqli_fetch_array($caribarang_masuk);

    $nomor = intval(substr($databarang_masuk[0],2));

    $tambah = $nomor + 1;
    $barang_masuk = sprintf("BM%03d", $tambah);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data Barang Masuk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include '../style2.php' ?>
  <!-- Font Awesome -->
  </head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php include '../top.php' ?>
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
    <?php
// KONEKSI DATABASE
if(!$connect){
  die ("Connection failed: ".mysqli_connect_error());
}

// TAMPILKAN DATA BARANG DAN HARGA
$produk=mysqli_query($connect, "SELECT * FROM produk");
$jsArray = "var stok_awal = new Array();\n"; 

?>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Barang Masuk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" method="post" onsubmit="return barang_masuk()" name="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kd_terima">Kode Terima</label>
                    <input type="text" class="form-control" name="kd_terima" id="kd_terima" value="<?php echo"$barang_masuk" ?>" readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Terima</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div> 
                      <input type="date" name="tgl_terima" id="tgl_terima"/>
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="produk">Produk</label>
                    <select class="form-control" id="kd_produk" name="kd_produk" onchange="changeValue(this.value)">
                    <option>--pilih produk--</option>
                    <?php if(mysqli_num_rows($produk)) {?>
                    <?php while($row_brg= mysqli_fetch_array($produk)) {?>
                        <option value="<?php echo $row_brg["kd_produk"]?>"> <?php echo $row_brg["nama_produk"]?> </option>
                    <?php $jsArray .= "stok_awal['" . $row_brg['kd_produk'] . "'] = {stok:'" . addslashes($row_brg['stok']) . "'};\n"; } ?>
                    <?php } ?>}:
                    ?>
                    </select>
                     </div>
                  
                  <div class="form-group">
                    <label for="harga_beli">Harga Beli</label>
                    <input type="text" class="form-control" name="harga_beli" id="harga_beli" onkeyup="sum();" placeholder="Input Harga Beli">
                  </div>
                  <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" onkeyup="sum();" placeholder="Input jumlah">
                  </div>
                  <div class="form-group">
                    <label for="jual">Harga Jual</label>
                    <input type="number" class="form-control" name="jual" id="jual" onkeyup="sum();" readonly="readonly" >
                  </div>
                  <div class="form-group">
                    <label>Stok Awal</label>
                    <td><input type="text" class="form-control" name="stok" id="stok" value="0" onkeyup="sum();" readonly="readonly"></td>
                  </div>
                  <div class="form-group">
                    <label>Stok Akhir</label>
                    <input type="text" class="form-control" name="akhir" id="akhir"  readonly="readonly">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Kadaluarsa</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div> 
                    <input type="date" class="datepicker" name="tgl_kadaluarsa" id="tgl_kadaluarsa">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="subtotal">Jumlah Pembayaran</label>
                    <input type="number" class="form-control" name="subtotal" id="subtotal" readonly="readonly">
                  </div>
                  </div>
        <!-- /.card-body -->
                <div class="card-footer">
                  <div class="modal-footer">
                    <a href="index.php"><button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button><a>
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

  <?php include '../footer.php' ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(barang_masuk) {
      document.getElementById("stok").value = stok_awal[barang_masuk].stok;
    };</script>
  <?php include '../jscript2.php' ?>

</body>
</html>
