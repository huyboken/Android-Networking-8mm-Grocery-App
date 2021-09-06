<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $cat_title = $_POST['cat_title'];
    $cat_discount = $_POST['cat_discount'];
    $cat_description = $_POST['cat_description'];
    $cat_image = $_FILES['cat_image']['name'];
    $tmp_name = $_FILES['cat_image']['tmp_name'];

    $path = rand(1000,1000000);
    $final_path = $path.$cat_image;

    $sel = "select * from categories where cat_title = '$cat_title'";
    $run_sel = mysqli_query($con,$sel);
    if(mysqli_num_rows($run_sel) != "1" ){
    
    $insert_cat = "insert into categories(cat_title,cat_image, date, cat_discount, cat_description) values('$cat_title', '$final_path', NOW(), '$cat_discount', '$cat_description')";
    $run_cat = mysqli_query($con, $insert_cat);

    if($run_cat)
    {
        echo "Đã thêm một danh mục thành công";

        move_uploaded_file($tmp_name, "cat_images/$final_path");
    }
    else
    {
        echo "Không thêm được danh mục!";   
    }
}
else{
    echo "Danh mục này đã có sẵn, Vui lòng thử loại khác!";
}
?>