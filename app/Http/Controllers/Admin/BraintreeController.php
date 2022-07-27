<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\SponsorshipController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Apartment;
use App\Sponsorship;


class BraintreeController extends Controller
{

     public function token(Request $request){
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        if($request->input('nonce') != null){
            $nonceFromTheClient = $request->input('nonce');
            $amount = $request->input('amount');
            $apartment = $request->input('apartment');
            $response = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                'submitForSettlement' => True
                ]
            ]);
            return redirect()->route('admin.home');
            }else{
                $clientToken = $gateway->clientToken()->generate();
                $amount = $request->input('price');
                return view ('admin.braintree',['token' => $clientToken, 'amount' => $amount]);
            }
        }
}
