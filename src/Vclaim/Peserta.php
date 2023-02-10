<?php

namespace Indrapwa\Bpjsv2\Vclaim;

use Indrapwa\Bpjsv2\Main;

class Peserta extends Main
{
    public function getByNobpjs($nokartu, $tglSep)
    {
        $response = $this->get("Peserta/nokartu/$nokartu/tglSEP/$tglSep");
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
    public function getByNik($nik, $tglSep)
    {
        $response = $this->get("Peserta/nik/$nik/tglSEP/$tglSep");
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
