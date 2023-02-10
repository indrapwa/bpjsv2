# BPJS Kesehatan Republik Indonesia
PHP Package untuk memudahkan anda menggunakan API BPJS Kesehatan Republik Indonesia versi ke 2. Katalog lengkap dari API BPJS ke 2 terdapat di https://dvlp.bpjs-kesehatan.go.id:8888/trust-mark/portal.html

## Instalasi
`composer require indrapwa/bpjsv2`

## Contoh Penggunaan
```php
use Indrapwa\Bpjsv2\Antrean\Service;

// 1. bpjs config utama
$config = [
    'cons_id' => '12345',
    'secret_key' => '12345',
    'base_url' => 'https://apijkn-dev.bpjs-kesehatan.go.id/antreanrs_dev',
];
$antreanService = new Service($config);


// 2. set header
$headers = [
    'x-cons-id' => $config['cons_id'],
    'x-timestamp' => $antreanService->getTimestamp(),
    'x-signature' => $antreanService->getSignature(),
    'user_key' => '12345'
];
$antreanService->setHeaders($headers);


// 3. eksekusi service
echo 'Referensi Poli</br>';
echo json_encode($antreanService->poli(), true);

echo 'Referensi Dokter</br>';
echo json_encode($antreanService->dokter(), true);

echo 'Tambah Antrean<br/>';
$data = [
    "kodebooking" => "16032021A001",
    "jenispasien" => "JKN",
    "nomorkartu" => "00012345678",
    "nik" => "3212345678987654",
    "nohp" => "085635228888",
    "kodepoli" => "ANA",
    "namapoli" => "Anak",
    "pasienbaru" => 0,
    "norm" => "123345",
    "tanggalperiksa" => "2021-01-28",
    "kodedokter" => 12345,
    "namadokter" => "Dr. Hendra",
    "jampraktek" => "08:00-16:00",
    "jeniskunjungan" => 1,
    "nomorreferensi" => "0001R0040116A000001",
    "nomorantrean" => "A-12",
    "angkaantrean" => 12,
    "estimasidilayani" => 1615869169000,
    "sisakuotajkn" => 5,
    "kuotajkn" => 30,
    "sisakuotanonjkn" => 5,
    "kuotanonjkn" => 30,
    "keterangan" => "Peserta harap 30 menit lebih awal guna pencatatan administrasi."
];
echo json_encode($antreanService->antreanTambah($data), true);

```

## Service tersedia
### Antrean
Referensi Poli
Referensi Dokter
Referensi Jadwal Dokter
Referensi Poli Finger Print New
Referensi Pasien Finger Print New
Update Jadwal Dokter
Tambah Antrean
Tambah Antrean Farmasi New
Update Waktu Antrean Update
Batal Antrean
List Waktu Task Id
Dashboard Per Tanggal
Dashboard Per Bulan
Antrean Per Tanggal New
Antrean Per Kode Booking New
Antrean Belum Dilayani New
Antrean Belum Dilayani Per Poli Per Dokter Per Hari Per Jam Praktek
### Vclaim
Lembar Pengajuan Klaim
Monitoring
Peserta
Pembuatan Rujuk Balik (PRB)
Referensi
Pembuatan Rencana Kontrol/SPRI
Cari Rujukan
Pembuatan SEP