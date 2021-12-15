<?php
  require('../env.php');
?>
    <form name="form" action="<?= $testUrlAPI?>gbp/gateway/qrcode" method="POST"> 
        <input type="hidden" name="token" value="<?= $customerID?>">
        <input type="hidden" name="referenceNo" value="<?= $_GET['refNo']?>">
        <input type="hidden" name="backgroundUrl" value="<?= $resUrl?>res_qr.php">

        <input type="number" name="amount" maxlength="13" placeholder="Amount" value="<?= $_GET['price']?>"><br/>
        <input id="button" type="submit" value="Pay Now">
    </form>
<script>
  window.onload=function(){
    document.forms["form"].submit();
  }
</script>

