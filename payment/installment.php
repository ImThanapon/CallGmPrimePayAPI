<?php
require('../env.php');
require_once('../connetion.php');

if (isset($_GET['refNo'])) {
    $ref_no = $_GET['refNo'];
    $price = number_format($_GET['price'], 2);
}

$id = $_GET['id'];
$sql_cre_order = "INSERT INTO order_detail(customer_id, product_id, result_code, ref_no, date_payment, amount, pay_method)
                        VALUES ('cus0001','$id','99','$ref_no',null, '$price', 'installment') ";

$query = mysqli_query($con, $sql_cre_order);
if ($query) {
    // echo "000";
}
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay with Installment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
</head>

<body class="hold-transition lockscreen">
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= $host ?>">
                <img src="https://cdn2.iconfinder.com/data/icons/real-estate-1-12/50/13-512.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Store by AdminLTE
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="text-center mt-5">

            <div class="card" style="border-radius: 40px; margin: 5% 35% 0 35%; padding: 5% 0 5% 0">
                <div class="d-flex justify-content-center">
                    <img src="https://www.paymentsjournal.com/wp-content/uploads/2018/06/bank-3487033_1920.png" width=200px">
                </div>
                <h3>ระบบผ่อนชำระ</h3>
                <form action="<?= $testUrlAPI ?>/v3/installment" method="POST">
                    <div class="row m-3 text-left">
                        <div class="col">
                            <p>ราคาสินค้า</p>
                            <p>ธนาคาร</p>
                            <p>จำนวนงวด</p>
                        </div>
                        <div class="col">
                            <input class="mb-2" type="hidden" name="publicKey" value="<?= $public_key ?>">
                            <input class="mb-2" type="hidden" name="referenceNo" value="<?= $ref_no ?>">
                            <input class="mb-2" type="hidden" name="responseUrl" value="<?= $resUrl ?>res_installment.php">
                            <input class="mb-2" type="hidden" name="backgroundUrl" value="<?= $resUrl ?>res_installment.php">
                            <!-- <input class="mb-2" type="text" name="detail" placeholder="Detail" value="ข้อมูลรายละเอียด"><br /> -->
                            <input class="mb-2" type="number" name="amount" maxlength="13" placeholder="Amount" value="<?= $price ?>"><br />
                            <input onchange="genChecksum()" class="mb-2" type="text" name="bankCode" maxlength="3" placeholder="Bank Code Ex.014, 004, 025" value=""><br />
                            <input onchange="genChecksum()" class="mb-2" type="number" name="term" maxlength="2" placeholder="The number of monthly installments Ex.2" value=""><br />
                        </div>
                    </div>
                    <input type="hidden" name="checksum" placeholder="checksum" value=""><br />
                    <!-- <input id="button" type="button"  value="Generate Checksum"><br /> -->
                    <input class="btn btn-primary" id="button" type="submit" value="ต่อไป">
                </form>
            </div>
        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
        <script>
            function genChecksum() {
                var hash = CryptoJS.HmacSHA256(
                    document.getElementsByName("amount")[0].value +
                    document.getElementsByName("referenceNo")[0].value +
                    document.getElementsByName("responseUrl")[0].value +
                    document.getElementsByName("backgroundUrl")[0].value +
                    document.getElementsByName("bankCode")[0].value +
                    document.getElementsByName("term")[0].value, 'UKrMkNMg8jY7ZovzN8MIqvpXpZgRSzDn');

                document.getElementsByName("checksum")[0].value = hash;
            }
        </script>


</body>

</html>