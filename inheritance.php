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
            $waktuMain; // untuk game
    // method __constract = method yg akan otomatis dijalankan ketika membuat object Produk. Di construct bisa dikasih nilai default. Jadi nilai default ditaro di construct aja.
    public function __construct($parmJudul = "Judul", $parmPenulis = "Penulis", $parmPenerbit = "Penerbit", $parmHarga = 0, $parmJmlHalaman = 0, $parmWaktuMain = 0){
        // mengambil properti yg ada di atas menggunakan $this
        $this->judul = $parmJudul;
        $this->penulis = $parmPenulis;
        $this->penerbit = $parmPenerbit;
        $this->harga = $parmHarga;
        $this->jmlHalaman = $parmJmlHalaman;
        $this->waktuMain = $parmWaktuMain;
    }
    public function getLabel(){
        return "$this->penulis, $this->penerbit"; // $penulis adalah variable baru karena didalam method getLable. Untuk mengambil isi dari properti yg ada didalam class, kita menggunakan $this. $this->penulis. Penulis akan mengacu ke property penulis diatas.
        // kita menggunakan $this karena untuk mengambil isi dari property yg ada didalam class yg bersangkutan ketika dibuat instancenya.
    }
    // inheritance-problems, masih sangat merepotkan jika menggunakan cara seperti ini.
    public function getInfoProduk(){ // yg akan dicetak
        // Komik: YUGIOH | YUGI, KONAMI, (Rp 30.000) ~ 100 halaman.
        // Game: Paladins | HiRez, Steam, (Rp 100.000) ~ 50 jam.
        $str = "{$this->judul} | {$this->getLabel()}, (Rp {$this->harga})";
        // if ($this->tipe == "Komik") {
        //     $str .= " - {$this->jmlHalaman} Halaman.";
        // }
        // elseif ($this->tipe == "Game") {
        //     $str .= " ~ {$this->waktuMain} Jam.";
        // }
        return $str;
    }
}

// Ketika instansiasi object child, maka akan mencari construct dari childnya dulu. Jika tidak ada di childnya, maka ada di parentnya. Begitu pun juga dengan method
class Komik extends Produk{
    // public function getInfoKomik(){
    //     $str = "Komik: {$this->getInfoProduk()} - {$this->jmlHalaman} Halaman.";
    //     return $str;
    // }
    // public function getInfoProduk(){
    //     $str = "Komik: {$this->getInfoProduk()} - {$this->jmlHalaman} Halaman.";
    //     return $str;
    // }
    public function getInfoProduk(){
        $str = "Komik: {$this->judul} | {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
        return $str;
    } 
}

class Game extends Produk{
    // public function getInfoGame(){
    //     $str = "Game: {$this->judul} | {$this->getLabel()}, (Rp {$this->harga}) ~ {$this->waktuMain} Jam.";
    //     return $str;
    // }
    public function getInfoProduk(){
        $str = "Game: {$this->judul} | {$this->getLabel()} (Rp {$this->harga}) ~ {$this->waktuMain} Jam.";
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
$komik = new Komik("YUGIOH", "YUGI", "KONAMI", 30000, 100, 0); // setiap Produk dibuat objek, parameter Produk dikirim, lalu diterima oleh construct, lalu dipakai untuk mengganti propertinya. Kita harus mengirimkan kedua jenisnya yaitu halaman dan waktu main. Parameter terakhir kasih tipenya apa.
$game = new Game("Paladins", "HiRez", "Steam", 100000, 0, 50);

// echo $komik->getInfoKomik();
// Fitur lain dari inheritance
echo $komik->getInfoProduk();
echo "<br>";
// echo $game->getInfoGame();
echo $game->getInfoProduk();