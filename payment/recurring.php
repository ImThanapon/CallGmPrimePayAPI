<?php
require('../env.php');

if (isset($_GET['token'])) {
  echo "have Token <br>";
  echo $_GET['token'] . "<br>";
  echo $_GET['refNo'] . "<br>";
  echo $_GET['recAmount'];

  $token = $_GET['token'];
  $referenceNo = $_GET['refNo'];
  $recurringAmount = $_GET['recAmount'];


  $data = array(
    "processType" => "I", //API กำหนด
    "referenceNo" => $referenceNo,
    "recurringAmount" => $recurringAmount,
    "recurringInterval" => "M", //กำหนดให้ชำระเป็น M คือรายเดือน มี M เดือน, Q ไตรมาส, Y ปี
    "recurringCount" => 3, //จำนวนงวด / ครั้งที่ให้ตัดชำระ
    "recurringPeriod" => "01", //วันที่ตัดชำระของแต่ละเดือน กำหนดให้เป็นวันที่ 1 ของเดือน
    "allowAccumulate" => "Y", //หากชำระไม่สำเร็จให้สะสมในรอบถัดไป
    "cardToken" => $token,
    "backgroundUrl" => $resUrl . 'res_recurring.php'

  );

  $payload = json_encode($data);

  $ch = curl_init($testUrlAPI . 'v1/recurring');
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
  echo '<pre>';
  echo "test";
  print_r($result);
  echo '</pre>';
  // header( "location: 3DSecure.php?gbpReferenceNo=".$chargeResp['gbpReferenceNo'] );
}
