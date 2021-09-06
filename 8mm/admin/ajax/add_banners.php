<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $banner_image = $_FILES['banner_image']['name'];
    $tmp_name = $_FILES['banner_image']['tmp_name'];

    $path = rand(1000,1000000);
    $final_path = $path.$banner_image;
    
    $insert_banner = "insert into banners(banner_image,banner_date) values('$final_path', NOW())";
    $run_banner = mysqli_query($con, $insert_banner);

    if($run_banner)
    {
        echo "Đã thêm một Banner thành công";

        move_uploaded_file($tmp_name, "banner_images/$final_path");
    }
    else
    {
        echo "Không thêm được Banner!";   
    }
?>