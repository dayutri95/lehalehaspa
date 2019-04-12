
<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm',array(200,100));
// membuat halaman baru
$pdf->AddPage();
$pdf->SetMargins(1,1,1,1);
// setting jenis font yang akan digunakan
$pdf->Cell(50,0,'',0,1,'');
// mencetak string 

$pdf->Image('../../lehaleha.jpg',35,0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,13,'',0,1,'');

$pdf->Cell(50,4,'Jl. Sudamala No.5, Sanur, Bali',0,1,'');
$pdf->Cell(50,4,'Telp : +62 811 3995510',0,1,'');
$pdf->Cell(50,3,'',0,1,'');
$pdf->SetLineWidth(0.8);
$pdf->Line(2,35,98,35);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,1,'',0,1);
 
$pdf->SetFont('Arial','',8);
$pdf->Cell(3,6,'');
$pdf->Cell(37,6,'Treatment');
$pdf->Cell(16,6,'Harga');
$pdf->Cell(14,6,'Serv');
$pdf->Cell(14,6,'Tax');
$pdf->Cell(25,6,'Subtotal',0,1);

$pdf->SetLineWidth(0.1);
$pdf->Line(2,41,98,41);

 
include '../config.php';
$kd_booking=$_GET['kd_booking'];
$hasil =  mysqli_query($connect, "SELECT booking.total, booking.diskon, treatment.nama_treatment,detail_booking.harga,detail_booking.serv,detail_booking.tax,detail_booking.subtotal FROM detail_booking INNER JOIN treatment ON detail_booking.kd_treatment=treatment.kd_treatment INNER JOIN booking ON booking.kd_booking=detail_booking.kd_booking WHERE booking.kd_booking='$kd_booking' ORDER BY nama_treatment")or die(mysqli_error($connect));
while ($data=mysqli_fetch_array($hasil)){
$pdf->Cell(3,6,'');
$x_axis=$pdf->getx();
$text="aim success ";// content 
$pdf->vcell(37,8,$x_axis,$data['nama_treatment']);// pass all values inside the cell 
$x_axis=$pdf->getx(); 
$pdf->vcell(16,8,$x_axis,$data['harga']);// pass all values inside the cell 
$x_axis=$pdf->getx(); 
$pdf->vcell(14,8,$x_axis,$data['serv']);
$x_axis=$pdf->getx(); 
$pdf->vcell(14,8,$x_axis,$data['tax']);
$x_axis=$pdf->getx(); 
$pdf->vcell(25,8,$x_axis,$data['subtotal']);
$pdf->Cell(3,10,'');
$pdf->Ln();
$total = $data['total'];
$diskon=$data['diskon'];}
$pdf->Cell(2,6,'');
$pdf->Cell(98,2,'-------------------------------------------------------------------------------------------------+',0,1);
$pdf->Cell(57,6,'');
$jumlah = mysqli_query($connect,"SELECT SUM(serv) AS 'serv', SUM(tax) AS 'tax' FROM detail_booking WHERE kd_booking='$kd_booking'")or die(mysqli_error($connect));
$a=mysqli_fetch_array($jumlah)or die(mysqli_error($connect));
$pdf->Cell(20,6,'Service ');
$pdf->Cell(5,6,'= ');
$pdf->Cell(30,6,$a['serv'],0,1);
$pdf->Cell(57,6,'');
$pdf->Cell(20,6,'Tax ');
$pdf->Cell(5,6,'= ');
$pdf->Cell(30,6,$a['tax'],0,1);
$pdf->Cell(57,6,'');
$pdf->Cell(20,6,'Diskon ');
$pdf->Cell(5,6,'= ');
$pdf->Cell(30,6,$diskon,0,1);
$pdf->Cell(57,6,'');
$pdf->Cell(20,6,'Total ');
$pdf->Cell(5,6,'= ');
$pdf->Cell(30,6,$total,0,1);
$pdf->Ln(1);
$pdf->Cell(98,2,'-------------------------------------------------------------------------------------------------------',0,1);
$nama = mysqli_query($connect,"SELECT pelanggan.nama_pelanggan FROM booking INNER JOIN pelanggan ON booking.kd_pelanggan=pelanggan.kd_pelanggan WHERE kd_booking='$kd_booking'")or die(mysqli_error($connect));
$b=mysqli_fetch_array($nama)or die(mysqli_error($connect));
$pdf->Cell(20,4,'No. Booking');
$pdf->Cell(2,4,':');
$pdf->Cell(40,4,$kd_booking,0,0);
session_start();
$pdf->Cell(10,4,'User');
$pdf->Cell(2,4,':');
$pdf->Cell(30,4,$_SESSION['nama'],0,1);
$pdf->Cell(20,4,'Tgl Booking');
$pdf->Cell(2,4,':');
$pdf->Cell(50,4,$_GET['tgl_booking'],0,1);
$pdf->Cell(20,4,'Customer');
$pdf->Cell(2,4,':');
$pdf->Cell(50,4,$b['nama_pelanggan'],0,1);


$pdf->Output();
?>

