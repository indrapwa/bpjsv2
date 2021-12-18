<?php
namespace Indrapwa\Bpjsv2;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;

class Main{

    /**
     * Guzzle HTTP Client object
     * @var \GuzzleHttp\Client
     */
    private $clients;

    /**
     * Request headers
     * @var array
     */
    private $headers;

    /**
     * X-cons-id header value
     * @var int
     */
    public $cons_id;

    /**
     * X-Timestamp header value
     * @var string
     */
    protected $timestamp;

    /**
     * X-Signature header value
     * @var string
     */
    private $signature;

    /**
     * @var string
     */
    protected $secret_key;

    /**
     * @var string
     */
    private $user_key;

    /**
     * @var string
     */
    private $base_url;

    public function __construct($configurations)
    {
        $this->clients = new Client([
            'verify' => false
        ]);

        foreach ($configurations as $key => $val){
            if (property_exists($this, $key)) {
                $this->$key = $val;
            }
        }
        //set X-Timestamp, X-Signature
        $this->setTimestamp()->setSignature();
    }


    protected function setTimestamp()
    {
        $dateTime = new \DateTime('now', new \DateTimeZone('UTC'));
        $this->timestamp = (string)$dateTime->getTimestamp();
        return $this;
    }
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    protected function setSignature()
    {
        $data = $this->cons_id . '&' . $this->timestamp;
        $signature = hash_hmac('sha256', $data, $this->secret_key, true);
        $encodedSignature = base64_encode($signature);
        $this->signature = $encodedSignature;
        return $this;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setHeaders($data)
    {
        $this->headers = $data;
        return $this;
    }

    protected function get($feature)
    {
        $this->headers['Content-Type'] = 'application/json; charset=utf-8';
        try {
            // print_r($this->headers);
            $response = $this->clients->request(
                'GET',
                $this->base_url . '/' . $feature,
                [
                    'headers' => $this->headers
                ]
            )->getBody()->getContents();
        }
        catch (ClientException $e) {
            $response = Psr7\Message::toString($e->getResponse());
        }
        catch(ServerException $e) {
            $response = Psr7\Message::toString($e->getResponse());
        }
        return $response;
    }

    protected function post($feature, $data = [], $headers = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        if(!empty($headers)){
            $this->headers = array_merge($this->headers,$headers);
        }
        try {
            $response = $this->clients->request(
                'POST',
                $this->base_url . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();
        }
        catch (ClientException $e) {
            $response = Psr7\Message::toString($e->getResponse());
        }
        catch(ServerException $e) {
            $response = Psr7\Message::toString($e->getResponse());
        }
        return $response;
    }

    protected function put($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'PUT',
                $this->base_url . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();
        } catch (ClientException $e) {
            $response = Psr7\Message::toString($e->getResponse());
        }
        return $response;
    }


    protected function delete($feature, $data = [])
    {
        $this->headers['Content-Type'] = 'application/x-www-form-urlencoded';
        try {
            $response = $this->clients->request(
                'DELETE',
                $this->base_url . '/' . $feature,
                [
                    'headers' => $this->headers,
                    'json' => $data,
                ]
            )->getBody()->getContents();
        } catch (ClientException $e) {
            $response = Psr7\Message::toString($e->getResponse());
        }
        return $response;
    }
    public function stringDecrypt($key, $string){
        $encrypt_method = 'AES-256-CBC';
        // hash
        $key_hash = hex2bin(hash('sha256', $key));
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hex2bin(hash('sha256', $key)), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key_hash, OPENSSL_RAW_DATA, $iv);
        return $output;
    }
    
    // function lzstring decompress 
    // download libraries lzstring : https://github.com/nullpunkt/lz-string-php
    public function decompress($string){
        return \LZCompressor\LZString::decompressFromEncodedURIComponent($string);
    
    }

}