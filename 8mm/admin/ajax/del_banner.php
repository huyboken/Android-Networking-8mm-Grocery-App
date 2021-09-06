<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $user_id = $_POST['user_id'];

    $banner = "delete from banners where banner_id  = '$user_id'";
    $run_banner = mysqli_query($con,$banner);
    if($run_banner)
    {
        echo("Đã xóa một Banner thành công!");
        echo "<script>window.open('view_banners.php','_self')</script>";   
    }
    else
    {
        echo("Không xóa được danh mục!");
    }
?>
