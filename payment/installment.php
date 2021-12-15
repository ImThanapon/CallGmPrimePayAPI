<?php
    require('../env.php');
    if(isset($_GET['refNo'])){
        $ref_no = $_GET['refNo'];
        $price = $_GET['price'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay with Installment</title>
</head>
<body>
    <form action="<?= $testUrlAPI?>v3/installment" method="POST"> 
    <input type="hidden" name="publicKey" value="<?= $public_key?>">
    <input type="hidden" name="referenceNo" value="<?= $ref_no?>">
    <input type="hidden" name="responseUrl" value="<?= $resUrl?>res_installment.php">
    <input type="hidden" name="backgroundUrl" value="<?= $resUrl?>res_installment.php">
    <input type="number" name="amount" maxlength="13" placeholder="Amount" value="<?= $price?>"><br/>
    <input type="text" name="bankCode" maxlength="3" placeholder="Bank Code" value="014"><br/>
    <input type="number" name="term" maxlength="2" placeholder="The number of monthly installments" value="10"><br/>
    <input type="hidden" name="checksum" placeholder="checksum" value="{checksum}"><br/>
    <input id="button" type="button" onClick="genChecksum()" value="Generate Checksum">
    <input id="button" type="submit" value="Pay Now">
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
    <script>
    function genChecksum(){
    var hash = CryptoJS.HmacSHA256(
            document.getElementsByName("amount")[0].value +
            document.getElementsByName("referenceNo")[0].value + 
            document.getElementsByName("responseUrl")[0].value + 
            document.getElementsByName("backgroundUrl")[0].value + 
            document.getElementsByName("bankCode")[0].value +
            document.getElementsByName("term")[0].value ,
    <?= $secret_key?>);

    document.getElementsByName("checksum")[0].value = hash;
    }
    </script>
</body>
</html>