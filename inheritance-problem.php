<?php

// Studi kasus toko yang menjual produk yaitu komik dan game
class Produk{
    // untuk mengelola produk yang akan dijual
    // properti
    public  $judul,
            $penulis,
            $penerbit,
            $harga,
            $jmlHalaman, // untuk komik
            $waktuMain, // untuk game
            $tipe;
    // method __constract = method yg akan otomatis dijalankan ketika membuat object Produk. Di construct bisa dikasih nilai default. Jadi nilai default ditaro di construct aja.
    public function __construct($parmJudul = "Judul", $parmPenulis = "Penulis", $parmPenerbit = "Penerbit", $parmHarga = 0, $parmJmlHalaman = 0, $parmWaktuMain = 0, $parmTipe = "Tipe Produk"){
        // mengambil properti yg ada di atas menggunakan $this
        $this->judul = $parmJudul;
        $this->penulis = $parmPenulis;
        $this->penerbit = $parmPenerbit;
        $this->harga = $parmHarga;
        $this->jmlHalaman = $parmJmlHalaman;
        $this->waktuMain = $parmWaktuMain;
        $this->tipe = $parmTipe;
    }
    public function getLabel(){
        return "$this->penulis, $this->penerbit"; // $penulis adalah variable baru karena didalam method getLable. Untuk mengambil isi dari properti yg ada didalam class, kita menggunakan $this. $this->penulis. Penulis akan mengacu ke property penulis diatas.
        // kita menggunakan $this karena untuk mengambil isi dari property yg ada didalam class yg bersangkutan ketika dibuat instancenya.
    }
    // inheritance-problems, masih sangat merepotkan jika menggunakan cara seperti ini.
    public function getInfoDetail(){ // yg akan dicetak
        // Komik: YUGIOH | YUGI, KONAMI, (Rp 30.000) ~ 100 halaman.
        // Game: Paladins | HiRez, Steam, (Rp 100.000) ~ 50 jam.
        $str = "{$this->tipe}: {$this->judul} | {$this->getLabel()}, (Rp {$this->harga})";
        if ($this->tipe == "Komik") {
            $str .= " - {$this->jmlHalaman} Halaman.";
        }
        elseif ($this->tipe == "Game") {
            $str .= " ~ {$this->waktuMain} Jam.";
        }
        return $str;
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
$komik = new Produk("YUGIOH", "YUGI", "KONAMI", 30000, 100, 0, "Komik"); // setiap Produk dibuat objek, parameter Produk dikirim, lalu diterima oleh construct, lalu dipakai untuk mengganti propertinya. Kita harus mengirimkan kedua jenisnya yaitu halaman dan waktu main. Parameter terakhir kasih tipenya apa.
$game = new Produk("Paladins", "HiRez", "Steam", 100000, 0, 50, "Game");

echo $komik->getInfoDetail();
echo "<br>";
echo $game->getInfoDetail();