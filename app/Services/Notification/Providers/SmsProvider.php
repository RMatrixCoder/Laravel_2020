<?php

namespace App\Services\Notification\Providers;

use App\Models\User;
use App\Services\Notification\Providers\Contracts\Provider;
use GuzzleHttp\Client;

class SmsProvider implements Provider
{
    private $user;
    private $text;


    public function __construct(User $user, String $text)
    {
        $this->user = $user;
        $this->text = $text;
    }


    public function send(){

        $client = new Client();

        $response = $client->post(config('services.sms.uri'),prepareDataForSms());

        return $response->getBody();

    }

    private function prepareDataForSms(){

        $data = array_merge(config('services.sms.auth'),[
            'op'=>'send',
            'message'=>$this->text,
            'to'=>$this->user->number,
        ]);

        return [
            'jason' => $data,
        ];
    }
}
