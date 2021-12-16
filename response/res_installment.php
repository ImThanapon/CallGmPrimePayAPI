<?php
    $respFile = fopen("log/bg-log_qr.txt", "w") or die("Unable to open file!");

    $json_str = file_get_contents('php://input');
    fwrite($respFile, $json_str . "\n\n");
    $json_obj = json_decode($json_str);

    fwrite($respFile, "resultCode=" . $json_obj->resultCode . "\n");
    fwrite($respFile, "amount=" . $json_obj->amount . "\n");
    fwrite($respFile, "referenceNo=" . $json_obj->referenceNo . "\n");
    fwrite($respFile, "gbpReferenceNo=" . $json_obj->gbpReferenceNo . "\n");
    fwrite($respFile, "currencyCode=" . $json_obj->currencyCode . "\n");
    fwrite($respFile, "totalAmount=" . $json_obj->totalAmount . "\n");
    fwrite($respFile, "thbAmount=" . $json_obj->thbAmount . "\n");

    fclose($respFile);

    
        echo $json_obj->resultCode;

    

?>