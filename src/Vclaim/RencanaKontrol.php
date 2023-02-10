<?php

namespace Indrapwa\Bpjsv2\Vclaim;

use Indrapwa\Bpjsv2\Main;

class RencanaKontrol extends Main
{
    public function insert($request)
    {
        $response = $this->post('RencanaKontrol/insert', $request);
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
    public function update($request)
    {
        $response = $this->put('RencanaKontrol/Update', $request);
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
    public function hapus($request)
    {
        $response = $this->delete('RencanaKontrol/Delete', $request);
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
    public function insertSPRI($request)
    {
        $response = $this->post('RencanaKontrol/InsertSPRI', $request);
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
    public function UpdateSPRI($request)
    {
        $response = $this->put('RencanaKontrol/UpdateSPRI', $request);
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
    public function getSEP($nosep)
    {
        $response = $this->get("RencanaKontrol/nosep/$nosep");
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
    public function getSuratKontrol($noSuratKontrol)
    {
        $response = $this->get("RencanaKontrol/noSuratKontrol/$noSuratKontrol");
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
    public function getSuratKontrolByNokartu($Bulan, $Tahun, $Nokartu, $filter)
    {
        $response = $this->get("RencanaKontrol/ListRencanaKontrol/Bulan/$Bulan/Tahun/$Tahun/Nokartu/$Nokartu/filter/$filter");
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
    public function getSuratKontrolByTanggal($tglAwal, $tglAkhir, $filter)
    {
        $response = $this->get("RencanaKontrol/ListRencanaKontrol/tglAwal/$tglAwal/tglAkhir/$tglAkhir/filter/$filter");
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
    public function getPoli($JnsKontrol, $nomor, $TglRencanaKontrol)
    {
        $response = $this->get("RencanaKontrol/ListSpesialistik/JnsKontrol/$JnsKontrol/nomor/$nomor/TglRencanaKontrol/$TglRencanaKontrol");
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
    public function getDokter($JnsKontrol, $KdPoli, $TglRencanaKontrol)
    {
        $response = $this->get("RencanaKontrol/JadwalPraktekDokter/JnsKontrol/$JnsKontrol/KdPoli/$KdPoli/TglRencanaKontrol/$TglRencanaKontrol");
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
