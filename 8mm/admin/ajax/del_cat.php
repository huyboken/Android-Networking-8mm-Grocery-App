<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $user_id = $_POST['user_id'];

    $cat = "delete from categories where cat_id = '$user_id'";
    $run_cat = mysqli_query($con,$cat);
    if($run_cat)
    {
        echo("Đã xóa một danh mục thành công!");
        echo "<script>window.open('view_cats.php','_self')</script>";   
    }
    else
    {
        echo("Không xóa được danh mục!");
    }
?>
