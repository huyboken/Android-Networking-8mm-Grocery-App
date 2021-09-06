<?php
@session_start();
$con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Grocery Store</title>
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-dark/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style type="text/css">
    #dash:hover {
      text-decoration: none;
      font-style: bold;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100" style="color:#dc3545;">
          8|mm
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face5.jpg" alt="profile" />
              <span class="nav-profile-name">
                <?php
                if (isset($_SESSION['admin_email'])) {
                  $sel_name = "select * from admins where admin_email = '$_SESSION[admin_email]'";
                  $run_name = mysqli_query($con, $sel_name);
                  $row_name = mysqli_fetch_array($run_name);
                  $admin_name = $row_name['admin_name'];
                  echo $admin_name;
                }
                ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="typcn typcn-cog-outline text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="typcn typcn-eject text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-user-status dropdown">
            <p class="mb-0" id="successMsg" style="color:yellow;"></p>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-date dropdown">
            <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
              <h6 class="date mb-0">Today : Mar 23</h6>
              <i class="typcn typcn-calendar"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="typcn typcn-cog-outline mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-0">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="typcn typcn-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="typcn typcn-info mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="typcn typcn-cog-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="typcn typcn-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="typcn typcn-th-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close typcn typcn-times"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="typcn typcn-media-record-outline text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="typcn typcn-media-record-outline text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
              <div class="badge badge-danger">Go</div>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="typcn typcn-social-pinterest menu-icon"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#productModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_products.php"> View </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#authh" aria-expanded="false" aria-controls="authh">
              <i class="typcn typcn-news menu-icon"></i>
              <span class="menu-title">Banners</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="authh">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#bannersModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_banners.php"> View </a></li>
                <li class="nav-item"> <a class="nav-link" href="manage_strip_ads.php"> Manage Strip Ads </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth110" aria-expanded="false" aria-controls="auth110">
              <i class="typcn typcn-briefcase menu-icon"></i>
              <span class="menu-title">Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth110">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#ordersModel"> Add Orders </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_orders.php"> All Orders </a></li>
                <li class="nav-item"> <a class="nav-link" href="track_orders.php"> Track </a></li>
                <li class="nav-item"> <a class="nav-link" href="return_orders.php"> Return </a></li>
                <li class="nav-item"> <a class="nav-link" href="pending_orders.php"> Pending </a></li>
                <li class="nav-item"> <a class="nav-link" href="completed_orders.php"> Completed </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth111" aria-expanded="false" aria-controls="auth111">
              <i class="typcn typcn-flow-merge menu-icon"></i>
              <span class="menu-title">Delivery Boy</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth111">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" data-toggle="modal" data-target="#deliveryBoyModel" style="cursor: pointer;"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_delivery_boy.php"> View </a></li>
                <li class="nav-item"> <a class="nav-link" href="track_delivery_boy.php"> Track </a></li>
                <li class="nav-item"> <a class="nav-link" href="delivery_boy_completed_orders.php"> Completed </a></li>
                <li class="nav-item"> <a class="nav-link" href="delivery_boy_pending_orders.php"> Pendings </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
              <i class="typcn typcn-link-outline menu-icon"></i>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#catsModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_cats.php"> View </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
              <i class="typcn typcn-shopping-bag menu-icon"></i>
              <span class="menu-title">Shops</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#shopsModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_shops.php"> View </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth22" aria-expanded="false" aria-controls="auth22">
              <i class="typcn typcn-tabs-outline menu-icon"></i>
              <span class="menu-title">Coupons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth22">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#couponsModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_coupons.php"> View </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth33" aria-expanded="false" aria-controls="auth33">
              <i class="typcn typcn-shopping-cart menu-icon"></i>
              <span class="menu-title">Carts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth33">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="view_carts.php"> View </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth333" aria-expanded="false" aria-controls="auth333">
              <i class="typcn typcn-heart-outline menu-icon"></i>
              <span class="menu-title">Wishlists</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth333">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="view_wishlists.php"> View </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth3">
              <i class="typcn typcn-user-outline menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#usersModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_users.php"> View </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth35" aria-expanded="false" aria-controls="auth35">
              <i class="typcn typcn-mortar-board menu-icon"></i>
              <span class="menu-title">Jobs</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth35">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#jobsModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_jobs.php"> View </a></li>
                <li class="nav-item"> <a class="nav-link" href="free_users.php"> Free </a></li>
                <li class="nav-item"> <a class="nav-link" href="premium_users.php"> Premium </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth357" aria-expanded="false" aria-controls="auth357">
              <i class="typcn typcn-star-outline menu-icon"></i>
              <span class="menu-title">Ratings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth357">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item" style="cursor: pointer;"> <a class="nav-link" data-toggle="modal" data-target="#ratingsModel"> Add </a></li>
                <li class="nav-item"> <a class="nav-link" href="view_ratings.php"> View </a></li>
                <li class="nav-item"> <a class="nav-link" href="user_ratings.php"> Users </a></li>
                <li class="nav-item"> <a class="nav-link" href="delivery_boy_ratings.php"> Delivery Boys </a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Sign Out</span>
            </a>
          </li>

        </ul>
      </nav>

      <!------------add products model start-------------------------------------->
      <div class="modal fade" id="productModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!------------add products model end-------------------------------------->

      <!------------add banners model start-------------------------------------->
      <div class="modal fade" id="bannersModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="" method="POST" enctype="multipart/form-data" id="formBanner">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Banners</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <input type="file" name="banner_image" id="banner_image" style="cursor:pointer;" class="form-control" accept="image/*" required />
                  <center>
                    <img src="images/loader.gif" id="loaderBanner" style="width: 100px; height: 100px; display: none;" />
                  </center>
                </div>
              </div>
              <div class="modal-footer" id="footerBanner">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="addBanner" name="addBanner" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {
          $("#addBanner").click(function(e) {
            e.preventDefault();

            var banner_image = $("#banner_image").val();

            if (banner_image == "") {
              alert('Vui lòng thêm hình');
            } else {
              $("#loaderBanner").show();
              $("#footerBanner").hide();
              var form = $('#formBanner')[0];
              var data = new FormData(form);

              $.ajax({
                url: "ajax/add_banners.php",
                method: "post",
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                dataType: "html",
                success: function(response) {
                  $("#successMsg").html(response);
                  $("#loaderBanner").hide(1000);
                  $("#formBanner").trigger("reset");
                  $("#footerBanner").hide(1000);

                  setTimeout(function() {
                    window.open('view_banners.php', '_self');
                  }, 2000);
                }
              });
            }
          });

        });
      </script>

      <!------------add banners model end-------------------------------------->


      <!------------add orders model start-------------------------------------->
      <div class="modal fade" id="ordersModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Orders</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!------------add orders model end-------------------------------------->


      <!------------add delivery boy model start-------------------------------------->
      <div class="modal fade" id="deliveryBoyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Delivery Boy</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!------------add delivery boy model end-------------------------------------->


      <!------------add categories model start-------------------------------------->
      <div class="modal fade" id="catsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="" method="POST" id="formCat" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <input type="text" id="cat_title" name="cat_title" placeholder="Category" class="form-control" />
                </div>

                <div class="form-group">
                  <input type="text" id="cat_discount" name="cat_discount" placeholder="Discount" class="form-control" />
                </div>

                <div class="form-group">
                  <input type="text" id="cat_description" name="cat_description" placeholder="Description" class="form-control" />
                </div>

                <div class="form-group">
                  <input type="file" id="cat_image" name="cat_image" class="form-control" accept="image/*" style="cursor:pointer;" />
                  <center>
                    <img src="images/loader.gif" id="loaderCat" style="width: 100px; height: 100px; display: none;" />
                  </center>
                </div>

              </div>
              <div class="modal-footer" id="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="addCat" name="addCat" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function() {
          $("#addCat").click(function(e) {
            e.preventDefault();

            var cat_title = $("#cat_title").val();
            var cat_image = $("#cat_image").val();
            var cat_discount = $("#cat_discount").val();
            var cat_description = $("#cat_description").val();
            if (cat_title == "") {
              alert('Vui lòng nhập tên Title');
            } else if (cat_image == "") {
              alert('Vui lòng thêm Image');
            } else if (cat_discount == "") {
              alert('Vui lòng thêm Discount');
            } else if (cat_description == "") {
              alert('Vui lòng thêm Description');
            } else {
              $("#loaderCat").show();
              $("#footerCat").hide();
              var form = $('#formCat')[0];
              var data = new FormData(form);

              $.ajax({
                url: "ajax/add_cat.php",
                method: "post",
                processData: false,
                contentType: false,
                cache: false,
                data: data,
                dataType: "html",
                success: function(response) {
                  $("#successMsg").html(response);
                  $("#loaderCat").hide(1000);
                  $("#formCat").trigger("reset");
                  $("#footerCat").hide(1000);

                  setTimeout(function() {
                    window.open('view_cats.php', '_self');
                  }, 2000);
                }
              });
            }
          });

        });
      </script>

      <!------------add categories model end-------------------------------------->

      <!------------add shops model start-------------------------------------->
      <div class="modal fade" id="shopsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="" method="POST" enctype="multipart/form-data" id="shopForm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Shops</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <input type="text" class="form-control" name="shop_name" id="shop_name" required placeholder="Tên cửa hàng">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="shop_owner_name" id="shop_owner_name" required placeholder="Tên chủ cửa hàng">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="identification_or_taxpayer" id="identification_or_taxpayer" required placeholder="CMND, Thẻ căn cước hoặc mã số thuế  ">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="shop_name" id="shop_name" required placeholder="Tên cửa hàng">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="pincode" id="pincode" required placeholder="Mã bưu điện">
                </div>

                <div id="address">
                  <div class="form-group">
                    <input type="text" class="form-control" name="city" id="city" required placeholder="Tên quận, huyện">
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" name="state" id="state" required placeholder="Tên tỉnh, thành phố">
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="lardmark" id="lardmark" required placeholder="Dấu đánh để làm chứng">
                </div>

                <div class="form-group">
                  <input type="number" class="form-control" name="discount" id="discount" required placeholder="Giảm giá">
                </div>

                <div class="form-group">
                  <input type="number" class="form-control" name="coupon" id="coupon" required placeholder="Phiếu mua hàng">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control" name="description" id="description" required placeholder="Mô tả">
                </div>

                <div class="form-group">
                  <input type="number" class="form-control" name="rating" id="rating" required placeholder="Xếp hạng">
                </div>

                <div class="form-group">
                  <input type="file" class="form-control" name="shop_image" id="shop_image" required>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="btnAddShop" id="btnAddShop" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!------------add shops model end-------------------------------------->

      <!------------add coupons model start-------------------------------------->
      <div class="modal fade" id="couponsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Coupons</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!------------add coupons model end-------------------------------------->


      <!------------add users model start-------------------------------------->
      <div class="modal fade" id="usersModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!------------add users model end-------------------------------------->

      <!------------add users model start-------------------------------------->
      <div class="modal fade" id="jobsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Jobs</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!------------add users model end-------------------------------------->

      <!------------add ratings model start-------------------------------------->
      <div class="modal fade" id="ratingsModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Ratings</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <!------------add ratings model end-------------------------------------->