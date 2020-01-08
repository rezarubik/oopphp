<?php

// Studi kasus toko yang menjual produk yaitu komik dan game
class Produk
{
    // untuk mengelola produk yang akan dijual
    // properti
    private $judul,
        $penulis,
        $penerbit,
        $harga,
        $diskon = 0;
    // private hanya dapat digunakan dalam class tertentu saja (Dalam satu class)
    // untuk memanggil property diatas yg sudah di private, maka kita harus membuat method untuk mendapatkan property tersebut didalam class Produk ini.
    // $jmlHalaman, // untuk komik
    // $waktuMain; // untuk game
    // method __constract = method yg akan otomatis dijalankan ketika membuat object Produk. Di construct bisa dikasih nilai default. Jadi nilai default ditaro di construct aja.
    public function __construct($parmJudul = "Judul", $parmPenulis = "Penulis", $parmPenerbit = "Penerbit", $parmHarga = 0)
    {
        // mengambil properti yg ada di atas menggunakan $this
        $this->judul = $parmJudul;
        $this->penulis = $parmPenulis;
        $this->penerbit = $parmPenerbit;
        $this->harga = $parmHarga;
        // $this->jmlHalaman = $parmJmlHalaman;
        // $this->waktuMain = $parmWaktuMain;
    }
    // method untuk menggubah nama judul
    public function setJudul($parmJudul)
    {
        // bisa digunakan untuk validasi misal yg boleh ditulis oleh judul hanya string. Misal judulnya bukan string, maka kita tampilkan error
        if (!is_string($parmJudul)) { // kalau judulnya bukan string, maka tampilkan pesan error
            throw new Exception("Judul Harus String");
        } else {
            $this->judul = $parmJudul;
        }
    }
    // method untuk mendapatkan judul
    public function getJudul()
    {
        return $this->judul;
    }
    // sekarang kita buat untuk penulis, dan penerbit
    public function setPenulis($parmPenulis)
    {
        if (!is_string($parmPenulis)) {
            throw new Exception("Penulis harus String");
        } else {
            $this->penulis = $parmPenulis;
        }
    }
    public function getPenulis()
    {
        return $this->penulis;
    }
    public function setPenerbit($parmPenerbit)
    {
        if (!is_string($parmPenerbit)) {
            throw new Execption("Penerbit harus String");
        } else {
            $this->penerbit = $parmPenerbit;
        }
    }
    public function getPenerbit()
    {
        return $this->penerbit;
    }
    // untuk memberikan diskon, maka kita harus setDiskon. Misal yg boleh ada diskonnya hanya game saja. 
    public function setDiskon($parmDiskon)
    {
        // untuk mendapatkan diskonnya.
        $this->diskon = $parmDiskon;
    }
    public function getDiskon()
    {
        return $this->diskon;
    }
    // jika ingin menambahkan setHarga maka harga yg akan muncul adalah bukan harga dasar, tetapi adalah harga setelah diskon
    public function setHarga($parmHarga)
    {
        if (is_string($parmHarga)) {
            throw new Exception("Harga tidak boleh string");
        } else {
            $this->harga = $parmHarga;
        }
    }
    // // untuk memberikan diskon, maka kita harus setDiskon. 
    // public function setDiskon($parmDiskon)
    // {
    //     // untuk mendapatkan diskonnya.
    //     $this->diskon = $parmDiskon;
    // }
    public function getHarga()
    {
        // return $this->harga;
        // untuk mendapatkan harganya, kita akan memberikan perhitungan diskon disini. apabila gak ada harganya berarti normal.
        return $this->harga - ($this->harga * $this->diskon / 100);
    }
    public function getLabel()
    {
        return "$this->penulis, $this->penerbit"; // $penulis adalah variable baru karena didalam method getLable. Untuk mengambil isi dari properti yg ada didalam class, kita menggunakan $this. $this->penulis. Penulis akan mengacu ke property penulis diatas.
        // kita menggunakan $this karena untuk mengambil isi dari property yg ada didalam class yg bersangkutan ketika dibuat instancenya.
    }
    // inheritance-problems, masih sangat merepotkan jika menggunakan cara seperti ini.
    public function getInfoProduk()
    { // yg akan dicetak
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
class Komik extends Produk
{
    // public function getInfoKomik(){
    //     $str = "Komik: {$this->getInfoProduk()} - {$this->jmlHalaman} Halaman.";
    //     return $str;
    // }
    // public function getInfoProduk(){
    //     $str = "Komik: {$this->getInfoProduk()} - {$this->jmlHalaman} Halaman.";
    //     return $str;
    // }

    // overriding
    public $jmlHalaman; // cara mengisi jmlHalaman ini dengan menggunakan construct untuk class Komik
    // kita harus membuat construct untuk Class Komik,karena objek komik diarahkan ke construct.
    public function __construct($parmJudul = "Judul", $parmPenulis = "Penulis", $parmPenerbit = "Penerbit", $parmHarga = 0, $parmJmlHalaman = 0)
    {
        // karena properti judul tidak ada di class Komik, maka dia akan mencari ke parentnya.
        // agar tidak menulis ulang seperti punya parent, maka kita tinggal menjalankan construct milik parentnya
        parent::__construct($parmJudul, $parmPenulis, $parmPenerbit, $parmHarga);
        // untuk jmlHalaman kita mengisi manual
        $this->jmlHalaman = $parmJmlHalaman;
    }
    public function setDiskon($parmDiskon)
    {
        $this->diskon = $parmDiskon;
    }
    public function getInfoProduk()
    {
        $str = "Komik: " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
        return $str;
        // parent::getInfoProduk() memberitahukan bahwa getInfoProduk adalah milik parentnya.
    }
}

class Game extends Produk
{
    // public function getInfoGame(){
    //     $str = "Game: {$this->judul} | {$this->getLabel()}, (Rp {$this->harga}) ~ {$this->waktuMain} Jam.";
    //     return $str;
    // }
    // overriding
    public $waktuMain;
    public function __construct($parmJudul = "Judul", $parmPenulis = "Penulis", $parmPenerbit = "Penerbit", $parmHarga = 0, $parmWaktuMain = 0)
    {
        parent::__construct($parmJudul, $parmPenulis, $parmPenerbit, $parmHarga);
        $this->waktuMain = $parmWaktuMain;
    }
    public function getInfoProduk()
    {
        $str = "Game: " . parent::getInfoProduk() . " ~ {$this->waktuMain} Jam.";
        return $str;
    }
    // untuk mendapatkan harga yg sudah di protected, maka tinggal di return saja harnya.
    // public function getHarga()
    // {
    //     // untuk mengambil harga
    //     return $this->harga; // karena $this-harga tidak ada digame, maka dia mencari kedalam produk (class parent).
    // }
}

class CetakInfoProduk
{
    // method untuk cetak info produk
    public function cetak(Produk $produk)
    { // hanya untuk mencetak produk yg ada. Parameter bisa diisi oleh object produk yg sudah dibuat dibawah. Harapannya parameter $produk adalah objek yg sudah di instansiasi dengan produk. Agar fungsi cetak hanya menerima spesifik class produk, maka diberi object type Produk, sehingga hanya class produk yg bisa masuk sini. Fungsi cetak hanya menerima parameter yg jenisnya class produk, lalu objectnya apa.
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp {$produk->harga})";
        return $str;
    }
}

// Produk lengkap dengan meniban properti
$komik = new Komik("YUGIOH", "YUGI", "KONAMI", 30000, 100); // setiap Produk dibuat objek, parameter Produk dikirim, lalu diterima oleh construct, lalu dipakai untuk mengganti propertinya. Kita harus mengirimkan kedua jenisnya yaitu halaman dan waktu main. Parameter terakhir kasih tipenya apa.
$game = new Game("Paladins", "HiRez", "Steam", 100000, 50);

// echo $komik->getInfoKomik();
// Fitur lain dari inheritance
echo $komik->getInfoProduk();
echo "<br>";
// echo $game->getInfoGame();
echo $game->getInfoProduk();
echo "<hr>";
// ============================================================================================================================
$game->setDiskon(50);
echo "Diskon Harga Game: Rp " . $game->getHarga();
echo "<br>";
$komik->setDiskon(50);
echo "Diskon Harga Komik: Rp " . $komik->getHarga();
echo "<hr>";
// ============================================================================================================================
// menampilkan detail dari komik menggunakan setter dan getter
// $komik->setJudul("Judul Baru");
echo "Penulis Komik adalah " . $komik->getPenulis();
echo "<br>";
echo "Judul Komik adalah " . $komik->getJudul();
echo "<br>";
echo "Penerbit Komik adalah " . $komik->getPenerbit();
echo "<br>";
echo "Diskon Komik adalah Rp " . $komik->getHarga();
// Jika ingin mengubah tinggal menggunakan set saja. Contoh
echo "<br>";
$komik->setPenulis("Muhammad Reza Pahlevi Y");
echo "Penulis sudah diganti menjadi " . $komik->getPenulis();
 