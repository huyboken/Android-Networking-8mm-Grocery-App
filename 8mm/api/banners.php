<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $sel_banners = "select * from banners order by rand()";
    $run_banners = mysqli_query($con,$sel_banners);
    
    $result = array();
    $result['banners'] = array();

    $path = "http://192.168.0.108:8080/8mm/admin/ajax/banner_images/";

    while($row = mysqli_fetch_assoc($run_banners))
    {
        $index['banner_id'] = $row['banner_id'];
        $index['banner_image'] = $path.$row['banner_image'];
        $index['banner_date'] = $row['banner_date'];

        array_push($result['banners'],$index);
    }
    echo json_encode($result);
}
?>