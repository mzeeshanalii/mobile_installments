<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>document.location = 'sign-in.php';</script>";
}
?>
<?php  include 'header.php'; ?>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" tables.php " target="_blank">
        <img src="assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">All tables</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
        
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="customers-table.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Customers Table</span>
          </a>
        </li>

         
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="products-table.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Products Table</span>
          </a>
        </li>

        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="orders-table.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Orders  Table</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="order-item-table.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Orders items Table</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="installment-plans-table.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Installment plans  Table</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
      
      </ul>
    </div>
    
    </div>
  </aside>
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
              <button class="btn btn-outline-primary btn-sm mb-0 me-3"><a href="add-customer.php">Add New customers</a></button>
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


      <!-- Products Table  -->
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
              <button class="btn btn-outline-primary btn-sm mb-0 me-3"><a href="add-product.php">Add Products</a></button>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer id</th> 
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
                      <td><?php echo $row2 ['customer_id'];?></td>
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

      <!-- Installments plans Table  -->
      <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Installment Plans table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order id</th> 
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Installments</th> 
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> Installments Amount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                   
                    $sql4 = mysqli_query($con, "SELECT * FROM `installment_plans`");
                    $row4 = mysqli_num_rows($sql4);
                    if($row4 > 0){
                      while($row4 = mysqli_fetch_array($sql4)){
                    
                    ?>
                    <tr>
                      <td>1</td>
                      <td><?php echo $row4 ['total_installments'];?></td>
                      <td><?php echo $row4 ['installment_amount'];?></td>
                      <td><?php echo $row4 ['start_date'];?></td>
                      <td><a href="edit-installment.php?planeid=<?php echo $row4['plan_id'];?>"></a></td>
                      <td><a href="delete-installment.php?plandelid=<?php echo $row4['plan_id'];?>"></a>
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
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

  </html>