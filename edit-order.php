<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>document.location = 'sign-in.php';</script>";
}
?>
<?php 
 include 'header.php';
 include 'side-bar.php';?>

 
 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg "> 
 <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Edit Order</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">



          <?php

if(isset($_POST['submit'])){
    $product_id = $_GET['products'];
    $customer_id=$_POST['cus_id'];
    $amount=$_POST['amount'];
    $status=$_POST['payment'];
    $date= $_POST['date'];    
    $total_install=$_GET['total_install'];
    $quantity=$_GET['quantity'];
    $subtotal=$amount*$quantity;
    $installments=$subtotal/$total_install;
  
    
    $sql = mysqli_query($con, "UPDATE  `orders` SET customer_id='$customer_id', order_date='$date',total_amount='$amount', payment_status='$status'");
    $order_id = mysqli_insert_id($con);
    $sql= mysqli_query($con, "UPDATE  `installment_plans` SET order_id='$order_id',total_installments='$total_install',installment_amount='$installments',start_date='$date'");
    $sql=mysqli_query($con, "UPDATE  `order_items` SET order_id='$order_id',product_id='$product_id',quantity='$quantity',subtotal='$subtotal'");
    if($sql){
        echo "<script>document.location = 'orders-table.php';</script>";
    }

  }


if(isset($_GET['products'])){
$product_id = $_GET['products'];
$query = mysqli_query($con, "SELECT * FROM products WHERE product_id = '$product_id '");
$product_Data=mysqli_fetch_array($query);
?>

<form  method="POST">
  <input type="hidden" name="product" value="<?=$product_id?>">
  <input type="hidden" name="installment" value="<?=$_GET['total_install']?>">
  <input type="hidden" name="quantity" value="<?=$_GET['quantity']?>">
  <br>
 <div class="input-group input-group-outline mb-3">
     <div class= "input-group input-group-outline mb-3">
     <label class="input-group input-group-outline mb-3">Customer Name :</label>
     <select class="form-control" name="cus_id">
 <?php
    $sql1 = mysqli_query($con, "SELECT * FROM  customers ");
    if(mysqli_num_rows($sql1)){
        while($row1=mysqli_fetch_array($sql1)){
  ?>
    <option value="<?php echo $row1['customer_id'];?>"><?php echo $row1['first_name'].' '.$row1['last_name'];?></option>
    <?php
        }
    }
    ?>
     </select>

</div>
    <div class="input-group input-group-outline mb-3">
    <label class="input-group input-group-outline mb-3">Date :</label>
<input type="date" class="form-control" name="date" placeholder="Date" required="true">
</div>
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Total Amount :</label>
<input type="text" class="form-control" name="amount"  placeholder="Total Amount" value="<?=$product_Data['price']?>" required="true">
</div>
<div class="input-group input-group-outline mb-3">
    <label class="input-group input-group-outline mb-3">Payment Status :</label>
    <select class="form-control" name="payment">
    <option value="Pending" selected>Pending</option>
    <option value="Paid">Paid</option>
    </select>
    </div>
<div class="input-group input-group-outline mb-3">
<button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit">Next</button>
</div>
</form>
<?php
 }else{
?>
    <form method="get"> 
    <div class="input-group input-group-outline mb-3">
    <label class="input-group input-group-outline mb-3">Products :</label>
    <select class="form-control" name="products" >
    <?php 
    $sql = mysqli_query($con, "SELECT * FROM products");
    if(mysqli_num_rows($sql)){
      while($row=mysqli_fetch_array($sql)){
     
    ?>
    <option value="<?php echo $row['product_id'];?>"><?php echo $row['name']; ?></option>
    <?php
  }}?>
    </select>
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="input-group input-group-outline mb-3">Quantity :</label>
      <input type="text" class="form-control" name="quantity" placeholder="Quantity">
    </div>
    <div class="input-group input-group-outline mb-3">
    <label class="input-group input-group-outline mb-3">Total Installments :</label>
    <select class="form-control" name="total_install" >
    <option value="3">3 months</option>
    <option value="6">6 months</option>
    <option value="8">8 months</option>
    <option value="9">9 months</option>
    <option value="12">12 months</option>
    </select>
    </div>
    <div class="input-group input-group-outline mb-3">
    <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit">Next</button>
    </div>
</form>
<?php
 }
?> 