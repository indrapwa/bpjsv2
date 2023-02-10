<?php

namespace Indrapwa\Bpjsv2\Vclaim;

use Indrapwa\Bpjsv2\Main;

class PRB extends Main
{
    public function insert($request)
    {
        $response = $this->post("PRB/insert", $request);
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
        $response = $this->put("PRB/update", $request);
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
        $response = $this->delete("PRB/delete", $request);
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
    public function getByNomor($prb, $nosep)
    {
        $response = $this->get("prb/$prb/nosep/$nosep");
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
    public function getByTanggal($tglMulai, $tglAkhir)
    {
        $response = $this->get("prb/tglMulai/$tglMulai/tglAkhir/$tglAkhir");
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
