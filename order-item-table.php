<?php
include 'header.php';
 include 'side-bar.php';
 ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
 <!-- Orders items Table  -->
 <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Order items table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order id</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product id</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subtotal</th>                
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  
                    $sql3 = mysqli_query($con, "SELECT * FROM `order_items`");
                    $row3 = mysqli_num_rows($sql3);
                    if($row3 > 0){
                      while($row3 = mysqli_fetch_array($sql3)){
                    
                    ?>
                    <tr>
                      <td><?php echo $row3['order_id'];?></td>
                      <td><?php echo $row3['product_id'];?></td>
                      <td><?php echo $row3 ['quantity'];?></td>
                      <td><?php echo $row3 ['subtotal'];?></td>
                      </tr>
                      </tbody>
                      <?php
                      }
                    }
                      ?>
                </table>
               
              </div>
            </div>
          </div>
        </div>
      </div>
