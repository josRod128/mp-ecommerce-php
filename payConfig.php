<?php
    require_once 'vendor/autoload.php'; // You have to require the library from your Composer vendor folder

    MercadoPago\SDK::setAccessToken("TEST-2332376076440217-112517-db673aef6fdd004a6e16b4db044a1a5a-168864630"); // Either Production or SandBox AccessToken

    $payment = new MercadoPago\Payment();

    $payment->transaction_amount = 141;
    $payment->token = "YOUR_CARD_TOKEN";
    $payment->description = "Ergonomic Silk Shirt";
    $payment->installments = 1;
    $payment->payment_method_id = "visa";
    $payment->payer = array(
        "email" => "larue.nienow@email.com"
    );

    $payment->save();

    echo $payment->status;
?>