<?php
namespace App\Services\Notification;

use Exception;
use App\Models\User;
use App\Services\Notification\Providers\Contracts\Provider;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;

class Notification{

    public function __call($method,$arguments){

        $providerPath = __NAMESPACE__ . '\Providers\\' . substr($method,4) . 'Provider';

        if(!Class_exists($providerPath)){
            throw new Exception("Class doesn't exist");
        }

        $providerInstance = new $providerPath(...$arguments);

        if(!is_subclass_of($providerInstance,Provider::class)){
            throw new Exception("class must impliment Provider");
        }

        return $providerInstance->send();

    }

}
