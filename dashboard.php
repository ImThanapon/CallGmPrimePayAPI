<?php
    require_once('connetion.php');
    require('env.php');
    $sql_select_order = "SELECT * FROM order_detail";
    $result = mysqli_query($con, $sql_select_order);
    $rows_order = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 3</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="<?= $host?>">
                    <img src="https://cdn2.iconfinder.com/data/icons/real-estate-1-12/50/13-512.png" alt="" width="30"
                        height="24" class="d-inline-block align-text-top">
                    Store by AdminLTE<b> ระบบหลังบ้าน</b>
                </a>
            </div>
        </nav>



        <!-- Content Wrapper. Contains page content -->
        <div class="container content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row pt-3">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Order Detail รายการคำสั่งซื้อ</h3>
                                </div>

                            </div>
                            <!-- /.card -->
                            <div class=" table-responsive p-2">
                                <table id="myTable" class="table table-striped table-valign-middle text-center">
                                    <thead>
                                        <tr>
                                            <th>เลขที่คำสั่งซื้อ</th>
                                            <th>รหัสลูกค้า</th>
                                            <th>รหัสสินค้า</th>
                                            <th>จำนวนเงิน</th>
                                            <th>สถานะ</th>
                                            <th>เวลาชำระเงิน</th>
                                            <th>ช่องทาง</th>                                    
                                            <th>เครื่องมือ</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // echo "<pre>";
                                        // print_r($rows_order);
                                        // echo "</pre>";
                                        for ($i=0; $i < count($rows_order) ; $i++) { ?>
                                        <tr>
                                            <td><?= $rows_order[$i]['ref_no']?></td>
                                            <td><?= $rows_order[$i]['customer_id']?></td>
                                            <td><?= $rows_order[$i]['product_id']?></td>
                                            <td><?= $rows_order[$i]['amount']?></td>
                                            <td>
                                                <?php
                                                    if($rows_order[$i]['result_code'] == '00'){
                                                        echo '<span class="badge rounded-pill bg-success">ชำระเงินแล้ว</span>';
                                                    }
                                                    if($rows_order[$i]['result_code'] == '99'){
                                                        echo '<span class="badge rounded-pill bg-warning text-dark">รอการชำระเงิน</span>';
                                                    }
                                                    if($rows_order[$i]['result_code'] == '88'){
                                                        echo '<span class="badge rounded-pill bg-danger">ทำรายการไม่สำเร็จ</span>';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($rows_order[$i]['result_code'] == '00'){
                                                        echo $rows_order[$i]['date_payment'];
                                                    }else{
                                                        echo '-';
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($rows_order[$i]['pay_method'] == 'credit'){
                                                        echo '<span class="badge bg-secondary">Credit Card</span>';
                                                    }
                                                    if($rows_order[$i]['pay_method'] == 'qr'){
                                                        echo '<span class="badge bg-secondary">QR code</span>';
                                                    }
                                                    if($rows_order[$i]['pay_method'] == 'installment'){
                                                        echo '<span class="badge bg-secondary">Installment</span>';
                                                    }
                                                    if($rows_order[$i]['pay_method'] == 'bill'){
                                                        echo '<span class="badge bg-secondary">Bill</span>';
                                                    }
                                                    if($rows_order[$i]['pay_method'] == 'MobileBanking'){
                                                        echo '<span class="badge bg-secondary">Mobile Banking</span>';
                                                    }
                                                    if($rows_order[$i]['pay_method'] == 'recurring'){
                                                        echo '<span class="badge bg-secondary">Recurring</span>';
                                                    }
                                                ?>
                                            </td>
                                            
                                            <td class="text-center">
                                                <a class="text-danger" href="delete.php?id=<?= $rows_order[$i]['id']?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php 
                                        } 
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



    </div>
    <!-- ./wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>