<?php

    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');

    $cat = "select * from categories ORDER BY cat_id DESC";
    $run_cat = mysqli_query($con,$cat);
    if($run_cat)
    {
        $i = 0;
        while( $row = mysqli_fetch_array($run_cat))
        {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            $cat_image = $row['cat_image'];
            $cat_discount = $row['cat_discount'];
            $cat_description = $row['cat_description'];
            $date = $row['date'];

            $i++;   
            echo "<tr>
                <td>$i</td>
                <td>$cat_title</td>
                <td><img src='ajax/cat_images/$cat_image' class='img-fluid' style='height:100px; width:100px;'></td>
                <td>$cat_discount</td>
                <td>$cat_description</td>
                <td>$date</td>
                <td><button type='submit' name='btnDelete' id='btnDelete' delete-id='$cat_id' class='btn btn-danger'>Delete</button></td>
                </tr>";
        }
    }
?>



<script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>