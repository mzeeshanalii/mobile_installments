<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>document.location = 'sign-in.php';</script>";
}

?>
   <?php
   include 'header.php';
   include 'side-bar.php';
   ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      
      <!-- Products Table  -->
     <div class="container-fluid py-4">
     <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Products table</h6>
                <div>     
              </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <div>
              <button class="btn btn-outline-primary btn-sm mb-0 me-3"><a href="add-product.php">Add Product</a></button>
              </div>
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Brand</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Stock Quantity</th>
                      <th class="text-secondary opacity-7">Edit</th>
                      <th class="text-secondary opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
              
                    $sql1 = mysqli_query($con, "SELECT * FROM products");
                    $row1 = mysqli_num_rows($sql1);
                    if($row1 > 0){
                      while($row1 = mysqli_fetch_array($sql1)){
                    
                    ?>
                    <tr>
                      <td><?php echo $row1 ['name'];?></td>
                      <td><?php echo $row1 ['brand'];?></td>
                      <td><?php echo $row1 ['price'];?></td>
                      <td><?php echo $row1 ['description'];?></td>
                      <td><?php echo $row1 ['stock_quantity'];?></td>
                      <td><a href="edit-product.php?proid=<?php echo $row1['product_id'];?>"><i class="material-icons">&#xE254;</i></a></td>
                      <td><a href="delete-product.php?delproid=<?php echo $row1['product_id'];?>"><i class="material-icons">&#xE872;</i></a>
                      </tr>
                      </tbody>
                      <?php
                      }
                    }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>