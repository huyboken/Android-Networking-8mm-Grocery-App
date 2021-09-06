<?php
  @session_start();
  if(!isset($_SESSION['admin_email']))
  {
    echo "<script>window.open('index.php','_self')</script>";
  }
  else{
?>
<?php include('header.php'); ?>
<style type="text/css">
  #viewBtn
  {
    text-decoration: none;
    font-size: 20px;
  }
  #viewBtn:hover
  {
    background: yellow;
    color: red;
  }
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-xl-12 grid-margin stretch-card flex-column">
                <h5 class="mb-2 text-titlecase mb-4">Status statistics</h5>
              <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Products <span style="margin-left: 120px;">7845</span></p>
                    <a href="view_products.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Banners <span style="margin-left: 120px;">7845</span></p>
                    <a href="view_banners.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Orders <span style="margin-left: 130px;">7845</span></p>
                    <a href="view_orders.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Delivery Boys <span style="margin-left: 90px;">7845</span></p>
                    <a href="view_delivery_boy.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-12 grid-margin stretch-card flex-column">
              <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Track Orders <span style="margin-left: 90px;">7845</span></p>
                    <a href="track_orders.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Return Orders <span style="margin-left: 80px;">7845</span></p>
                    <a href="return_orders.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Pending Orders <span style="margin-left: 70px;">7845</span></p>
                    <a href="pending_orders.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Completed Orders <span style="margin-left: 60px;">7845</span></p>
                    <a href="completed_orders.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-12 grid-margin stretch-card flex-column">
              <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Categories <span style="margin-left: 100px;">7845</span></p>
                    <a href="view_cats.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Shops <span style="margin-left: 130px;">7845</span></p>
                    <a href="view_shops.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Coupons <span style="margin-left: 120px;">7845</span></p>
                    <a href="view_coupons.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Carts <span style="margin-left: 140px;">7845</span></p>
                    <a href="view_carts.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-12 grid-margin stretch-card flex-column">
              <div class="row">
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Wishlists <span style="margin-left: 120px;">7845</span></p>
                    <a href="view_wishlists.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Users <span style="margin-left: 140px;">7845</span></p>
                    <a href="view_users.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Jobs <span style="margin-left: 140px;">7845</span></p>
                    <a href="view_jobs.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                  <div class="card">
                    <p style="margin: 16px;">Ratings <span style="margin-left: 120px;">7845</span></p>
                    <a href="view_ratings.php" class="form-control" id="viewBtn">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      <?php include('footer.php'); ?>

      <?php
        }
      ?>