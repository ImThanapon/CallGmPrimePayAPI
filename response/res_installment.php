<?php
    require_once('../connetion.php');

    $respFile = fopen("log/res-log_installment.txt", "w") or die("Unable to open file!");

    $json_str = file_get_contents('php://input');
    fwrite($respFile, $json_str . "\n\n");
    $json_obj = json_decode($json_str);

    $resultCode = $json_obj->resultCode;
    $amount = $json_obj->amount;
    $referenceNo = $json_obj->referenceNo;
    $gbpReferenceNo = $json_obj->gbpReferenceNo;
    $currencyCode = $json_obj->currencyCode;
    $totalAmount = $json_obj->totalAmount;
    $thbAmount = $json_obj->thbAmount;

    fwrite($respFile, "resultCode=" . $json_obj->resultCode . "\n");
    fwrite($respFile, "amount=" . $json_obj->amount . "\n");
    fwrite($respFile, "referenceNo=" . $json_obj->referenceNo . "\n");
    fwrite($respFile, "gbpReferenceNo=" . $json_obj->gbpReferenceNo . "\n");
    fwrite($respFile, "currencyCode=" . $json_obj->currencyCode . "\n");
    fwrite($respFile, "totalAmount=" . $json_obj->totalAmount . "\n");
    fwrite($respFile, "thbAmount=" . $json_obj->thbAmount . "\n");

    fclose($respFile);

    
    echo $resultCode;

    $date_pay = date("y-m-d H:i:s");
    if($resultCode == '00'){
        $sql_update = " UPDATE order_detail 
                        SET date_payment = '$date_pay',
                            result_code = '$resultCode',
                            amount = '$amount',
                            gbp_ref_no = ' $gbpReferenceNo',
                            currency_code = '$currencyCode' 
                        WHERE ref_no = '$referenceNo'";

        $query = mysqli_query($con,$sql_update);
        if($query) {

            // echo "Record add successfully";
        }else{
        // echo 'เพิ่มข้อมูลไม่สำเร็จ';
        }
        mysqli_close($con);
    }else{
        $sql_update = " UPDATE order_detail 
                        SET result_code = '88'                            
                        WHERE ref_no = '$referenceNo'";

        $query = mysqli_query($con,$sql_update);
        if($query) {

            // echo "Record add successfully";
        }else{
        // echo 'เพิ่มข้อมูลไม่สำเร็จ';
        }
        mysqli_close($con);

    }

    

?>