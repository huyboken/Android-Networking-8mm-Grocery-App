<?php
  @session_start();
  if(isset($_SESSION['admin_email']))
  {
    echo "<script>window.open('dashboard.php','_self')</script>";
  }
  else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Grocery Store</title>
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vertical-layout-dark/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="images/favicon.png" alt="logo">
              </div>
              <h4>Chào mừng trở lại!</h4>
              <h6 class="font-weight-light" id="successMessage">Rất vui được gặp lại bạn!</h6>
              <form class="pt-3" action="" id="loginForm" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="typcn typcn-user-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" name="exampleInputEmail" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="typcn typcn-lock-closed-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" name="exampleInputPassword" placeholder="Password">                        
                  </div>
                </div>
                <div class="form-group">
                  <div class="my-3" style="display: none;" id="loader">
                    <center>
                      <img src="images/loader.gif" class="img-fluid" style="width: 100px; height: 100px;"/>
                    </center>
                  </div>
                  <div class="my-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" id="btnLogin" name="btnLogin">ĐĂNG NHẬP</button>
                  </div>
                </div
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Bản quyền &copy; 2021  Mọi quyền được bảo lưu.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- custom javascript -->
  <script type="text/javascript">
      $(document).ready(function()
      {
        $("#btnLogin").click(function(e)
        {
          e.preventDefault();
          var exampleInputEmail = $("#exampleInputEmail").val();
          var exampleInputPassword = $("#exampleInputPassword").val();

          if(exampleInputEmail == "")
          {
            alert('Vui lòng nhập địa chỉ email của bạn');
          }
          else if(exampleInputPassword == "")
          {
            alert('Vui lòng nhập mật khẩu của bạn');
          }
          else if(exampleInputPassword < 8)
          {
            alert('Mật khẩu phải có 8 ký tự');
          }
          else
          {
            $("#loader").show();
            $.ajax({
              url: "ajax/login.php",
              method: "post",
              data:$("#loginForm").serialize(),
              dataType: "html",
              success: function(response)
              {
                $("#successMessage").html(response);
                $("#loader").hide();
              }
            });
          }
        });
      });
  </script>

  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
</body>

</html>
<?php
}
?>