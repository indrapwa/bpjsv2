<?php

namespace Indrapwa\Bpjsv2\Vclaim;

use Indrapwa\Bpjsv2\Main;

class Monitoring extends Main
{
    public function getKunjungan($Tanggal, $JnsPelayanan)
    {
        $response = $this->get("Monitoring/Kunjungan/Tanggal/$Tanggal/JnsPelayanan/$JnsPelayanan");
        $response = json_decode($response, true);

        if ($response['metaData']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metaData' => $response['metaData'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metaData' => $response['metaData']
            ];
        }
        return $response;
    }
    public function getKlaim($Tanggal, $JnsPelayanan, $Status)
    {
        $response = $this->get("Monitoring/Klaim/Tanggal/$Tanggal/JnsPelayanan/$JnsPelayanan/Status/$Status");
        $response = json_decode($response, true);

        if ($response['metaData']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metaData' => $response['metaData'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metaData' => $response['metaData']
            ];
        }
        return $response;
    }
    public function getHistoriPelayananPeserta($NoKartu, $tglMulai, $tglAkhir)
    {
        $response = $this->get("monitoring/HistoriPelayanan/NoKartu/$NoKartu/tglMulai/$tglMulai/tglAkhir/$tglAkhir");
        $response = json_decode($response, true);

        if ($response['metaData']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metaData' => $response['metaData'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metaData' => $response['metaData']
            ];
        }
        return $response;
    }
    public function getKlaimJaminanJasaraharja($JnsPelayanan, $tglMulai, $tglAkhir)
    {
        $response = $this->get("monitoring/JasaRaharja/JnsPelayanan/$JnsPelayanan/tglMulai/$tglMulai/tglAkhir/$tglAkhir");
        $response = json_decode($response, true);

        if ($response['metaData']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metaData' => $response['metaData'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metaData' => $response['metaData']
            ];
        }
        return $response;
    }
}
