<?php

namespace Indrapwa\Bpjsv2\Antrean;

use Indrapwa\Bpjsv2\Main;

class Service extends Main
{
    public function poli()
    {
        $response = $this->get('ref/poli');
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function dokter()
    {
        $response = $this->get('ref/dokter');
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }

    public function jadwalDokter($kodepoli, $tanggal)
    {
        $response = $this->get("jadwaldokter/kodepoli/$kodepoli/tanggal/$tanggal");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1 || $response['metadata']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function jadwalDokterUpdate($data)
    {
        $response = $this->post("jadwaldokter/updatejadwaldokter", $data);
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function antreanTambah($data)
    {
        $response = $this->post("antrean/add", $data);
        $response = json_decode($response, true);
        if ($response['metadata']['code'] == 200) {
            $response = [
                'metadata' => $response['metadata']
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function antreanUpdateWaktu($data)
    {
        $response = $this->post("antrean/updatewaktu", $data);
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 200) {
            $response = [
                'metadata' => $response['metadata']
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }

    public function antreanBatal($data)
    {
        $response = $this->post("antrean/batal", $data);
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 200) {
            $response = [
                'metadata' => $response['metadata']
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }

    public function antreanGetListTask($data)
    {
        $response = $this->post("antrean/getlisttask", $data);
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }

    public function dashboardPerTanggal($tanggal,$waktu)
    {
        $response = $this->get("dashboard/waktutunggu/tanggal/$tanggal/waktu/$waktu");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }

    public function dashboardPerBulan($bulan,$tahun,$waktu)
    {
        $response = $this->get("dashboard/waktutunggu/bulan/$bulan/tahun/$tahun/waktu/$waktu");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 200) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function refPoliFingerprint()
    {
        $response = $this->get('ref/poli/fp');
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function refPasienFingerprint($niknoka, $noidentitas)
    {
        $response = $this->get("ref/pasien/fp/identitas/$niknoka/noidentitas/$noidentitas");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function antreanFarmasiTambah($data)
    {
        $response = $this->post("antrean/farmasi/add", $data);
        $response = json_decode($response, true);
        if ($response['metadata']['code'] == 200) {
            $response = [
                'metadata' => $response['metadata']
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function antreanPerTanggal($tanggal)
    {
        $response = $this->get("antrean/pendaftaran/tanggal/$tanggal");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function antreanPerKodebooking($kodebooking)
    {
        $response = $this->get("antrean/pendaftaran/kodebooking/$kodebooking");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function antreanBelumDilayani()
    {
        $response = $this->get("antrean/pendaftaran/aktif");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
    public function antreanPerDokterdanhari($kodepoli,$kodedokter,$hari,$jampraktek)
    {
        $response = $this->get("antrean/pendaftaran/kodepoli/$kodepoli/kodedokter/$kodedokter/hari/$hari/jampraktek/$jampraktek");
        $response = json_decode($response, true);

        if ($response['metadata']['code'] == 1) {
            $data = $this->stringDecrypt($this->cons_id . $this->secret_key . $this->timestamp, $response['response']);
            $data = $this->decompress($data);
            $response = [
                'metadata' => $response['metadata'],
                'response' => json_decode($data, true)
            ];
        } else {
            $response = [
                'metadata' => $response['metadata']
            ];
        }
        return $response;
    }
}
