<?php require('env.php')?>
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


    <title>Product</title>
</head>

<body>
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
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1>Product Detail</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review
                                </h3>
                                <div class="col-12">
                                    <img src="<?php echo $_GET['img'];?>" class="product-image" alt="Product Image">
                                </div>

                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3"><?php echo $_GET['name'];?> <span
                                        class="badge bg-secondary">referenceNo : <?php echo $ranRefNo;?></span><br></h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit repudiandae earum
                                    accusantium architecto amet recusandae quam quisquam excepturi dolore nobis!</p>
                                <div class="bg-gray py-2  mt-4 text-center">
                                    <div class="alert alert-warning" role="alert">
                                        <h1> Price <?php echo $_GET['price'];?>฿</h1>
                                    </div>


                                </div>
                                <hr>


                                <div class="mt-4">
                                    <h3>ช่องทางการชำระเงิน</h3>

                                    <a class="btn btn-primary"
                                        href="payment/genToken.php?id=<?= $_GET['p_id']?>&price=<?= $_GET['price']?>&refNo=<?= $ranRefNo?>">ชำระด้วย
                                        Credit/Debit card</a>
                                        <a class="btn btn-info text-dark"
                                        href=">">ชำระด้วย
                                        Recurring</a>
                                    
                                    <a class="btn btn-warning"
                                        href="payment/installment.php?id=<?= $_GET['p_id']?>&price=<?= $_GET['price']?>&refNo=<?= $ranRefNo?>">ระบบผ่อนชำระ
                                        Installment</a>

                                    <br><br>
                                    <a class="btn btn-secondary"
                                        href="payment/qrcode.php?id=<?= $_GET['p_id']?>&price=<?= $_GET['price']?>&refNo=<?= $ranRefNo?>">ชำระด้วย
                                        QR Code</a>
                                    <a class="btn btn-danger"
                                        href="payment/mobile_banking.php?id=<?= $_GET['p_id']?>&price=<?= $_GET['price']?>&refNo=<?= $ranRefNo?>">ชำระด้วย
                                        Mobile Banking</a>
                                    <a class="btn btn-success"
                                        href="payment/bill_payment.php?id=<?= $_GET['p_id']?>&price=<?= $_GET['price']?>&refNo=<?= $ranRefNo?>">ชำระด้วย
                                        Bill Payment</a>
                                </div>



                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->







    </div>
</body>

</html>