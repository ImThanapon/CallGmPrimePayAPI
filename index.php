<?php
    require_once('connetion.php');
    require('env.php');
    $sql_select_product = "SELECT * FROM product";
    $result = mysqli_query($con, $sql_select_product);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<script>
function seeDetail(id, name, price, img) {
    if (name != "") {
        window.location.href = "productDetail.php?name=" + name + "&img=" + img + "&price=" + price + "&p_id=" + id;
    } else alert('Oops.!!');
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</head>

<body class="mb-5">

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= $host?>">
                <img src="https://cdn2.iconfinder.com/data/icons/real-estate-1-12/50/13-512.png" alt="" width="30"
                    height="24" class="d-inline-block align-text-top">
                Store by AdminLTE
            </a>
        </div>
    </nav>


    <div class="container mb-5 ">

        <div class="row mt-3 ">
            <?php for ($i=0; $i < count($rows); $i++) { ?>
            <div class="mb-3 col-md-3 col-sm-6 col-12">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $rows[$i]['img'] ?>" alt="">
                    <div class="card-body">
                        <h4>ชื่อสินค้า : <?php echo $rows[$i]['name'] ?> </h4>
                        <h5>ราคา : <?php echo $rows[$i]['price'] ?></h4>
                            <h5>รายละเอียดสินค้า : <?php echo $rows[$i]['detail'] ?></h4>
                                <div class="d-grid gap-2">
                                    <button
                                        onclick="seeDetail('<?= $rows[$i]['id'] ?>','<?= $rows[$i]['name'] ?>','<?= $rows[$i]['price'] ?>','<?= $rows[$i]['img'] ?>')"
                                        class="btn btn-outline-secondary" type="button">ดูสินค้า</button>
                                </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>

    </div>
</body>

</html>