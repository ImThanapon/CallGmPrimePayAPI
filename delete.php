<?php
    require_once('connetion.php');
    require('env.php');
    if($_GET['id']){
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
?>