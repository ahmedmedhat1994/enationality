<?php

use App\Models\Backend\CampaignsContacts;

if (!function_exists('whatsapp'))
{
    function whatsapp ( $number, $message)
    {
        $curl = curl_init();
        $postdata = array(
            "contact" => array(
                array(
                    "number" => "2".$number,
                    "message" => $message
                ),
            )
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.hayah.care/api/whatsapp/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode($postdata),
            CURLOPT_HTTPHEADER => array(
                'Api-key: 45a70653-40e9-4f03-a4ac-f6eb8c4c3bd5',
                'Content-Type: application/json'
            )
        ));

            $response = curl_exec($curl);
            curl_close($curl);
    }
};

if (!function_exists('whatsapp_group'))
{
    function whatsapp_group ($api, $dates)
    {
        $curl = curl_init();
        $postdata = array(
            "contact" => $dates
        );

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.hayah.care/api/whatsapp/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode($postdata),
            CURLOPT_HTTPHEADER => array(
                'Api-key:'.$api,
                'Content-Type: application/json'
            )
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $datas = json_decode($response,true);

    }
};


if (!function_exists('sms'))
{
    function sms ($mobile,$message)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://bulk.whysms.com/api/v3/sms/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "recipient":"'.$mobile.'",
                 "sender_id":"Hayah Care",
                 "type":"plain",
                 "message":"'.$message.'"
                }',

            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer 242|llkeoB0Zxwod8h3eAd6rx9Q0nFiSFaBtieqDsT6C',
                'Content-Type: application/json',
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);



    }


};
