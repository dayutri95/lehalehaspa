
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

$pdf->Image('logo.jpg',35,0);
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
$pdf->Cell(7,6,'');
$pdf->Cell(40,6,'Produk');
$pdf->Cell(10,6,'Qty');
$pdf->Cell(20,6,'Harga');
$pdf->Cell(30,6,'Subtotal',0,1);

$pdf->SetLineWidth(0.1);
$pdf->Line(2,41,98,41);

 
include '../config.php';
$kd_penjualan=$_GET['kd_penjualan'];
$hasil =  mysqli_query($connect, "SELECT * FROM detail_penjualan INNER JOIN produk ON detail_penjualan.kd_produk=produk.kd_produk INNER JOIN penjualan ON detail_penjualan.kd_penjualan=penjualan.kd_penjualan WHERE penjualan.kd_penjualan='$kd_penjualan' ORDER BY nama_produk")or die(mysqli_error($connect));
while ($data=mysqli_fetch_array($hasil)){
$pdf->Cell(7,6,'');
$x_axis=$pdf->getx();
$text="aim success ";// content 
$pdf->vcell(40,8,$x_axis,$data['nama_produk']);
$x_axis=$pdf->getx();
$pdf->vcell(10,8,$x_axis,$data['qty']);
$x_axis=$pdf->getx();
$pdf->vcell(20,8,$x_axis,$data['harga']);
$x_axis=$pdf->getx();
$pdf->vcell(30,8,$x_axis,$data['subtotal']);
$pdf->Cell(3,10,'');
$pdf->Ln();
$total = $data['total'];}
$pdf->Cell(5,6,'');
$pdf->Cell(98,2,'------------------------------------------------------------------------------------------+',0,1);
$pdf->Cell(50,6,'');
$pdf->Cell(7,6,'');
$pdf->Cell(20,6,'Total = ');
$pdf->Cell(30,6,$total,0,1);
$pdf->Ln(1);
$pdf->Cell(98,2,'-------------------------------------------------------------------------------------------------------',0,1);
$pdf->Cell(20,4,'No. Transaksi');
$pdf->Cell(5,4,':');
$pdf->Cell(50,4,$kd_penjualan,0,1);
$pdf->Cell(20,4,'Tgl Transaksi');
$pdf->Cell(5,4,':');
$pdf->Cell(50,4,$_GET['tgl'],0,1);
session_start();
$pdf->Cell(20,4,'User');
$pdf->Cell(5,4,':');
$pdf->Cell(50,4,$_SESSION['nama'],0,1);

$pdf->Output();
?>

