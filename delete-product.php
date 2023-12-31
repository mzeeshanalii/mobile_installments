<?php
include 'header.php';
$proid = $_GET['delproid'];
$sql = mysqli_query($con, "DELETE FROM products WHERE product_id = '$proid'");
if($sql){
    echo "<script>alert('Product Deleted ');</script>";
    echo "<script>document.location='products-table.php';</script>";
}


?>