<?php
    require('../env.php');
    require_once('../connetion.php');
    if(isset($_GET['refNo'])){
        $ref_no = $_GET['refNo'];
        $price = number_format($_GET['price'], 2);
    }

    $id = $_GET['id'];
    $sql_cre_order = "INSERT INTO order_detail(customer_id, product_id, result_code, ref_no, date_payment, amount, pay_method)
                        VALUES ('cus0001','$id','99','$ref_no',null, '$price', 'MobileBanking') ";

    $query = mysqli_query($con,$sql_cre_order);
    if($query) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <title>ชำระเงินด้วย Mobile Banking</title>
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

            <div class="card" style="border-radius: 40px; margin: 5% 20% 0 20%; padding: 5% 10% 5% 10%">
                <div class="d-flex justify-content-center">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/mobile-banking-app-4080602-3468647.png"
                        width=200px">
                </div>
                <h3 class="mt-3">ระบบชำระเงิน<br> Mobile Banking</h3>
                <form id="mobileBankingform" action="<?= $testUrlAPI?>v2/mobileBanking" method="POST">
                    <!-- <input type="hidden" name="detail" placeholder="Detail" value="detail" /><br />
                    <input type="hidden" name="customerName" value="customerName" />
                    <input type="hidden" name="customerEmail" value="customerEmail" />
                    <input type="hidden" name="customerAddress" value="customerAddress" />
                    <input type="hidden" name="merchantDefined1" value="merchantDefined1" />
                    <input type="hidden" name="merchantDefined2" value="merchantDefined2" />
                    <input type="hidden" name="merchantDefined3" value="merchantDefined3" />
                    <input type="hidden" name="merchantDefined4" value="merchantDefined4" />
                    <input type="hidden" name="merchantDefined5" value="merchantDefined5" /> -->
                    <div class="m-3">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">เลขที่คำสั่งซื้อ</span>
                            <input type="text" class="form-control" name="referenceNo" value="<?= $ref_no?>" />
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">ราคาสินค้า</span>
                            <input type="text" class="form-control" name="amount" maxlength="13" placeholder="Amount"
                                value="<?= $price?>" />
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">ธนาคาร</span>
                            <select class="form-select" name="bankCode" onchange="genChecksum()">
                                    <option value="004" selected>kBank</option>
                                    <option value="014">SCB</option>
                                    <option value="025">Krungsri</option>
                                </select>
                        </div>
                    </div>

                    <!-- <div class="row m-3 text-left">

                        <div class="col">
                            <p>เลขที่คำสั่งซื้อ</p>
                            <p>ราคาสินค้า</p>
                            <p class="mb-3">ธนาคาร</p>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input class="input-group-text mb-2" type="text" name="referenceNo"
                                    value="<?= $ref_no?>" /><br />
                                <input class="input-group-text mb-2" type="number" name="amount" maxlength="13"
                                    placeholder="Amount" value="<?= $price?>" />
                                <select class="form-select" name="bankCode" onchange="genChecksum()">
                                    <option value="004" selected>kBank</option>
                                    <option value="014">SCB</option>
                                    <option value="025">Krungsri</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <input class="btn btn-primary" id="button" type="submit" value="ต่อไป">
                    <input type="hidden" name="publicKey" value="<?= $public_key?>" /><br />
                    <input type="hidden" name="customerTelephone" value="0619807818" /><br />

                    <input type="hidden" name="backgroundUrl" value="<?= $resUrl?>res_bank.php" /><br />
                    <input type="hidden" name="responseUrl" value="<?= $resUrl?>res_bank.php" /><br />
                    <input type="hidden" name="checksum" placeholder="checksum" value=""><br />
                </form>
            </div>
        </div>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
        <script>
        function genChecksum() {
            var bankCode = document.getElementsByName("bankCode")[0].value;
            var hash = CryptoJS.HmacSHA256(document.getElementsByName("amount")[0].value +
                document.getElementsByName("referenceNo")[0].value +
                document.getElementsByName("responseUrl")[0].value +
                document.getElementsByName("backgroundUrl")[0].value +
                bankCode, 'UKrMkNMg8jY7ZovzN8MIqvpXpZgRSzDn'
            );
            document.getElementsByName("checksum")[0].value = hash;
        }
        </script>

</body>

</html>