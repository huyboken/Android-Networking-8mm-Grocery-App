<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $strip_banner = "select * from strip_banner ORDER BY strip_banner_id DESC";
    $run_strip_banner = mysqli_query($con,$strip_banner);
    if($run_strip_banner)
    {
        $row = mysqli_fetch_array($run_strip_banner);
        @$strip_banner_image = $row['strip_banner_image'];

        echo "<img src='ajax/strip_banner_images/$strip_banner_image' style='height: 100%; width: 100%;' class='img-fluid' >";
    }
?>
