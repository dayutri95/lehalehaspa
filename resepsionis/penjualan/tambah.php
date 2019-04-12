<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] !="login"){
  header("location:../../login.php");}
?>
<!DOCTYPE html>
<html>
 <?php

  if ($_GET['kd_penjualan']=='') {
    # Berikan kd_penjualan Otomatis
    $carikd_penjualan = mysqli_query($connect,"SELECT MAX(kd_penjualan) FROM penjualan");
    $datakd_penjualan = mysqli_fetch_array($carikd_penjualan);

    $nomor = intval(substr($datakd_penjualan[0],2));

    $tambah = $nomor + 1;
    $kd_penjualan = sprintf("PP%03d", $tambah);
  } else {
    # Gunakan kd_penjualan Sebelumnya
    $kd_penjualan = $_GET['kd_penjualan'];
  }
  
  if ($_GET['tgl_transaksi']=='') {
    $tgl_transaksi = '';
  } else {
    $tgl_transaksi = $_GET['tgl_transaksi'];
  }
  

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data penjualan</title>
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
            <h1>Data penjualan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input.php" method="post" onsubmit="return penjualan()" name="form">
                <div class="card-body">
                <table>
                    <tr><td><strong>Kode Penjualan</strong></td>
                    <td style="width:5px;"></td>
                    <td>:</td>
                    <td><input type="text" name="kd_penjualan" id="kd_penjualan"  style=" width:172px" value="<?php echo $kd_penjualan ?>" readonly="readonly"></input></td>
                    <td style="width:100px;"></td>
                    <td><strong>Tanggal Transaksi</strong></td>
                    <td style="width:5px;"></td>
                    <td>:</td>
                      <?php if ($tgl_transaksi != ''){ ?>
                    <td colspan="5"><input type="text" name="tgl_transaksi" class="datepicker"  style="width:172px;margin-right:5px;" size="22" value="<?php echo $tgl_transaksi ?>"><i class="fa fa-calendar"></i></td>
                    <?php } else {?>
                    <td colspan="5"><input type="date" name="tgl_transaksi" style="width:172px;margin-right:5px" size="22" value="<?php echo $tgl_transaksi ?>"><i class="fa fa-calendar"></i></td>
                    <?php } ?>
                    </tr>  
            <?php
              if(!$connect){
              die ("Connection failed: ".mysqli_connect_error());
              }

              $produk=mysqli_query($connect, "SELECT * FROM produk");
              $jsArray = "var hrg_trm = new Array();\n"; 
            ?>
            <!-- /.card-header -->
            <tr><td colspan="11"><hr></td></tr>
            <tr><td colspan="11"><br></td></tr>
            </table>
            <table>
                  <tr>
                  <td><strong>Produk</strong></td>
                  <td>:</td>
                    <td colspan="9"><select id="kd_produk" style="width:660px" name="kd_produk"  onchange="changeValue(this.value)">
                    <option>--pilih produk--</option>
                    <?php if(mysqli_num_rows($produk)) {?>
                    <?php while($row_brg= mysqli_fetch_array($produk)) {?>
                        <option value="<?php echo $row_brg["kd_produk"]?>"> <?php echo $row_brg["nama_produk"]?> </option>
                    <?php $jsArray .= "hrg_trm['" . $row_brg['kd_produk'] . "'] = {harga:'" . addslashes($row_brg['harga_jual']) . "'};\n"; } ?>
                    <?php } ?>}:
                    ?>
                    </select></td></tr>
            <script type="text/javascript">
            <?php echo $jsArray; ?>
              function changeValue(kd_produk) {
              document.getElementById("harga").value = hrg_trm[kd_produk].harga;
            };</script>
            <tr><td><br></td></tr>
            <tr>
            <td><strong>Harga</strong></td>
            <td>:</td> 
            <td><input type="text" name="harga" size="10" style="width:172px" id="harga" onkeyup="Hitung();" readonly="readonly"></input></td>
            <td style="width:50px"></td>
            <td><strong>Qty</strong></td>
            <td>:</td>
            <td><input type="text" name="qty"  size="10" id="qty" style="width:100px" onkeyup="Hitung();"></input></td>
            <td style="width:50px"></td>
            <td><strong>Subtotal</strong></td>
            <td>:</td> 
            <td><input type="text" name="subtotal" style="width:172px" size="10" id="subtotal" readonly="readonly"></input></td>
            </tr>
            <tr><td><br></td></tr>
            <tr><td colspan="11">
            <input type="submit" class="btn btn-primary pull-right" style="margin-left: 10px;"  value="Tambah" ></input>
            </td></tr>
            <script type="text/javascript">
            function Hitung(){
              var harga = document.getElementById('harga').value;
              var qty = document.getElementById('qty').value;
              var result = parseInt(qty)*parseInt(harga);
              if (!isNaN(result)){
                document.getElementById('subtotal').value = result;
              }
            }
            </script>
            </table>
            </form>
            
            
        <!-- /.card-footer-->
      </div>
            <div class="card-body">
            <?php
            $hasil2 =  mysqli_query($connect, "SELECT * FROM detail_penjualan INNER JOIN produk ON produk.kd_produk=detail_penjualan.kd_produk WHERE kd_penjualan = '$_GET[kd_penjualan]'")or die(mysqli_error($connect));
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Sub Total</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil2)){
                echo "
                <tr>
                  <td>$data[nama_produk]</td>
                  <td>$data[harga]</td>
                  <td>$data[qty]</td>
                  <td>$data[subtotal]</td>
                  <td><a href=\"hapus2.php?kd_detail_penjualan=$data[kd_detail_penjualan]\" class=\"fa fa-trash\"></a></td> 
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>

            </div>
        <!-- /.card-body -->
                <form action="proses_penjualan.php" method="POST">
                        <?php

                          $kd_penjualan=$_GET['kd_penjualan'];
                          $tampil = mysqli_query($connect,"SELECT SUM(subtotal) AS 'total' FROM detail_penjualan WHERE kd_penjualan = '$kd_penjualan'")or die(mysqli_error($connect));

                          while ($data=mysqli_fetch_array($tampil)) {
                        ?>
                        <div class="col-md-5 form-inline">
                          <strong>Total Pembayaran</strong>
                          <input type="text" name="total" class="form-control" style="margin-left: 10px;" value="<?=$data['total'];?>"></input>
                        </div><br>
                         <?php
                           
                              }?>
                        <input id="kd_penjualan" name="kd_penjualan" type="text" value="<?php echo $kd_penjualan ?>" hidden></input>
                         <input id="tgl_transaksi" name="tgl_transaksi" type="text" value="<?php echo $tgl_transaksi ?>" hidden></input>
                          <a href="index.php"><button type="button" class="btn btn-danger pull-right" style="margin-left: 10px;"  data-dismiss="modal">Tutup</button><a>
                          <input type="submit" class="btn btn-primary pull-right" style="margin-left: 10px;" value="Simpan"></input>
                        
                      </form>
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
  <?php include '../jscript2.php' ?>

</body>
</html>
