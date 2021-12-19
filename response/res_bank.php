<?php
    require_once('../connetion.php');

    $respFile = fopen("log/bg-log".$referenceNo.".txt", "w") or die("Unable to open file!");
    $gbpReferenceNo = $_POST["gbpReferenceNo"];
    fwrite($respFile, "gbpReferenceNo : ".$gbpReferenceNo . "\n");

    $referenceNo = $_POST["referenceNo"];
    fwrite($respFile, "referenceNo : ".$referenceNo . "\n");

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
