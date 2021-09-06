<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $banner = "select * from banners ORDER BY banner_id  DESC";
    $run_banner = mysqli_query($con,$banner);
    if($run_banner)
    {
        $i = 0;
        while( $row = mysqli_fetch_array($run_banner))
        {
            $banner_id  = $row['banner_id'];
            $banner_image = $row['banner_image'];
            $banner_date = $row['banner_date'];

            $i++;   
            echo "<tr>
                <td>$i</td>
                <td><img src='ajax/banner_images/$banner_image' class='img-fluid' style='height:100px; width:100px;'></td>
                <td>$banner_date</td>
                <td><button type='submit' name='btnDelete' id='btnDelete' delete-id='$banner_id' class='btn btn-danger'>Delete</button></td>
                </tr>";
        }
    }
?>



<script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>