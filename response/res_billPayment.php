<?php

    $respFile = fopen("log/resp-bill-payment-log.txt", "w") or die("Unable to open file!");

    $json_str = file_get_contents('php://input');
    fwrite($respFile, $json_str . "");

    $json_obj = json_decode($json_str);

    fwrite($respFile, "resultCode=" . $json_obj->resultCode . "");
    fwrite($respFile, "amount=" . $json_obj->amount . "");
    fwrite($respFile, "referenceNo=" . $json_obj->referenceNo . "");
    fwrite($respFile, "gbpReferenceNo=" . $json_obj->gbpReferenceNo . "");
    fwrite($respFile, "currencyCode=" . $json_obj->currencyCode . "");

    fclose($respFile);

?>