<?php

class Mobil{
    public $nama, $merk, $warna,
           $kecepatanMaksimal,
           $jumlahPenumpang;
    public function tambahKecepatan(){
        return "Kecepatan Bertambah!";
    }
}

class MobilSport extends Mobil{
    public $turbo = false;

    public function jalankanTurbo(){
        $this->turbo = true;
        return "Turbo dijalankan!";
    }
}

$mobil1 = new MobilSport();
// bisa memanggil method parentnya.
echo "Method Parent: " . $mobil1->tambahKecepatan();
echo "<br>";
echo "Method Child: " . $mobil1->jalankanTurbo();