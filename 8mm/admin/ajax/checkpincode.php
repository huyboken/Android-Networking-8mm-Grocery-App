<?php
    $pincode = $_POST['pincode'];
    $data = file_get_contents('http://postalpincode.in/api/pincode/'. $pincode);
    $data = json_decode($data);
    if(isset($data->PostOffice['0'])){
        $arr['city'] = $data->PostOffice['0']->Taluk;
        $arr['state'] = $data->PostOffice['0']->State;

        echo '
        <input type="text" class="textbox" id="city" value="'.$arr['city'].'" disabled placeholder="City"><br/><br/>
        <input type="text" class="textbox" id="state" value="'.$arr['state'].'" disabled placeholder="State">
        ';
    }else{
        echo "Mã pin không có sẵn";
    }
?>