<?php
     require_once '../../../stripe-php-master/init.php';
     require_once 'config.php';
     require '../admin/database/con_db.php';
    if(!empty($_GET['session_id'])){
        session_start();
        $session_id = $_GET['session_id'];

        try{
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
            $customer_email = $checkout_session->customer_details->email;

            $paymentIntent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            
            if($paymentIntent->status == "succeeded"){

                
                    $vaicajums = $savienojums->prepare("INSERT INTO it_maksajumi (reference, epasts) VALUES (?, ?)");
                    $vaicajums->bind_param("ss", $transactionID, $customer_email);
                    $vaicajums->execute();

                $transactionID = $paymentIntent->id;
                $statusMsg = "<h2>
                    Maksajums Veismigi apsradats
                </h2>
                <p>
                    Lai turpmak iegutu pro privelegijas, veicot jaunu pieteikumu, izmantojiet so epastu: <b>$customer_email</b>
                </p>
                <p>Maksajuma reference: <b>$transactionID</b></p>
                ";
            }else{
                $statusMsg = "Problemas ar maksajuma apstradi";
            }

        }catch(Exception $e){
            $statusMsg = "Nav iespejams iegut maksajumu informaciju".$e->getMessage();
        }

        $_SESSION['pazinojums'] = $statusMsg;
    }

    header("location: ../")
?>
