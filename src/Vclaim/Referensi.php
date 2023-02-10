<?php

namespace Indrapwa\Bpjsv2\Vclaim;

use Indrapwa\Bpjsv2\Main;

class Referensi extends Main
{
    public function getDiagnosa($diagnosa)
    {
        $response = $this->get("referensi/diagnosa/$diagnosa");
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
    public function getPoli($poli)
    {
        $response = $this->get("referensi/poli/$poli");
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
    public function getFaskes($nama, $jenis)
    {
        $response = $this->get("referensi/faskes/$nama/$jenis");
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
    public function getDokterDPJP($pelayanan, $tglPelayanan, $Spesialis)
    {
        $response = $this->get("referensi/dokter/pelayanan/$pelayanan/tglPelayanan/$tglPelayanan/Spesialis/$Spesialis");
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
    public function getPropinsi()
    {
        $response = $this->get("referensi/propinsi");
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
    public function getKabupaten($propinsi)
    {
        $response = $this->get("referensi/kabupaten/propinsi/$propinsi");
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
    public function getKecamatan($kabupaten)
    {
        $response = $this->get("referensi/kecamatan/kabupaten/$kabupaten");
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
    public function getDiagnosaPRB()
    {
        $response = $this->get("referensi/diagnosaprb");
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
    public function getObatPRB($obatprb)
    {
        $response = $this->get("referensi/obatprb/$obatprb");
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
    public function getProcedure($procedure)
    {
        $response = $this->get("referensi/procedure/$procedure");
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
    public function getKelasrawat()
    {
        $response = $this->get("referensi/kelasrawat");
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
    public function getDokterFaskes($dokter)
    {
        $response = $this->get("referensi/dokter/$dokter");
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
    public function getSpesialistik()
    {
        $response = $this->get("referensi/spesialistik");
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
    public function getRuangrawat()
    {
        $response = $this->get("referensi/ruangrawat");
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
    public function getCarakeluar()
    {
        $response = $this->get("referensi/carakeluar");
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
    public function getPascapulang()
    {
        $response = $this->get("referensi/pascapulang");
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
