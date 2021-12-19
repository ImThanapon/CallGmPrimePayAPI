<?php
session_start();

require('../env.php');

if (isset($_GET['token'])) {
  $token = $_GET['token'];

  $data = array(
    'amount' => $_SESSION['price'],
    'referenceNo' => $_SESSION['ref_no'],
    'detail' => 't-shirt',
    'customerName' => 'John',
    'customerEmail' => 'example@gbprimepay.com',
    'merchantDefined1' => 'Promotion',
    'card' => array(
      'token' => $token,
    ),
    'otp' => 'Y',
    'backgroundUrl' => $resUrl . 'res_credit.php',
    'responseUrl' => $resUrl . 'res_credit.php'
  );

  $payload = json_encode($data);

  $ch = curl_init($testUrlAPI . 'v2/tokens/charge');
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ':');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

  curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($payload)
    )
  );

  $result = curl_exec($ch);

  curl_close($ch);

  $chargeResp = json_decode($result, true);
  $_SESSION['gbpReferenceNo'] = $chargeResp['gbpReferenceNo'];
  header("location: 3DSecure.php");
}
