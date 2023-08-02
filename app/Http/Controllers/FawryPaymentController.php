<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FawryPaymentController extends Controller
{
    public function call_card_token()
    {
        $merchantCode    = '770000015171';
        $merchantRefNumber  = 'unique-1';
        $payment_method = 'CARD';
        $amount = '580.55';
        $card_token = 'ac0a1909256e8bb5a35a6311c5e824c223d13ae877c5bb0419350b01c619d59d';
        $cvv = 123;
        $merchant_sec_key =  '259af31fc2f74453b3a55739b21ae9ef';
        $signature = "138e99ce3976bc1772d21d8078a0191163d5293a28bb14580c060738a9d4cb4b";
        $response = Http::POST('https://atfawry.fawrystaging.com/ECommerceWeb/Fawry/payments/charge', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json'
            ],
            'body' => json_encode([
                'merchantCode' => "1tSa6uxz2nTwlaAmt38enA==",
                'merchantRefNumber' => "2312465464",
                'customerProfileId' => "1212",
                'customerName' => 'Customer',
                'customerMobile' => '01234567891',
                'customerEmail' => 'example@gmail.com',
                "cardToken" => "75911f781737bc756ab1cd312710f7f75948a75cb30e130867640f61faab3922",
                "cvv" => 123,
                'amount' => '580.55',
                'currencyCode' => 'EGP',
                'language' => 'en-gb',
                'chargeItems' => [
                    'itemId' => '897fa8e81be26df25db592e81c31c',
                    'description' => 'Item Description',
                    'price' => '580.55',
                    'quantity' => '1'
                ],
                'signature' => "2ca4c078ab0d4c50ba90e31b3b0339d4d4ae5b32f97092dd9e9c07888c7eef36",
                'paymentMethod' => 'CARD',
                'description' => 'example description'
            ], true)
        ]);

        $response = json_decode($response->getBody()->getContents(), true);
        $paymentStatus = $response['type']; // get response values

        return $response;
    }
}
