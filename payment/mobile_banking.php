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
  <title>ชำระเงินด้วย Mobile Banking</title>
</head>
<body>
  <form id="mobileBankingform" action="<?= $testUrlAPI?>v2/mobileBanking" method="POST"> 
    <input type="hidden" name="publicKey" value="<?= $public_key ?>" /><br/>
    <input type="hidden" name="referenceNo" value="<?= $ref_no ?>" /><br/>
    <input type="hidden" name="backgroundUrl" value="<?= $resUrl?>red_bank.php" /><br/>
    <input type="hidden" name="responseUrl" value="<?= $resUrl?>red_bank.php" /><br/>
    <label>Amount: </label>
    <input type="number" name="amount" maxlength="13" placeholder="Amount" value="<?= $price ?>" /><br/>
    <div>
    <label>Bank Code: </label>
    <input type="radio" name="bankCode" value="004" checked="checked" /> kBank 
    <input type="radio" name="bankCode" value="014" /> SCB
    <input type="radio" name="bankCode" value="025" /> Krungsri 
    </div></br> 


    <div>
    <label>Checksum: </label> 
    <input type="text" name="checksum" value="" /><br/>
    <input id="button" type="button" onClick="genChecksum()" value="Generate Checksum" />
    </div>
    <div> 
      <button type="submit">Pay</button> 
    </div>
  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
  <script>
    function genChecksum(){ 
      var elements = document.getElementsByName("bankCode");
      for (var i = 0, l = elements.length; i < l; i++) {
        if (elements[i].checked){
          bankCode = elements[i].value;
        }
      }
      var hash = CryptoJS.HmacSHA256( 
      <?= $price?> 
      + <?= $ref_no?> 
      + "<?= $resUrl?>red_bank.php" 
      + "<?= $resUrl?>red_bank.php"
      + bankCode , <?= $secret_key?>); 

      document.getElementsByName("checksum")[0].value = hash;
    }
  </script>
  
</body>
</html>