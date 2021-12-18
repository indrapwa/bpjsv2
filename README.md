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
echo 'Poli</br>';
echo $antreanService->poli();

echo 'Dokter</br>';
echo $antreanService->dokter();
```

## Service tersedia
### Antrean
### Vclaim