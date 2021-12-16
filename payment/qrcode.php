<?php
  require('../env.php');
  require_once('../connetion.php');
  $id = $_GET['id'];
  $refNo = $_GET['refNo'];
  $price = $_GET['price'];
  $sql_cre_order = "INSERT INTO order_detail(customer_id, product_id, result_code, ref_no, date_payment, amount, pay_method)
                    VALUES ('cus0001','$id','99','$refNo',null, '$price', 'qr') ";
  $query = mysqli_query($con,$sql_cre_order);
  if($query) {
    // echo "";
  }
  mysqli_close($con);
?>
<form name="form" action="<?= $testUrlAPI?>gbp/gateway/qrcode" method="POST">
    <input type="hidden" name="token" value="<?= $customerID?>">
    <input type="hidden" name="referenceNo" value="<?= $_GET['refNo']?>">
    <input type="hidden" name="backgroundUrl" value="<?= $resUrl?>res_qr.php">
    <input type="number" name="amount" maxlength="13" placeholder="Amount" value="<?= $_GET['price']?>"><br />
    <input id="button" type="submit" value="Pay Now">
</form>
<script>
window.onload = function() {
    document.forms["form"].submit();
}
</script>