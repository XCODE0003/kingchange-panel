<?php

namespace App\Service\Easybit;

class setData
{
    public function index(float $extraFee): bool
    {
        $apiKey = env('EASYBIT_API_KEY');
        $extraFee = floatval($extraFee) / 100;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.easybit.com/setExtraFee');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "API-KEY: $apiKey",
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(["extraFee" => $extraFee]));
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);
        if ($result['success'] === 1) {
            return true;
        }
        return false;
    }
}
