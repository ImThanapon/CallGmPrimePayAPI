<?php
    require_once('../connetion.php');
    require('../env.php');
    $id = $_GET['id'];
    $ref_no = $_GET['refNo'];
    $amount = $_GET['price'];
    // $sql_cre_order = "INSERT INTO order_detail(customer_id, product_id, result_code, ref_no, date_payment, amount)
    //                   VALUES ('6121600233','$id','99','$refNo',null, '$price') ";
    // $query = mysqli_query($con,$sql_cre_order);
    // if($query) {
    // }
    // mysqli_close($con);
   
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

    <title>Pay with Bill Payment</title>
</head>

<body class="hold-transition lockscreen">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= $host?>">
                <img src="https://cdn2.iconfinder.com/data/icons/real-estate-1-12/50/13-512.png" alt="" width="30"
                    height="24" class="d-inline-block align-text-top">
                    Store by AdminLTE<b> ระบบหลังบ้าน</b> 
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mt-5">
            
            <div class="card" style="border-radius: 40px; margin: 5% 35% 0 35%; padding: 5% 0 5% 0">
                <div class="d-flex justify-content-center">
                    <img src="https://cdn.brainpop.com/socialstudies/usgovernment/howabillbecomesalaw/icon.png" width=100px">
                </div>
                <h3>กรุณากรอกข้อมูลลูกค้า</h3>

                <form action="<?= $testUrlAPI?>gbp/gateway/barcode" method="POST"> 
                    <input type="hidden" name="token" value="<?= $customerID?>" >
                    <input type="hidden" name="backgroundUrl" value="<?= $resUrl?>res_billPayment.php">
                                       
                
                    <div class="row m-3 text-left">
                        <div class="col">
                            <p>ชื่อ-สกุล</p>
                            <p>Email</p>
                            <p>ที่อยู่</p>
                            <p>รหัสอ้างอิง</p>
                            <p>ยอดชำระเงิน</p>
                            
                        </div>
                        <div class="col">
                            <input class="mb-2" type="text" name="customerName" placeholder="กรอกชื่อ-สกุล" value="">
                            <input class="mb-2" type="text" name="customerEmail" placeholder="กรอกที่อยู่อีเมล" value="">
                            <input class="mb-2" type="text" name="merchantDefined1" placeholder="กรอกที่อยู่" value="">
                            <input class="mb-2" type="text" name="referenceNo"placeholder="Amount" value="<?= $ref_no?>" disabled>
                            <input class="mb-2" type="number" name="amount" placeholder="Amount" value="<?= $amount?>" disabled>
                        </div>
                    </div>

                    <input class="btn btn-primary" id="button" type="submit" value="ออกใบแจ้งชำระเงิน">
                </form>
            </div>

        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>

</html>


