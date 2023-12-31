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

   
   <!-- Customers  Table  -->
   <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Customers table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <div>
              <button class="btn btn-outline-primary btn-sm mb-0 me-3"><a href="add-customer.php">Add New customer</a></button>
</div>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Name</th> 
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-secondary opacity-7">Edit</th>
                      <th class="text-secondary opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                  
                    $sql = mysqli_query($con, "SELECT * FROM customers");
                    $row = mysqli_num_rows($sql);
                    if($row > 0){
                      while($row = mysqli_fetch_array($sql)){
                    
                    ?>
                    <tr>
                      <td><?php echo $row ['first_name'];?> <?php echo $row ['last_name'];?></td>
                      <td><?php echo $row ['email'];?></td>
                      <td><?php echo $row ['phone_number'];?></td>
                      <td><?php echo $row ['address'];?></td>
                      <td><a href="edit-customer.php?editid=<?php echo $row['customer_id'];?>"><i class="material-icons">&#xE254;</i></a></td>
                      <td><a href="delete-customer.php?delid=<?php echo $row['customer_id'];?>"><i class="material-icons">&#xE872;</i></a>
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