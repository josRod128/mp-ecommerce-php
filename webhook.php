<?php
    require 'vendor/autoload.php';
    $AccessToken = 'APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181';
    MercadoPago\SDK::setAccessToken($AccessToken);
    $body = @file_get_contents('php://input');
    $data = json_decode($body);
    file_put_contents('notification/'.$data->id.".json", $body);
    switch($data->type) {
    case "payment":
    $payment = MercadoPago\Payment::find_by_id($data->data->id);
    http_response_code(201);
    // var_dump($payment);
    break;
    case "test":
    echo "ok";
    break;
    case "plan":
    $plan = MercadoPago\Plan::find_by_id($_POST["id"]);
    break;
    case "subscription":
    $plan = MercadoPago\Subscription::find_by_id($_POST["id"]);
    break;
    case "invoice":
    $plan = MercadoPago\Invoice::find_by_id($_POST["id"]);
    break;
}