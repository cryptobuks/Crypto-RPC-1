<?php

namespace App\Support\Nano;

class Client
{

    protected $host;
    protected $port;
    protected $params;

    public function __construct($host = '[::1]', $port = 7076)
    {
        $this->host = $host;
        $this->port = $port;
        $this->url = "http://{$host}:{$port}";
        $this->params = [];
    }

    public function __get($key)
    {
        return $this->{$key};
    }

    public function __set($key, $val)
    {
        $this->{$key} = $val;
    }

    public function prepareAvailableSupply()
    {
        $this->params = [
            'action' => 'available_supply'
        ];
        return $this;
    }

    public function prepareAccountBalance($account = null)
    {
        $this->params = [
            'action' => 'account_balance',
            'account' => $account,
        ];
        return $this;
    }

    public function prepareSend($walletId, $sourceAddress, $destinationAddress, $amount=0){
        $this->params = [
            'action' => 'send',
            'wallet' => $walletId,
            'source' => $sourceAddress,
            'destination' => $destinationAddress,
            'amount' => $amount,
        ];
        dump($this->params);
        return $this;
    }

    public function prepareBlockCount(){
        $this->params = [
            'action' => 'block_count',
        ];
        return $this;
    }

    public function run()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post($this->url,
            [
                \GuzzleHttp\RequestOptions::JSON => $this->params
            ]);
        return json_decode($response->getBody()->getContents());
    }


}
