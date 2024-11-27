<?php

namespace App\Service\Easybit;


class getData
{
    public function index() :array|false{
        $apiKey = env('EASYBIT_API_KEY');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.easybit.com/account');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["API-KEY: $apiKey"]);
        $response = curl_exec($ch);
        curl_close($ch);
    
        $data = [];
        $account_info = json_decode($response, true);
        if ($account_info['success'] === 1) {
            $data['current_extra_fee'] = floatval($account_info['data']['extraFee']) * 100;
            $data['current_fee'] = floatval($account_info['data']['fee']) * 100;
            $data['total_fee'] = floatval($account_info['data']['totalFee']) * 100;
        }
        if ($response) {
            $responseData = json_decode($response, true);
            
            if ($responseData['success'] == 1) {
                $data['accountLevel'] = $responseData['data']['level'];
                $data['exchangeVolume'] = $responseData['data']['volume'];
                $data['accountFee'] = $responseData['data']['fee'];
                $data['apiExtraFee'] = $responseData['data']['extraFee'];
                $data['totalFee'] = $responseData['data']['totalFee'];
             
                return $data;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
