<?php
    require_once('../connetion.php');
    require('../env.php');
    $id = $_GET['id'];
    $refNo = $_GET['refNo'];
    $price = $_GET['price'];
    $sql_cre_order = "INSERT INTO order_detail(customer_id, product_id, result_code, ref_no, date_payment, amount)
                      VALUES ('cus0001','$id','99','$refNo',null, '$price') ";
    $query = mysqli_query($con,$sql_cre_order);
    if($query) {
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

    <title>Gen Token</title>
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
                <div class="d-flex justify-content-center">
                    <img src="https://www.paymentsjournal.com/wp-content/uploads/2018/06/bank-3487033_1920.png" width=200px">
                </div>
                <h3>กรุณากรอกข้อมูลบัตรเครดิต</h3>
                <form action="#" method="POST">
                    <div class="row m-3 text-left">
                        <div class="col">
                            <p>ชื่อผู้ถือบัตร</p>
                            <p>หมายเลขบัตร</p>
                            <p>เดือนที่หมดอายุ</p>
                            <p>ปีที่หมดอายุ</p>
                            <p>รหัส CVV</p>
                        </div>
                        <div class="col">
                            <input class="mb-2" id="name" type="text" maxlength="250" placeholder="Holder Name"
                                value=""><br />
                            <input class="mb-2" id="number" type="text" maxlength="16" placeholder="Card Number"
                                value=""><br />
                            <input class="mb-2" id="expirationMonth" type="text" maxlength="2" placeholder="MM"
                                value=""><br />
                            <input class="mb-2" id="expirationYear" type="text" maxlength="2"
                                placeholder="YY (Last Two Digits)" value=""><br />
                            <input class="mb-2" id="securityCode" type="password" maxlength="3" autocomplete="off"
                                placeholder="CVV" value=""><br />
                        </div>
                    </div>

                    <input class="btn btn-primary" id="button" type="submit" value="ต่อไป">
                </form>
            </div>

            

        </div>
        <div class="text-center">
        Card Test <br>
        Card Number : 4535017710535741	<br>
        MM/YY : 05/28	<br>
        CVV : 184<br><br>

        Card Number : 5258860689905862	<br>
        MM/YY : 02/25	<br>
        CVV : 950
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    document.getElementById("button").addEventListener("click", function(event) {
        event.preventDefault();
        var publicKey = "<?= $public_key?>";
        var dataReq = {
            "rememberCard": false,
            "card": {
                "name": document.getElementById("name").value,
                "number": document.getElementById("number").value,
                "expirationMonth": document.getElementById("expirationMonth").value,
                "expirationYear": document.getElementById("expirationYear").value,
                "securityCode": document.getElementById("securityCode").value
            }
        };
        $.ajax({
            type: "POST",
            url: "<?= $testUrlAPI?>v2/tokens",
            data: JSON.stringify(dataReq),
            contentType: "application/json",
            dataType: "json",
            headers: {
                "Authorization": "Basic " + btoa("<?= $public_key?>" + ":")
            },
            success: function(dataResp) {
                var dataStr = JSON.stringify(dataResp);
                // alert(dataResp['card'].token);
                window.location.href = "<?= $host?>payment/credit.php?token=" + dataResp['card'].token + "&refNo=<?= $_GET['refNo']?>&price=<?= $_GET['price']?>";
            },
            failure: function(errMsg) {
                alert(errMsg);
            }
        });
    });
    </script>
</body>

</html>