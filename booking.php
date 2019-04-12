<?php
  include 'config.php';
  
?>
<!DOCTYPE html>
<html>
 <?php

  if ($_GET['kd_booking']=='') {
    # Berikan kd_booking Otomatis
    $carikd_booking = mysqli_query($connect,"SELECT MAX(kd_booking) FROM booking");
    $datakd_booking = mysqli_fetch_array($carikd_booking);

    $nomor = intval(substr($datakd_booking[0],2));

    $tambah = $nomor + 1;
    $kd_booking = sprintf("B%03d", $tambah);
  } else {
    # Gunakan kd_booking Sebelumnya
    $kd_booking = $_GET['kd_booking'];
  }
  
  if ($_GET['tgl_booking']=='') {
    $tgl_booking = '';
  } else {
    $tgl_booking = $_GET['tgl_booking'];
  }
   if ($_GET['kd_pelanggan']=='') {
    $kd_pelanggan = '';
  } else {
    $kd_pelanggan = $_GET['kd_pelanggan'];
  }

?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Leha-leha Spa | Data Booking</title>
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
  <div class="container ">

       <!--<center><img src="lehaleha2.png" width="350px"></center>-->
  
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->

          <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title">Form Booking Treatment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="input_booking.php" method="post" onsubmit="return booking()" name="form">
                <div class="card-body">
                  <table>
                  <tr>
                    <td><strong>Kode Booking</strong></td>
                    <td>:</td>
                    <td><input type="text" name="kd_booking" id="kd_booking"  style="margin-right: 45px; width:165px;" value="<?php echo $kd_booking ?>" readonly="readonly"></input></td>
                    <td style="width:50px;"></td>
                    <td><strong>Tanggal Booking</strong></td>
                    <td>:</td>
                    <td>
                    <?php if ($tgl_booking != ''){ ?>
                    <input type="text" name="tgl_booking" class="datepicker"  style="width:145px" size="22" value="<?php echo $tgl_booking ?>">
                    <?php } else {?>
                    <input type="date" name="tgl_booking"  style="width:145px" size="22" value="<?php echo $tgl_booking ?>">
                    <?php } ?>
                    <i class="fa fa-calendar"></i>
                    </td>
                  </tr>
                  <tr><td colspan="8"><hr></td></tr>
                  <tr><td colspan="8"><br></td></tr>
                  <tr>
                  <td><strong>Pelanggan</strong></td>
                  <td>:</td>
                    <td colspan="5"><select name="kd_pelanggan" id="kd_pelanggan" size="1px" style=" width:540px" >
                    <option>--pilih pelanggan--</option>
                    <?php
                    
                    if($kd_pelanggan!=''){
                    $cari = mysqli_query($connect,"SELECT * FROM pelanggan WHERE kd_pelanggan='$kd_pelanggan'");
                      $a=mysqli_fetch_array($cari);?>
                      <option selected value="<?php echo "$kd_pelanggan" ?>"><?php echo "$a[nama_pelanggan]"; ?></option>
                                      
                    <?php }else{
                    $tampil = "SELECT * FROM pelanggan ORDER BY nama_pelanggan";
                    $hasil  = mysqli_query($connect, $tampil);
                    while($data=mysqli_fetch_array($hasil)){
                       echo"<option value=\"$data[kd_pelanggan]\">$data[nama_pelanggan]</option>";}
                    }
                       
                    ?>
                    
                    </select>
                    </td>
                    <td>
                    <?php
                    if($kd_pelanggan!=''){ ?>
                    <a href="pelanggan.php"><button type="button" class="btn btn-info" data-dismiss="modal" disabled="disabled">+</button><a>
                    <?php } else { ?>
                    <a href="pelanggan.php"><button type="button" class="btn btn-primary" data-dismiss="modal">+</button><a>
                    <?php } ?>
                    </td>
                  </tr>
                 
            <?php
              if(!$connect){
              die ("Connection failed: ".mysqli_connect_error());
              }

              $treatment=mysqli_query($connect, "SELECT * FROM treatment");
              $jsArray = "var hrg_trm = new Array();\n"; 
            ?>
            <!-- /.card-header -->
                  <tr>
                  <td><strong>Treatment</strong></td>
                  <td>:</td>
                  <td colspan="5"><select id="kd_treatment" size="1px" name="kd_treatment" style="width:540px" onchange="changeValue(this.value)">
                    <option><center>--pilih treatment--</center></option>
                    <?php if(mysqli_num_rows($treatment)) {?>
                    <?php while($row_brg= mysqli_fetch_array($treatment)) {?>
                        <option value="<?php echo $row_brg["kd_treatment"]?>"> <?php echo $row_brg["nama_treatment"]?> </option>
                    <?php $jsArray .= "hrg_trm['" . $row_brg['kd_treatment'] . "'] = {harga:'" . addslashes($row_brg['harga']) . "'};\n"; } ?>
                    <?php } ?>}:
                    ?>
                    </select>
                  </td>
                  </tr>
                  
            <script type="text/javascript">
            <?php echo $jsArray; ?>
              function changeValue(kd_treatment) {
              document.getElementById("harga").value = hrg_trm[kd_treatment].harga;
            };</script>
            
            </table>
            <table>
            <tr><td colspan="12"><hr></td></tr>
            <tr>
            <td><strong>Harga</strong></td>
            <td>:</td> 
            <td><input type="text" name="harga" style="width:130px;" size="10" id="harga" onclick="Hitung();" readonly="readonly"></input></td>
            <td style="width:50px;"></td>
            <td><strong>Service</strong></td>
            <td>:</td> 
            <td><input type="text" name="serv" style=" width:130px;" size="10" size="5" id="serv" readonly="readonly"></input></td>
            <td style="width:50px;"></td>
            <td><strong>Tax</strong></td>
            <td>:</td>
            <td><input type="text" name="tax" style="width:130px;" size="10"  size="5" id="tax" readonly="readonly"></input></td>
            </tr>
            <tr>
            <td><strong>Subtotal</strong></td>
            <td>:</td> 
            <td><input type="text" name="subtotal" style="width:130px;" size="10" id="subtotal" readonly="readonly"></input></td>
            </tr>
            <tr>
            <td colspan="12">
            <input type="submit" class="btn btn-primary pull-right" style="margin-left: 10px;"  value="Tambah" ></input></td>
            </td>
            </tr>
            </table>
            <script type="text/javascript">
            function Hitung(){
              var harga = document.getElementById('harga').value;
              var service = 0.05 * parseInt(harga);
              var tax = 0.10 * parseInt(harga);
              var result = parseInt(service)+parseInt(tax)+parseInt(harga);
              if (!isNaN(service)) {
                document.getElementById('serv').value = service;
                }
              if (!isNaN(tax)){
                document.getElementById('tax').value = tax;
              }
              if (!isNaN(result)){
                document.getElementById('subtotal').value = result;
              }
            }
            </script>
            </form>
            
        <!-- /.card-footer-->
      </div>
            <div class="card-body">
            <?php
            $hasil2 =  mysqli_query($connect, "SELECT * FROM detail_booking INNER JOIN treatment ON treatment.kd_treatment=detail_booking.kd_treatment  WHERE kd_booking = '$_GET[kd_booking]'")or die(mysqli_error($connect));
            $titip =  mysqli_query($connect, "SELECT * FROM detail_booking INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking INNER JOIN pelanggan ON pelanggan.kd_pelanggan=booking.kd_pelanggan WHERE detail_booking.kd_booking = '$_GET[kd_booking]'")or die(mysqli_error($connect));
            $titip2=mysqli_fetch_array($titip) or die(mysqli_error($connect));
              echo "<table id=\"example1\" class= \"table table-bordered table-striped\">
                <thead>
                <tr>
                  <th>Treatment</th>
                  <th>Harga</th>
                  <th>service</th>
                  <th>Tax</th>
                  <th>Sub Total</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>";
                while ($data=mysqli_fetch_array($hasil2)){
                echo "
                <tr>
                  <td>$data[nama_treatment]</td>
                  <td>$data[harga]</td>
                  <td>$data[serv]</td>
                  <td>$data[tax]</td>
                  <td>$data[subtotal]</td>
                  <td><a href=\"hapus2.php?kd_detail_booking=$data[kd_detail_booking]&kd_booking=$titip2[kd_booking]&kd_pelanggan=$titip2[kd_pelanggan]&tgl_booking=$titip2[tgl_booking]\" class=\"fa fa-trash\"></a></td> 
                  </tr>";
                  }
                 echo"</tfoot>
                </table>";
              ?>

            </div>
        <!-- /.card-body -->
                <form action="proses_booking.php" method="POST">
                        <?php

                          $kd_booking=$_GET['kd_booking'];
                          $tampil = mysqli_query($connect,"SELECT SUM(subtotal) AS 'total',SUM(treatment.lama) AS 'l' FROM detail_booking INNER JOIN treatment ON treatment.kd_treatment=detail_booking.kd_treatment WHERE kd_booking = '$kd_booking'")or die(mysqli_error($connect));

                          while ($data=mysqli_fetch_array($tampil)) {
                          $kd_pelanggan=$_GET['kd_pelanggan'];
                          $cari=mysqli_query($connect,"SELECT * FROM pelanggan WHERE kd_pelanggan = '$kd_pelanggan'")or die(mysqli_error($connect));
                          $a=mysqli_fetch_array($cari);
                          if ($a['status']!='member'){
                            $disc=0;
                          }
                          else{
                            $disc=0.3;
                          }
                          $diskon=$data['total']*$disc;
                          $totpem=$data['total']-$diskon;
                          $lama=$data['l'];
                        ?>
                        <div class="col-md-5 form-inline">
                          <strong>Diskon</strong>
                          <input type="text" name="diskon" class="form-control" style="margin-left: 92px;" value="<?=$diskon;?>"></input>
                        </div><br>
                        <div class="col-md-5 form-inline">
                          <strong>Total Pembayaran</strong>
                          <input type="text" name="total" class="form-control" style="margin-left: 10px;" value="<?=$totpem;?>"></input>
                        </div><br>
                         <input type="text" name="lama" value="<?=$lama;?>" hidden>
                         <?php
                           
                              }?>
                        <div class="col-md-5 form-inline">
                        <label>Waktu Check in</label>
                        <select id="jam" name="jam" style="margin-left:30px;">
                        <?php
                        $cek=mysqli_query($connect,"SELECT * FROM booking WHERE kd_booking = '$kd_booking'")or die(mysqli_error($connect));
                        $tes=mysqli_fetch_array($cek);
                        $jam=$tes['check_in']/60;
                        $h=floor($jam);
                        $mnt=$tes['check_in']%60;
                        for($i=00; $i<=24; $i++){ 
                        ?>
                          <option value="<?php echo $i ?>" <?php if($i==$h){ ?> selected <?php ; } ?>> <?php $s=sprintf("%02d", $i); echo $s ?></option>
                        <?php
                        }
                        ?>
                        </select>:
                        <select id="mnt" name="mnt">
                        <?php
                        for($i=00; $i<=60; $i++){ 
                        ?>
                          <option value="<?php echo $i ?>" <?php if($i==$mnt){ ?> selected <?php } ?>> <?php $s=sprintf("%02d", $i); echo $s ?></option>
                        <?php
                        }
                        ?>
                        </select>
                        </div><br>
                        <input id="kd_booking" name="kd_booking" type="text" value="<?php echo $kd_booking ?>" hidden></input>
                         <input id="tgl_booking" name="tgl_booking" type="text" value="<?php echo $tgl_booking ?>" hidden></input>
                          <input id="kd_pelanggan" name="kd_pelanggan" value="<?php echo $kd_pelanggan ?>" type="text" hidden></input>

                          <a href="index.php"><button type="button" class="btn btn-danger pull-right" style="margin-left: 10px;"  data-dismiss="modal">Tutup</button><a>
                          <input type="submit" class="btn btn-primary pull-right" style="margin-left: 10px;" value="Simpan"></input>
                        
                      </form>
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
