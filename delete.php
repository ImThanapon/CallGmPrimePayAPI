<?php
    require_once('connetion.php');
    require('env.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_delete = "DELETE FROM order_detail WHERE id = '$id'";
    
        $query = mysqli_query($con,$sql_delete);
        if($query) {
            echo "<script> alert('ลบคำสั่งซื้อสำเร็จ')</script>";
        }else{
            echo "<script> alert('เกิดข้อผิดพลาด')</script>";
        }
        mysqli_close($con);
        echo "<script>window.location='".$host."dashboard.php'; </script>";

      }
      if(isset($_GET['ref_no'])){
        
        $ref_no_id = $_GET['ref_no'];

        $sql_update = " UPDATE order_detail SET result_code = '88' WHERE ref_no = '$ref_no_id'";
        $query = mysqli_query($con,$sql_update);
        if($query) {
            // echo "Record add successfully";
        }else{
            // echo 'เพิ่มข้อมูลไม่สำเร็จ';
        }
        mysqli_close($con);
        echo "<script>window.location='".$host."response/res_credit.php?situation=incorrect&referenceNo=".$ref_no_id."'; </script>";

      }
?>