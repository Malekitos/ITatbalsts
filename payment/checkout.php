<?php
    require_once '../../../stripe-php-master/init.php';
    require_once 'config.php';

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "https://kristovskis.lv/3pt2/svilis/ITatbalsts/payment/success.php?session_id={CHECKOUT_SESSION_ID}",
        "cancel_url" => "https://kristovskis.lv/3pt2/svilis/ITatbalsts/",
        "locale" => "ru",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "eur", // Fixed typo here
                    "unit_amount" => 9999,
                    "product_data" => [
                        "name" => "PRO plans (uz 1 gadu)"
                    ]
                ]
            ]
        ]
    ]);

    header("Location: ".$checkout_session->url);
?>
