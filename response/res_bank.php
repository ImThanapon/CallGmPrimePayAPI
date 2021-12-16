<?php

$respFile = fopen("log/bg-log".$referenceNo.".txt", "w") or die("Unable to open file!");
$gbpReferenceNo = $_POST["gbpReferenceNo"];
fwrite($respFile, "gbpReferenceNo : ".$gbpReferenceNo . "\n");

$referenceNo = $_POST["referenceNo"];
fwrite($respFile, $referenceNo . "\n");

$amount = $_POST["amount"];
fwrite($respFile, "amount : ".$amount . "\n");

$currencyCode = $_POST["currencyCode"];
fwrite($respFile, "currencyCode : ".$currencyCode . "\n");

$resultCode = $_POST["resultCode"];
fwrite($respFile, "resultCode : ".$resultCode . "\n");

fclose($respFile);

if($_POST["resultCode"] =='00'){
    echo "ok";
}


?>