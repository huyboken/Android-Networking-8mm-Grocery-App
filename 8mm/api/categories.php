<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $sel_cat = "select * from categories order by rand()";
    $run_cat = mysqli_query($con,$sel_cat);
    
    $result = array();
    $result['categories'] = array();

    $path = "http://192.168.0.108:8080/8mm/admin/ajax/cat_images/";

    while($row = mysqli_fetch_assoc($run_cat))
    {
        $index['cat_id'] = $row['cat_id'];
        $index['cat_title'] = $row['cat_title'];
        $index['cat_image'] = $path.$row['cat_image'];
        $index['cat_discount'] = $row['cat_discount'];
        $index['cat_description'] = $row['cat_description'];
        $index['date'] = $row['date'];

        array_push($result['categories'],$index);
    }
    echo json_encode($result);
    }
?>