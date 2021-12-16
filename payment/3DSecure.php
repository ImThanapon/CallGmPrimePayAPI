<?php
  require('../env.php');
  // $gbpRefNO = $_GET['gbpReferenceNo'];
  if (isset($_GET['gbpReferenceNo'])) {
    // echo $_GET['gbpReferenceNo'];
  }
?>
<form name="form" action="<?= $testUrlAPI?>v2/tokens/3d_secured" method="POST">
  publicKey: <input type="text" name="publicKey" value="<?= $public_key ?>" /><br>
  gbpReferenceNo: <input type="text" name="gbpReferenceNo" value="<?= $_GET['gbpReferenceNo'] ?>" />
  <button type="submit">Pay</button>
</form>
<script>
  window.onload=function(){
    document.forms["form"].submit();
  }
</script>