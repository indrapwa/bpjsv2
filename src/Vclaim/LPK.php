<?php

namespace Indrapwa\Bpjsv2\Vclaim;

use Indrapwa\Bpjsv2\Main;

class LPK extends Main
{
    public function insert($request)
    {
        $response = $this->post("LPK/insert", $request);
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
        $response = $this->put("LPK/update", $request);
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
        $response = $this->delete("LPK/delete", $request);
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
    public function getLembarpengajuanklaim($TglMasuk, $JnsPelayanan)
    {
        $response = $this->get("LPK/TglMasuk/$TglMasuk/JnsPelayanan/$JnsPelayanan");
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
