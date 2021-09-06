<?php
    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');
    $admin_email = $_POST['exampleInputEmail'];
    $admin_password = $_POST['exampleInputPassword'];

    $login = "select * from admins where admin_email = '$admin_email' and  admin_password = '$admin_password'";

    $run_login = mysqli_query($con,$login);

    if(mysqli_num_rows($run_login) == "1")
    {
        session_start();
        $_SESSION['admin_email'] = $admin_email;

        echo "<span style='color:green;'>Đăng nhập thành công</span>";
        echo "<script>window.open('dashboard.php','_self')</script>";
    }
    else
    {
        echo "<span style='color:red;'>Đăng nhập không thành công!</span>";
    }
?>