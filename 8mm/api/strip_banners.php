<?php
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $sel_strip_banners = "select * from strip_banner order by rand()";
    $run_strip_banners = mysqli_query($con,$sel_strip_banners);
    
    $path = "http://192.168.0.108:8080/8mm/admin/ajax/strip_banner_images/";

    if(mysqli_num_rows($run_strip_banners) > 0)
    {
        $row = mysqli_fetch_array($run_strip_banners);
        $strip_banner_image = $path.$row['strip_banner_image'];
    }
    echo json_encode(array("strip_banner_image"=>$strip_banner_image));
}
?>