
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
$pdf->Cell(50,6,'Barang');
$pdf->Cell(30,6,'Harga Beli');
$pdf->Cell(20,6,'Qty',0,1);

$pdf->SetLineWidth(0.1);
$pdf->Line(2,41,98,41);

 
include '../config.php';
$kd_terima=$_GET['kd_terima'];
$hasil =  mysqli_query($connect, "SELECT barang_masuk.subtotal,barang_masuk.kd_terima,produk.nama_produk,produk.stok,barang_masuk.harga_beli,barang_masuk.stok_awal,barang_masuk.jumlah,barang_masuk.stok_akhir,produk.nama_produk,user.username,DATE_FORMAT(barang_masuk.tgl_terima, '%d-%m-%Y' ) AS tgl_terima,DATE_FORMAT(barang_masuk.tgl_kadaluarsa, '%d-%m-%Y' ) AS tgl_kadaluarsa FROM barang_masuk INNER JOIN produk ON barang_masuk.kd_produk=produk.kd_produk INNER JOIN user ON user.kd_user=barang_masuk.kd_user WHERE kd_terima='$kd_terima'");
while ($data=mysqli_fetch_array($hasil)){
$pdf->Cell(3,6,'');
$x_axis=$pdf->getx();
$text="aim success ";// content 
$pdf->vcell(50,8,$x_axis,$data['nama_produk']);
$x_axis=$pdf->getx();
$pdf->vcell(30,8,$x_axis,$data['harga_beli']);
$x_axis=$pdf->getx();
$pdf->vcell(20,8,$x_axis,$data['jumlah']);
$pdf->Ln();

$total = $data['subtotal'];
}
$pdf->Ln(1);
$pdf->Cell(98,2,'-------------------------------------------------------------------------------------------------------',0,1);
$pdf->Cell(30,4,'Kode Terima');
$pdf->Cell(2,4,':');
$pdf->Cell(35,4,$kd_terima,0,0);
session_start();
$pdf->Cell(10,4,'User');
$pdf->Cell(2,4,':');
$pdf->Cell(30,4,$_SESSION['nama'],0,1);
$pdf->Cell(30,4,'Tgl Terima');
$pdf->Cell(2,4,':');
$pdf->Cell(50,4,$_GET['tgl_terima'],0,1);
$pdf->Cell(30,4,'Total Pembayaran');
$pdf->Cell(2,4,':');
$pdf->Cell(50,4,$total,0,1);



$pdf->Output();
?>

