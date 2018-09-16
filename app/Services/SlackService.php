<?php

namespace App\Services;

use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: corym
 * Date: 2017-08-16
 * Time: 10:46 PM
 */
class SlackService
{


    public function sendBirthday($birthdays){

        foreach($birthdays as $birthday){
            $this->sendToSlack($birthday);
        }

    }

    private function sendToSlack($birthday){

        $client = new Client();
        $res = $client->post(env('SLACK_URL'),[
            'json'=>['text'=>"HBD! $birthday->slack_name :tada::birthday:"],
            'headers' => ['Content-Type'=>'application/json']

        ]);


        return true;

    }
}