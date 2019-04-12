
<?php
// memanggil library FPDF
require('fpdf.php');
include 'config.php';
$aa =  mysqli_query($connect, "SELECT DATE_FORMAT(tgl_booking, '%d-%m-%Y' ) AS tgl_booking FROM booking WHERE tgl_booking='$_POST[tgl]'")or die(mysqli_error($connect));
$bb=$data=mysqli_fetch_array($aa);
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'Leha-leha Spa',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'QUICK BOOK DATA (QBD)',0,1,'C');
$pdf->Cell(190,7,$bb['tgl_booking'],0,1,'C'); 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);

$pdf->Cell(85,6,'Kategori Treatment',1,0);
$pdf->Cell(20,6,'Harga',1,0);
$pdf->Cell(20,6,'Service',1,0);
$pdf->Cell(27,6,'Tax',1,0);
$pdf->Cell(25,6,'Total',1,1);
 
$pdf->SetFont('Arial','',10);
 
$hasil = mysqli_query($connect, "select * from kategori_treatment ORDER BY nama_kategori");
while ($row = mysqli_fetch_array($hasil)){
	$kd_kategori=$row['kd_kategori'];
    $tampil=mysqli_query($connect,"SELECT SUM(detail_booking.harga) AS 'harga',SUM(detail_booking.serv) AS 'serv',SUM(detail_booking.tax) AS 'tax' FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN booking ON detail_booking.kd_booking=booking.kd_booking where kd_kategori ='$kd_kategori' AND status_book='check in' AND tgl_booking='$_POST[tgl]' OR kd_kategori ='$kd_kategori' AND status_book='check out' AND tgl_booking='$_POST[tgl]'")or die(mysqli_error($connect));
    $a=mysqli_fetch_array($tampil)or die(mysqli_error($connect));
    $harga=$a['harga'];
    $tax=$a['tax'];
    $serv=$a['serv'];
    $subtotal=$harga+$tax+$serv;
    $pdf->Cell(85,6,$row['nama_kategori'],1,0);
    $pdf->Cell(20,6,$harga,1,0);
    $pdf->Cell(20,6,$serv,1,0);
    $pdf->Cell(27,6,$tax,1,0);
    $pdf->Cell(25,6,$subtotal,1,1); 
}
$pdf->Cell(10,7,'',0,1);
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','',10);
// mencetak string 
$pdf->Cell(65,7,'Total Penjualan Treatment');
$pdf->Cell(50,7,$_POST['treatment'],1,1);
$pdf->Cell(65,7,'Total Penjualan produk');
$pdf->Cell(50,7,$_POST['produk'],1,1);
$pdf->Cell(65,7,'Total Penjualan Keseluruhan');
$pdf->Cell(50,7,$_POST['produk'],1,1);
$pdf->Cell(65,7,'Total Pembelian');
$pdf->Cell(50,7,$_POST['beli'],1,1);

$pdf->Output();
?>

