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
    <title>ชำระเงินด้วย Mobile Banking</title>
</head>

<body>
    <form id="mobileBankingform" action="<?= $testUrlAPI?>v2/mobileBanking" method="POST">
        <input type="hidden" name="publicKey" value="<?= $public_key?>" /><br />
        <input type="hidden" name="customerTelephone" value="0619807818" /><br />
        <input type="hidden" name="referenceNo" value="<?= $ref_no?>" /><br />
        <input type="hidden" name="backgroundUrl" value="<?= $resUrl?>res_bank.php" /><br />
        <input type="hidden" name="responseUrl" value="<?= $resUrl?>res_bank.php" /><br />
        <label>Amount: </label>
        <input type="number" name="amount" maxlength="13" placeholder="Amount" value="<?= $price?>" /><br />
        <div>
            <label>Bank Code: </label>
            <input type="radio" name="bankCode" value="004" checked="checked" /> kBank
            <input type="radio" name="bankCode" value="014" /> SCB
            <input type="radio" name="bankCode" value="025" /> Krungsri
        </div></br>
        <input type="hidden" name="detail" placeholder="Detail" value="{detail}" /><br />
        <input type="hidden" name="customerName" value="{customerName}" /><br />
        <input type="hidden" name="customerEmail" value="{customerEmail}" /><br />
        <input type="hidden" name="customerAddress" value="{customerAddress}" /><br />
        <input type="hidden" name="merchantDefined1" value="{merchantDefined1}" /><br />
        <input type="hidden" name="merchantDefined2" value="{merchantDefined2}" /><br />
        <input type="hidden" name="merchantDefined3" value="{merchantDefined3}" /><br />
        <input type="hidden" name="merchantDefined4" value="{merchantDefined4}" /><br />
        <input type="hidden" name="merchantDefined5" value="{merchantDefined5}" /><br />
        <div>
            <label>Checksum: </label>
            <input type="text" name="checksum" value="" /><br />
            <input id="button" type="button" onclick="genChecksum()" value="Generate Checksum" />
        </div>
        <div>
            <button type="submit">Pay</button>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
    <script>
    function genChecksum() {
        var elements = document.getElementsByName("bankCode");
        for (var i = 0, l = elements.length; i < l; i++) {
            if (elements[i].checked) {
                bankCode = elements[i].value;
            }
        }
        var hash = CryptoJS.HmacSHA256(document.getElementsByName("amount")[0].value +
            document.getElementsByName("referenceNo")[0].value +
            document.getElementsByName("responseUrl")[0].value +
            document.getElementsByName("backgroundUrl")[0].value +
            bankCode,'UKrMkNMg8jY7ZovzN8MIqvpXpZgRSzDn'
        );

        document.getElementsByName("checksum")[0].value = hash;
    }
    </script>

</body>

</html>