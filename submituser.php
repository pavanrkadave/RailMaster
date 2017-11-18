<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

// Insert record
if ($request_type == 1) {
    $userid = $data->userid;
    $name = $data->name;
    $email = $data->email;
    $address = $data->address;
    $phone = $data->phone;
    $password = $data->password;

    mysqli_query($con,"insert into user(userid,name,email,address,phone,password) values('" . $userid . "','" . $name . "','" . $email . "','" . $address . "','" . $phone . "','" . $password . "')");


    $return_arr[] = array("userid" => $userid, "name" => $name, "email" => $email,"address" => $address,"phone" => $phone,"password" => $password);
    echo json_encode($return_arr);

    
}

?>