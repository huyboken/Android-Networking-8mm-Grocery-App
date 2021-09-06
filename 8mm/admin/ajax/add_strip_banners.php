<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $strip_image = $_FILES['strip_image']['name'];
    $tmp_name = $_FILES['strip_image']['tmp_name'];

    $path = rand(1000,1000000);
    $final_path = "strip_banner_image.jpg";
    
    $insert_strip_banner = "insert into strip_banner(strip_banner_image,strip_banner_date) values('$final_path', NOW())";
    $run_strip_banner = mysqli_query($con, $insert_strip_banner);

    if($run_strip_banner)
    {
        echo "Đã thêm một Strip Banner thành công";

        move_uploaded_file($tmp_name, "strip_banner_images/$final_path");
    }
    else
    {
        echo "Không thêm được Strip Banner!";   
    }
?>