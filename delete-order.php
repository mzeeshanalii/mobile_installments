<?php
include 'header.php';
$order_id = $_GET['order-delid'];

$sql = mysqli_query($con, "DELETE FROM orders WHERE order_id = '$order_id '");
if($sql){
    echo "<script>alert('Order Deleted Successfully');</script>";
    echo "<script>document.location='orders-table.php';</script>";
}

?>