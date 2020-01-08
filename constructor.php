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

// Produk lengkap dengan meniban properti
$komik = new Produk("YUGIOH", "YUGI", "KONAMI", 30000); // setiap Produk dibuat objek, parameter Produk dikirim, lalu diterima oleh construct, lalu dipakai untuk mengganti propertinya.
$game = new Produk("Paladins", "VIVIAN", "Steam", 100000);
$defaultProduk = new Produk("Lost Saga");
echo "Komik: " . $komik->getLabel();
echo "<br>";
echo "Game: " . $game->getLabel();
echo "<br>";
echo "Default: " . $defaultProduk->getLabel();
var_dump($defaultProduk);