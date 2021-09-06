<?php
    if(isset($_GET['user_phone'])){
    $con = mysqli_connect('localhost', 'root', '', 'android_networking_8mm');
    
    @$user_phone = $_GET['user_phone'];

    $sel_user = "select * from users where user_phone = '$user_phone'";
    $run_user = mysqli_query($con,$sel_user);
    if(mysqli_num_rows($run_user) == "0")
    {
        $insert = "insert into users(user_phone,date_created) values('$user_phone',NOW())";
        $run_insert = mysqli_query($con, $insert);
        if($run_insert)
        {
            $status = "ok";

            $select = "select * from users where user_phone = '$user_phone'";
            $run_select = mysqli_query($con, $select);
            $row = mysqli_fetch_array($run_select);
            $user_id = $row['user_id'];
        }
        else
        {
            $status = "failed";
        }
    }
    else{
        $status = "already";
    }
    echo json_encode(array("response"=>$status, "user_id"=>@$user_id));
    mysqli_close($con);
    }
?>