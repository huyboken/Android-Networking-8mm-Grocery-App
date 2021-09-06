<?php include('header.php'); ?>
<style>
  #addBtn:hover {
    background: yellow;
    color: blue;
  }
</style>
<link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <form action="" method="POST" id="stripForm" enctype="multipart/form-data">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Manage Strip Ads</h4>
          <hr><br>
          <div class="row">

            <div class="col-6">

              <div class="form-group">
                <input type="file" class="form-control" name="strip_image" id="strip_image" required style="cursor: pointer;" accept="image/*" />
                <center>
                  <img src="images/loader.gif" id="loaderStripBanner" style="width: 100px; height: 100px; display: none;" />
                </center>
              </div>
              <div class="form-group">
                <input type="submit" class="form-control" name="addBtn" id="addBtn" />
              </div>
            </div>
            <div class="col-6">
              <div id="fetchStripBanner"></div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      fetch();

      $("#addBtn").click(function(e) {
        e.preventDefault();

        var strip_image = $("#strip_image").val();

        if (strip_image == "") {
          alert('Vui lòng thêm hình');
        } else {
          $("#loaderStripBanner").show();
          $("#addBtn").hide();
          var form = $('#stripForm')[0];
          var data = new FormData(form);

          $.ajax({
            url: "ajax/add_strip_banners.php",
            method: "post",
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            dataType: "html",
            success: function(response) {
              $("#successMsg").html(response);
              $("#loaderStripBanner").hide(1000);
              $("#stripForm").trigger("reset");
              $("#addBtn").hide(1000);

              setTimeout(function() {
                window.open('manage_strip_ads.php', '_self');
              }, 2000);
              fetch();
            }
          });
        }
      });

      function fetch() {
        $.ajax({
          url: "ajax/fetchStripBanner.php",
          method: "post",
          cache: false,
          data: $("#fetchStripBanner").serialize(),
          dataType: "html",
          success: function(response) {
            $("#fetchStripBanner").html(response);
          }
        });
      }
    });
  </script>
  <!-- content-wrapper ends -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>