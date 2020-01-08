<?php

// Studi kasus toko yang menjual produk yaitu komik dan game
class Produk{
    // untuk mengelola produk yang akan dijual
    // properti
    public  $judul,
            $penulis,
            $penerbit,
            $harga;
    // method __constract = method yg akan otomatis dijalankan ketika membuat object Produk. Di construct bisa dikasih nilai default. Jadi nilai default ditaro di construct aja.
    public function __construct($parmJudul = "Judul", $parmPenulis = "Penulis", $parmPenerbit = "Penerbit", $parmHarga = 0){
        // mengambil properti yg ada di atas menggunakan $this
        $this->judul = $parmJudul;
        $this->penulis = $parmPenulis;
        $this->penerbit = $parmPenerbit;
        $this->harga = $parmHarga;
    }
    public function getLabel(){
        return "$this->penulis, $this->penerbit"; // $penulis adalah variable baru karena didalam method getLable. Untuk mengambil isi dari properti yg ada didalam class, kita menggunakan $this. $this->penulis. Penulis akan mengacu ke property penulis diatas.
        // kita menggunakan $this karena untuk mengambil isi dari property yg ada didalam class yg bersangkutan ketika dibuat instancenya.
    }
}

class CetakInfoProduk{
    // method untuk cetak info produk
    public function cetak(Produk $produk){ // hanya untuk mencetak produk yg ada. Parameter bisa diisi oleh object produk yg sudah dibuat dibawah. Harapannya parameter $produk adalah objek yg sudah di instansiasi dengan produk. Agar fungsi cetak hanya menerima spesifik class produk, maka diberi object type Produk, sehingga hanya class produk yg bisa masuk sini. Fungsi cetak hanya menerima parameter yg jenisnya class produk, lalu objectnya apa.
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp {$produk->harga})";
        return $str;
    }
}

// Produk lengkap dengan meniban properti
$komik = new Produk("YUGIOH", "YUGI", "KONAMI", 30000); // setiap Produk dibuat objek, parameter Produk dikirim, lalu diterima oleh construct, lalu dipakai untuk mengganti propertinya.
$game = new Produk("Paladins", "VIVIAN", "Steam", 100000);
$defaultProduk = new Produk("Lost Saga");
// untuk menjalankan fungsi cetak
echo "Komik: " . $komik->getLabel();
echo "<br>";
echo "Game: " . $game->getLabel();
echo "<br>";
echo "Default: " . $defaultProduk->getLabel();
var_dump($defaultProduk);
$infoProduk = new CetakInfoProduk();
$infoProduk->cetak($komik); // masukan parameter dengan produk yg ingin dicetak.
echo "<br>";
echo "Info lengkap Komik: " . $infoProduk->cetak($komik);
echo "<br>";
echo "Info lengkap Game: " . $infoProduk->cetak($game);