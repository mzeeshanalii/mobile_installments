<?php
include 'header.php';
$delid = $_GET['delid'];
$sql = mysqli_query($con, "DELETE FROM customers WHERE customer_id='$delid'");
if($sql){
    echo "<script>alert('Customer Deleted');</script>";
    echo "<script>document.location='customers-table.php';</script>";
}
?>