<?php
  require_once('../connetion.php');
  require_once('../env.php');

  $respFile = fopen("log/resp-credit-log.txt", "w") or die("Unable to open file!");

  $respResultCode = $_POST["resultCode"];
  fwrite($respFile, "resultCode : " . $respResultCode . "\n");

  $respAmount = $_POST["amount"];
  fwrite($respFile, "amount : " . $respAmount . "\n");

  $respReferenceNo = $_POST["referenceNo"];
  fwrite($respFile, "referenceNo : " . $respReferenceNo . "\n");

  $respGbpReferenceNo = $_POST["gbpReferenceNo"];
  fwrite($respFile, "gbpReferenceNo : " . $respGbpReferenceNo . "\n");

  $respCurrencyCode = $_POST["currencyCode"];
  fwrite($respFile, "currencyCode : " . $respCurrencyCode . "\n");

  fclose($respFile);
  date_default_timezone_set('Asia/Bangkok');
  $date_pay = date("y-m-d H:i:s");

  if($respReferenceNo){
    $sql_update = " UPDATE order_detail 
                    SET date_payment = '$date_pay',
                        result_code = '$respResultCode',
                        amount = '$respAmount',
                        gbp_ref_no = '$respGbpReferenceNo',
                        currency_code = '$respCurrencyCode' 
                    WHERE ref_no = '$respReferenceNo'";

    $query = mysqli_query($con,$sql_update);
    if($query) {

        // echo "Record add successfully";
    }else{
      // echo 'เพิ่มข้อมูลไม่สำเร็จ';
    }
    mysqli_close($con);
    
  }
  



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>สถานะการชำระเงิน</title>
</head>

<body class="hold-transition lockscreen">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= $host?>">
                <img src="https://cdn2.iconfinder.com/data/icons/real-estate-1-12/50/13-512.png" alt="" width="30"
                    height="24" class="d-inline-block align-text-top">
                Store by AdminLTE
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mt-5">
            <div class="card" style="border-radius: 40px; margin: 5% 35% 0 35%; padding: 5% 0 5% 0">

                <h3>รายงานการทำธุรกรรม</h3>

                <h5>สถานะการชำระเงิน :
                    <?php echo ($respResultCode == "00") ? '<span class="badge bg-success">สำเร็จ</span>' : '<span class="badge bg-danger">ไม่สำเร็จ</span>';?>
                </h5>

                <?php echo ($respResultCode != "00") ? '
                <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                    <span>เกิดข้อผิดพลาดในขั้นตอนการชำระเงิน <br>กรุณาตรวจสอบข้อมูลบัตรของท่านอีกครั้ง</span></div>' : '';?>



                <h5>หมายเลขอ้างอิง : <?php echo ($respResultCode == "00") ? $_POST["referenceNo"] : '-';?></h5>


                <div class="d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-primary btn-sm rounded-pill" href="<?= $host?>">กลับสู่หน้าหลัก</a>
                </div>



            </div>

        </div>

    </div>

</body>

</html>