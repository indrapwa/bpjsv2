<?php
require '../vendor/autoload.php';

use Indrapwa\Bpjsv2\Antrean\Service;

//bpjs config
$config = [
    'cons_id' => '12345',
    'secret_key' => '12345',
    'base_url' => 'https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev',
];
$antreanService = new Service($config);

$headers = [
    'x-cons-id' => $config['cons_id'],
    'x-timestamp' => $antreanService->getTimestamp(),
    'x-signature' => $antreanService->getSignature(),
    'user_key' => '12345'
];
$antreanService->setHeaders($headers);

echo 'Poli</br>';
echo $antreanService->poli();

echo 'Dokter</br>';
echo $antreanService->dokter();


echo 'Jadwal Dokter</br>';
echo $antreanService->jadwalDokter('ANA', '2021-08-07');


echo 'Jadwal Dokter</br>';
echo $antreanService->jadwalDokter('ANA', '2021-08-07');


$dataUpdate = [
    "kodepoli" => "ANA",
    "kodesubspesialis" => "ANA",
    "kodedokter" => 12346,
    "jadwal" => [
        [
            "hari" => "1",
            "buka" => "08:00",
            "tutup" => "10:00"
        ],
        [
            "hari" => "2",
            "buka" => "15:00",
            "tutup" => "17:00"
        ]
    ]
];
echo 'Update Jadwal Dokter</br>';
echo $antreanService->jadwalDokterUpdate($dataUpdate);


$data = [
    "kodebooking"=> "16032021A001",
    "jenispasien"=> "JKN",
    "nomorkartu"=> "00012345678",
    "nik"=> "3212345678987654",
    "nohp"=> "085635228888",
    "kodepoli"=> "ANA",
    "namapoli"=> "Anak",
    "pasienbaru"=> 0,
    "norm"=> "123345",
    "tanggalperiksa"=> "2021-01-28",
    "kodedokter"=> 12345,
    "namadokter"=> "Dr. Hendra",
    "jampraktek"=> "08:00-16:00",
    "jeniskunjungan"=> 1,
    "nomorreferensi"=> "0001R0040116A000001",
    "nomorantrean"=> "A-12",
    "angkaantrean"=> 12,
    "estimasidilayani"=> 1615869169000,
    "sisakuotajkn"=> 5,
    "kuotajkn"=> 30,
    "sisakuotanonjkn"=> 5,
    "kuotanonjkn"=> 30,
    "keterangan"=> "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
];
echo 'Tambah antrean</br>';
echo $antreanService->antreanTambah($data);


$data = [
    "kodebooking"=> "16032021A001",
   "taskid"=> 1,
   "waktu"=> 1616559330000
];
echo 'Update waktu antrean</br>';
echo $antreanService->antreanUpdateWaktu($data);


$data = [
    "kodebooking"=> "16032021A001",
   "keterangan"=> "Terjadi perubahan jadwal dokter, silahkan daftar kembali"
];
echo 'Batal antrean</br>';
echo $antreanService->antreanBatal($data);


$data = [
    "kodebooking"=> "16032021A001",
];
echo 'List waktu task id</br>';
echo $antreanService->antreanGetListTask($data);


echo 'Dashboard Per Tanggal</br>';
echo $antreanService->dashboardPerTanggal('2021-04-16','1');


echo 'Dashboard Per Bulan</br>';
echo $antreanService->dashboardPerBulan('07','2021','1');
