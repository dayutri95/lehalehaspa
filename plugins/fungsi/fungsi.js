
function sum() {
      var txtFirstNumberValue = document.getElementById('jumlah').value;
      var txtSecondNumberValue = document.getElementById('stok').value;
      var harga= document.getElementById('harga_beli').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
      var kali=parseInt(harga) * parseInt(txtFirstNumberValue);
      var hrg_jual =parseInt(harga) *0.25 + parseInt(harga);

      if (!isNaN(result && kali && hrg_jual)) {
         document.getElementById('akhir').value = result;
         document.getElementById('subtotal').value = kali;
         document.getElementById('jual').value = hrg_jual;
         }
}
function isi() {
      var kode = document.getElementById('kd_penjualan').value;
}
function hapus() {
    alert("Anda yakin ingin menghapus data ?");
    
}

function konfirmasi() {
   tanya = confirm("Anda Yakin Ingin Menghapus Data ?")
   if(tanya==true){
      return true;
   }else{
      return false;
   }
}


function treatment() {
   var a = document.forms["form"]["nama_treatment"].value;
   var b = document.forms["form"]["harga"].value;
   var c = document.forms["form"]["kategori"].value;
   if (a!="" && b!=""  && c!="--pilih kategori treatment--"){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function produk() {
   var a = document.forms["form"]["nama_produk"].value;
   var b = document.forms["form"]["harga_jual"].value;
  if (a!="" && b!=""){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function user() {
   var a = document.forms["form"]["nama_user"].value;
   var b = document.forms["form"]["username"].value;
   var c = document.forms["form"]["password"].value;
   var d = document.forms["form"]["telepon"].value;
   var e = document.forms["form"]["alamat"].value;
   if (a!="" && b!=""  && c!="" && d!="" && e!=""){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function kategori() {
   var a = document.forms["form"]["nama_kategori"].value;
  if (a!=""){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function therapist() {
   var a = document.forms["form"]["nama_therapist"].value;
   var b = document.forms["form"]["no_ktp"].value;
   var c = document.forms["form"]["telp_therapist"].value;
   var d = document.forms["form"]["alamat"].value;
   if (a!="" && b!=""  && c!="" && d!=""){
      return true;

    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function pelanggan() {
   var a = document.forms["form"]["nama_pelanggan"].value;
   var b = document.forms["form"]["email"].value;
   var c = document.forms["form"]["telp_pelanggan"].value;
  if (a!="" && b!=""  && c!=""){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function suplier() {
   var a = document.forms["form"]["nama_suplier"].value;
   var b = document.forms["form"]["npwp"].value;
   var c = document.forms["form"]["telp_suplier"].value;
   var d = document.forms["form"]["alamat"].value;
   if (a!="" && b!=""  && c!="" && d!=""){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}
function barang_masuk() {
   var a = document.forms["form"]["tgl_terima"].value;
   var b = document.forms["form"]["kd_produk"].value;
   var c = document.forms["form"]["suplier"].value;
   var d = document.forms["form"]["harga_beli"].value;
   var e = document.forms["form"]["jumlah"].value;
   if (a!="" && b!="--pilih produk--"  && c!="--pilih suplier--" && d!="" && e!=""){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function booking() {
   var b = document.forms["form"]["tgl_booking"].value;
   var c = document.forms["form"]["kd_pelanggan"].value;
   var d = document.forms["form"]["kd_treatment"].value;
   var e = document.forms["form"]["kd_therapist"].value;
   if (b!=""  && c!="--pilih pelanggan--" && d!="--pilih treatment--" && e!="--pilih therapist--"){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function penjualan() {
   var a = document.forms["form"]["tgl_transaksi"].value;
   var b = document.forms["form"]["kd_produk"].value;
   var c = document.forms["form"]["qty"].value;
   if (a!="" && b!="--pilih produk--" && c!=""){
      return true;
    }else{
      alert('Anda harus mengisi data dengan lengkap !');
      return false;
    }
}

function qbd() {
   var a = document.forms["form"]["tgl"].value;
   if (a!=""){
      return true;
    }else{
      alert('Anda harus mengisi tanggan transaksi !');
      return false;
    }
}