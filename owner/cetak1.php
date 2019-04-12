
<?php
// memanggil library FPDF
require('fpdf.php');
include 'config.php';
$aa =  mysqli_query($connect, "SELECT DATE_FORMAT(tgl_booking, '%d-%m-%Y' ) AS tgl_booking FROM booking WHERE tgl_booking='$_POST[tgl]'")or die(mysqli_error($connect));
$bb=$data=mysqli_fetch_array($aa);
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(280,7,'Leha-leha Spa',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(280,7,'DAILY SALES AND EXPENSE',0,1,'C');
$pdf->Cell(280,7,$bb['tgl_booking'],0,1,'C');

 // Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Treatment',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(33,6,'Kode Booking',1,0);
$pdf->Cell(60,6,'Treatment',1,0);
$pdf->Cell(30,6,'Harga',1,0);
$pdf->Cell(30,6,'Service',1,0);
$pdf->Cell(30,6,'Tax',1,0);
$pdf->Cell(37,6,'Subtotal',1,0);
$pdf->Cell(60,6,'Therapist',1,1);
 
$pdf->SetFont('Arial','',12);
 
$tgl=$_POST['tgl'];
$hasil =  mysqli_query($connect, "SELECT booking.tgl_booking,detail_booking.kd_booking,treatment.nama_treatment,detail_booking.harga,detail_booking.serv,detail_booking.tax,detail_booking.subtotal,therapist.nama_therapist FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN therapist ON detail_booking.kd_therapist=therapist.kd_therapist INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking WHERE status_book='check in' AND tgl_booking='$tgl' OR status_book='check out' AND tgl_booking='$tgl' ");
            
while ($row = mysqli_fetch_array($hasil)){
    $x_axis=$pdf->getx();
    $text="aim success ";// content 
    $pdf->vcell(33,15,$x_axis,$row['kd_booking']);// pass all values inside the cell 
    $x_axis=$pdf->getx();
    $pdf->vcell(60,15,$x_axis,$row['nama_treatment']);
    $x_axis=$pdf->getx();
    $pdf->vcell(30,15,$x_axis,$row['harga']);
    $x_axis=$pdf->getx();
    $pdf->vcell(30,15,$x_axis,$row['serv']);
    $x_axis=$pdf->getx();
    $pdf->vcell(30,15,$x_axis,$row['tax']);
    $x_axis=$pdf->getx();
    $pdf->vcell(37,15,$x_axis,$row['subtotal']);
    $x_axis=$pdf->getx();
    $pdf->vcell(60,15,$x_axis,$row['nama_therapist']);
    $pdf->Ln();
	}
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(280,7,'Leha-leha Spa',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(280,7,'DAILY SALES AND EXPENSE',0,1,'C');
$pdf->Cell(280,7,$bb['tgl_booking'],0,1,'C');
 // Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Produk',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'Kode Penjualan',1,0);
$pdf->Cell(70,6,'Produk',1,0);
$pdf->Cell(40,6,'Harga',1,0);
$pdf->Cell(40,6,'Qty',1,0);
$pdf->Cell(47,6,'Subtotal',1,1);
 
$pdf->SetFont('Arial','',12);
 
 $hasil =  mysqli_query($connect, "SELECT * FROM detail_penjualan INNER JOIN produk ON detail_penjualan.kd_produk=produk.kd_produk INNER JOIN penjualan ON penjualan.kd_penjualan=detail_penjualan.kd_penjualan WHERE tgl_transaksi='$tgl'")or die(mysqli_error($connect));
                        
while ($row = mysqli_fetch_array($hasil)){
     $x_axis=$pdf->getx();
    $text="aim success ";// content 
    $pdf->vcell(40,15,$x_axis,$row['kd_penjualan']);
    $x_axis=$pdf->getx();
    $pdf->vcell(70,15,$x_axis,$row['nama_produk']);
    $x_axis=$pdf->getx();
    $pdf->vcell(40,15,$x_axis,$row['harga']);
    $x_axis=$pdf->getx();
    $pdf->vcell(40,15,$x_axis,$row['qty']);
    $x_axis=$pdf->getx();
    $pdf->vcell(47,15,$x_axis,$row['subtotal']);
    $pdf->Ln();
    }

$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(280,7,'Leha-leha Spa',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(280,7,'DAILY SALES AND EXPENSE',0,1,'C');
$pdf->Cell(280,7,$bb['tgl_booking'],0,1,'C');
 // Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'Barang Masuk',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'Kode Terima',1,0);
$pdf->Cell(70,6,'Produk',1,0);
$pdf->Cell(40,6,'Harga',1,0);
$pdf->Cell(40,6,'Qty',1,0);
$pdf->Cell(47,6,'Subtotal',1,1);
 
$pdf->SetFont('Arial','',12);
 
 $hasil =  mysqli_query($connect, "SELECT * FROM barang_masuk INNER JOIN produk ON barang_masuk.kd_produk=produk.kd_produk WHERE tgl_terima='$tgl'")or die(mysqli_error($connect));
                                   
while ($row = mysqli_fetch_array($hasil)){
    $x_axis=$pdf->getx();
    $text="aim success ";// content 
    $pdf->vcell(40,15,$x_axis,$row['kd_terima']);
    $x_axis=$pdf->getx();
    $pdf->vcell(70,15,$x_axis,$row['nama_produk']);
    $x_axis=$pdf->getx();
    $pdf->vcell(40,15,$x_axis,$row['harga_beli']);
    $x_axis=$pdf->getx();
    $pdf->vcell(40,15,$x_axis,$row['jumlah']);
    $x_axis=$pdf->getx();
    $pdf->vcell(47,15,$x_axis,$row['subtotal']);
    $pdf->Ln();
    } 
$pdf->Output();
?>

