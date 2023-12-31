<?php 
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>document.location = 'sign-in.php';</script>";
}
include 'header.php';
include 'side-bar.php';
 ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

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
                      <td><?php echo $row4['order_id'];?></td>
                      <td><?php echo $row4 ['total_installments'];?></td>
                      <td><?php echo $row4 ['installment_amount'];?></td>
                      <td><?php echo $row4 ['start_date'];?></td>
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



