<?php
    require 'vendor/autoload.php';
    $AccessToken = 'APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181';
    MercadoPago\SDK::initialize();
    MercadoPago\SDK::setAccessToken($AccessToken);
    MercadoPago\SDK::setPlatformId("PLATFORM_ID");
    MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
    MercadoPago\SDK::setCorporationId("CORPORATION_ID");
    $config = MercadoPago\SDK::config();

    $preference = new MercadoPago\Preference();
    # Building an Payer
    $payer = new MercadoPago\Payer();
    $payer->name 		= "Lalo";
    $payer->surname 	= "Landa";
    $payer->email 		= "test_user_58295862@testuser.com";
    $payer->phone = array(
        "area_code" => "52",
        "number" => "5549737300"
      );
    $payer->identification = array(
    "type" => "DNI",
    "number" => "123456789"
    );

    $payer->address = array(
    "street_name" => "Insurgentes Sur",
    "street_number" => 1602,
    "zip_code" => "03940"
    );

    $preference->payer = $payer;

    # Building an shipments
    $shipments = new MercadoPago\Shipments();
    $shipments->receiver_address = array(
    "zip_code" => "03940",
    "street_number" => 1602,
    "street_name" => "Insurgentes Sur",
    "floor" => 16,
    "apartment" => "C");

    $preference->shipments = $shipments;

    # Building an Item
    $item = new MercadoPago\Item();
    $item->id 			= "1234";
    $item->title 			= $_POST['title'];
    $item->description 		= "Dispositivo móvil de Tienda e-commerce";
    $item->quantity 		= $_POST['unit'];
    $item->unit_price 		= $_POST['price'];
    $item->picture_url		= $_SERVER['HTTP_REFERER'].$_POST['img'];

    $preference->items = array($item);

    # Building an back_urls
    $preference->back_urls = array(
    "success" => "https://josrod128-mp-commerce-php.herokuapp.com/resp.php?id=success",
    "failure" => "https://josrod128-mp-commerce-php.herokuapp.com/resp.php?id=failure",
    "pending" => "https://josrod128-mp-commerce-php.herokuapp.com/resp.php?id=pending");
    $preference->auto_return = "approved";

    $preference->payment_methods = array(									
        "excluded_payment_methods" => array(
        array("id" => "amex")
        ),
        "excluded_payment_types" => array(
        array("id" => "atm")
        ),
        "installments" => 6
        );

    $preference->external_reference = "jose12836@gmail.com";
    $preference->notification_url="https://josrod128-mp-commerce-php.herokuapp.com/webhook.php";
    $preference->save();

    // Crea un ítem en la preferencia
    // $item = new MercadoPago\Item();
    //     $item->id = 1234;
    //     $item->title = $_POST['title'];
    //     $item->currency_id = "MXN";
    //     $item->picture_url = $_POST['img'];
    //     $item->description = "Dispositivo móvil de Tienda e-commerce";
    //     $item->quantity = 1;
    //     $item->unit_price = $_POST['price'];
    // $payer = new MercadoPago\Payer();
    //     $payer->name = "Lalo";
    //     $payer->surname = "Landa";
    //     $payer->email = "test_user_81131286@testuser.com";
    //     $payer->phone = array(
    //       "area_code" => "52",
    //       "number" => "5549737300"
    //     );        
    //     $payer->address = array(
    //       "street_name" => "Insurgentes Sur",
    //       "street_number" => 1602,
    //       "zip_code" => "03940"
    //     );
    
    // // Crea un objeto de preferencia
    // $preference = new MercadoPago\Preference();
    //     $preference->items = array($item);
    //     $preference->payer = (object) array($payer);
    //     $preference->back_urls = array(
    //         "success"=>"https://josrod128-mp-commerce-php.herokuapp.com/resp.php?id=success",
    //         "failure"=>"https://josrod128-mp-commerce-php.herokuapp.com/resp.php?id=failure",
    //         "pending"=>"https://josrod128-mp-commerce-php.herokuapp.com/resp.php?id=pending"
    //     );
    //     $preference->auto_return = "approved";
    //     $preference->notification_url = "https://josrod128-mp-commerce-php.herokuapp.com/webhook.php";
    //     $preference->payment_methods = array(
    //         "excluded_payment_methods" => array(
    //         array("id" => "master")
    //         ),
    //         "excluded_payment_types" => array(
    //         array("id" => "atm")
    //         ),
    //         "installments" => 6
    //     );
    //     $preference->external_reference = "jose12836@gmail.com";
    // $preference->save();
/*
    visa
    4357 6064 1502 1810
    
    master
    5031 7531 3431 1717

*/



?>