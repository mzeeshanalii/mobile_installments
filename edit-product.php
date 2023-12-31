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
              <h6 class="text-white text-capitalize ps-3">Edit Product</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">

<?php

if(isset($_POST['submit'])){
    $proid = $_GET['proid'];
    $product = $_POST['productname'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $stock = $_POST['stock'];

    $sql = mysqli_query($con, "UPDATE products SET name='$product',brand='$brand',price='$price',description='$desc',stock_quantity='$stock' WHERE product_id = '$proid'");
    if($sql){
       
        echo "<script>document.location='products-table.php';</script>";
    }
}

?>


<form  method="POST">

 <div class="form-group">
<?php
$proid=$_GET['proid'];
$sql1=mysqli_query($con, "SELECT * FROM products WHERE product_id='$proid'");
if(mysqli_num_rows($sql1)){
    while($row1=mysqli_fetch_array($sql1)){
?>
<br>
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Name : </label>
<div class="col"><input type="text" class="form-control" name="productname" value="<?php echo $row1['name'];?>" required="true"></div>      	
</div>

<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Brand : </label>
<input type="text" class="form-control" name="brand" value="<?php echo $row1['brand'];?>" required="true"></div>
</div>  
 
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Price : </label>
<input type="text" class="form-control" name="price" value="<?php echo $row1['price'];?>"  required="true">
</div>
 
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Product Descriptin : </label>
<textarea class="form-control" name="desc"  required="true"><?php echo $row1['description'];?></textarea>
</div>  

<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Stock Quantity : </label>
<input type="text" class="form-control" name="stock"  value="<?php echo $row1['stock_quantity'];?>"  required="true">
</div>
 
<div class="input-group input-group-outline mb-3">
<button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit">Submit</button>
</div>
</form>

<?php
    }
}
?>

