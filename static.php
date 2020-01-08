<?php

// class ContohStatic
// {
//     public static $angka = 1;

//     public static function halo()
//     {
//         // untuk mengambil property static menggunakan keyword self::$propery
//         return "Halo " . self::$angka++ . " kali";
//     }
// }
// // cara langsung mengaksesnya langsung panggil classnya dan tambahkan :: untuk mengakses property yg punya keyword static
// echo ContohStatic::$angka;
// // cetak methoh halo
// echo "<br>";
// echo ContohStatic::halo();
// echo "<hr>";
// echo ContohStatic::halo();

class Contoh
{
    public static $angka = 1;
    public function halo()
    {
        return "Halo " . self::$angka++ . " kali. <br>";
    }
}

$obj = new Contoh;
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();
echo "<hr>";
$obj2 = new Contoh;
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();
