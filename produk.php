<?php

// Studi kasus toko yang menjual produk yaitu komik dan game
class Produk{
    // untuk mengelola produk yang akan dijual
    // properti
    public  $judul = "Judul",
            $penulis = "Penulis",
            $penerbit = "Penerbit",
            $harga = 0;
    // kita bisa menetapkan nilai default properti langsung disini, misal
    // $judul = "Web Programming UNPAS"
    // method adalah function yg ada didalam class
    public function sayHello(){
        return "Hello World!"; // baru mengembalikan nilai
    }
    // method untuk mendapatkan dan menampilkan label
    public function getLabel(){
        return "$this->penulis, $this->penerbit"; // $penulis adalah variable baru karena didalam method getLable. Untuk mengambil isi dari properti yg ada didalam class, kita menggunakan $this. $this->penulis. Penulis akan mengacu ke property penulis diatas.
        // kita menggunakan $this karena untuk mengambil isi dari property yg ada didalam class yg bersangkutan ketika dibuat instancenya.
    }
}

// instance object dari class Produk
// $produk1 = new Produk();
// $produk2 = new Produk();
$produk1 = new Produk();
$produk1->judul = "Web Programming UNPAS";
var_dump($produk1);
$produk2 = new Produk();
var_dump($produk2);

// Produk lengkap dengan meniban properti
$produk3 = new Produk();
$produk3->judul = "Web Programming";
$produk3->penulis = "Muhammad Reza Pahlevi Y";
$produk3->penerbit = "Universitas Indonesia";
$produk3->harga = 100000;
var_dump($produk3);

// Menggunakan lable
echo "Komik: $produk3->penulis, $produk3->penerbit";
echo "<br>";
echo "First Method: " . $produk3->sayHello();
echo "<br>";
echo "Get Lable Method";
echo "<br>";
echo "Penulis, Penerbit: " .$produk3->getLabel();

$produk4 = new Produk();
$produk4->judul = "Android Programming";
$produk4->penulis = "Nadiah Tsamara Pratiwi";
$produk4->penerbit = "Politeknik Negeri Jakarta";
$produk4->harga = 100000;

echo "<br>";
echo "Buku 1: " .$produk3->getLabel();
echo "<br>";
echo "Buku 2: " .$produk4->getLabel();