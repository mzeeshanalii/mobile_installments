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
              <h6 class="text-white text-capitalize ps-3">Add Product</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">

<?php

if(isset($_POST['submit'])){
    $product = $_POST['productname'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $stock = $_POST['stock'];

    $sql = mysqli_query($con, "INSERT INTO `products` (`name`,`brand`,`price`,`description`,stock_quantity)VALUES('$product','$brand','$price','$desc','$stock')");
    if($sql){
        echo "<script>document.location = 'products-table.php';</script>";
    }
}
?>


<form  method="POST">

 <div class="form-group">
<br>
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Name : </label>
<div class="col"><input type="text" class="form-control" name="productname" placeholder="Name" required="true"></div>      	
</div>

<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Brand : </label>
<input type="text" class="form-control" name="brand" placeholder=" Brand" required="true"></div>
</div>  
 
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Price : </label>
<input type="text" class="form-control" name="price" placeholder="Price" required="true">
</div>
 
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Desccription : </label>
<textarea class="form-control" name="desc" placeholder=" Description" required="true"></textarea>
</div>  

<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Stock Quantity : </label>
<input type="text" class="form-control" name="stock" placeholder="Quantity" required="true">
</div>
 
<div class="input-group input-group-outline mb-3">
<button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit">Submit</button>
</div>
</form>
