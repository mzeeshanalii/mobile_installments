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
              <h6 class="text-white text-capitalize ps-3">Edit Customer</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
<?php

if(isset($_POST['submit'])){

if(isset($_GET['editit'])){
    $eid = $_GET['editit'];
}else{
    $eid=1;
}
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$sql = mysqli_query($con, "UPDATE `customers` SET first_name='$fname',last_name='$lname',email='$email',phone_number='$phone',address='$address' WHERE customer_id=$eid");

if($sql){
   
    echo "<script>document.location='customers-table.php';</script>";
}
}
?>

<form  method="POST">

 <div class="form-group">
 <?php
 $eid=$_GET['editid'];
 $sql1=mysqli_query($con, "SELECT * FROM customers WHERE customer_id='$eid'");
 $row=mysqli_num_rows($sql1);
 if($row > 0){
    while($row=mysqli_fetch_array($sql1)){
  
 ?>
<br>
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Name :</label>
<input type="text" class="form-control" name="fname" value="<?php echo $row['first_name'];?>" required="true">
<input type="text" class="form-control" name="lname" value="<?php echo $row['last_name'];?>"  required="true">
</div>        	

 
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Email :</label>
<input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>"  required="true">
</div>
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Phone :</label>
<input type="text" class="form-control" name="phone" value="<?php echo $row['phone_number'];?>"  required="true" maxlength="10" pattern="[0-9]+">
        </div>
 
 
<div class="input-group input-group-outline mb-3">
<label class="input-group input-group-outline mb-3">Address :</label>
<textarea class="form-control" name="address" required="true"><?php echo $row['address'];?></textarea>
</div>        
 
<div class="input-group input-group-outline mb-3">
<button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" name="submit">Submit</button>
</div>
</form>
<?php     
}
 }
?>