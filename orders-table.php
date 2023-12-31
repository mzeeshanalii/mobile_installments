<?php
include 'header.php';
 include 'side-bar.php' ;
 ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">


 <!-- Orders Table  -->
 <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Orders table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
              <div>
              <button class="btn btn-outline-primary btn-sm mb-0 me-3"><a href="add-order.php">Add Order</a></button>
              </div>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Name</th> 
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Order Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Status</th>
                      <th class="text-secondary opacity-7">Edit</th>
                      <th class="text-secondary opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                    $sql2 = mysqli_query($con, "SELECT * FROM orders ");
                    $row2 = mysqli_num_rows($sql2);
                    if($row2 > 0){
                      while($row2 = mysqli_fetch_array($sql2)){
                    
                    ?>
                    <tr>
                      <td><?php echo $row2 ['customer_id'];?> </td>
                      <td><?php echo $row2 ['order_date'];?></td>
                      <td><?php echo $row2 ['total_amount'];?></td>
                      <td><?php echo $row2 ['payment_status'];?></td>
                      <td><a href="edit-order.php?order-editid=<?php echo $row2['order_id'];?>"><i class="material-icons">&#xE254;</i></a></td>
                      <td><a href="delete-order.php?order-delid=<?php echo $row2['order_id'];?>"><i class="material-icons">&#xE872;</i></a>
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
