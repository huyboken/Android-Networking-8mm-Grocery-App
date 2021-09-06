<?php
    if(isset($_GET['user_email'])){
    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');
    
    @$user_email = $_GET['user_email'];
    @$user_password = $_GET['user_password'];

    $sel_user = "select * from users where user_email = '$user_email' and user_password = '$user_password'";
    $run_user = mysqli_query($con,$sel_user);
    if(mysqli_num_rows($run_user) == "1")
    {
        $status = "ok";

        $row = mysqli_fetch_array($run_user);
        $user_id = $row['user_id'];
    }
    else{
        $status = "no_account";
    }
    echo json_encode(array("response"=>$status, "user_id"=>@$user_id));
    mysqli_close($con);
    }
?>