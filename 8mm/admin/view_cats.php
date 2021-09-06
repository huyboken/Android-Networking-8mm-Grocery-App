<?php include('header.php'); ?>
<link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<!-- partial -->

<div class="main-panel">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Categories</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table" style="text-align:center;">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>TÊN</th>
                      <th>DANH MỤC</th>
                      <th>GIẢM GIÁ</th>
                      <th>MÔ TẢ</th>
                      <th>NGÀY</th>
                      <th>HÀNH ĐỘNG</th>
                    </tr>
                  </thead>
                  <tbody id="fetchedCat">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </form>
</div>

<!---------------------------- custom ajax --------------------------------------->

<!------------delete model form start-------------------------------------->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" id="formDelCat">
    <form action="" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Danh mục</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <h4 style="color:yellow;">Bạn có muốn xóa danh mục này không?</h4>
            <input type="hidden" class="form-control" required="" name="user_id" id="user_id" placeholder="user id" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnDelete" name="btnDelete">Tiếp tục</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!------------delete model form end-------------------------------------->

<script>
  $(document).on('click', '#btnDelete', function(e) {
    e.preventDefault();
    var user_id = $(this).attr('delete-id');
    document.getElementById('user_id').value = user_id;
    $("#deleteModel").modal('show');
  });
</script>

<script>
  $(document).ready(function() {
    fetch();
    $("#btnDelete").click(function() {
      var user_id = $("#user_id").val();
      if (user_id == "") {
        alert("Không tìm thấy id người dùng");
      } else {
        $.ajax({
          url: "ajax/del_cat.php",
          method: "post",
          data: {
            user_id: user_id
          },
          dataType: "html",
          success: function(response) {
            $("#successMsg").html(response);
            $("#deleteModel").modal('hide');
          }
        });
      }
    });
  });

  function fetch() {
    $.ajax({
      url: "ajax/fetchCat.php",
      method: "post",
      data: $("#fetchedCat").serialize(),
      dataType: "html",
      success: function(response) {
        $("#fetchedCat").html(response);
      }
    });
  }
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