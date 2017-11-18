<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

// Insert record
if ($request_type == 2) {
    $trainno = $data->trainno;
    $fromst = $data->tost;
    $tost = $data->tost;
    $name = $data->name;
    $phone = $data->phone;
    $class = $data->class;

    mysqli_query($con, "insert into ticket(name,trainno,fromst,tost,phone,class) values('" . $name . "','" . $trainno . "','" . $fromst . "','" . $tost . "','" . $phone . "','" . $class . "')");

    $return_arr[] = array("name" => $name, "trainno" => $trainno, "fromst" => $fromst, "tost" => $tost, "phone" => $phone, "class" => $class);
    echo json_encode($return_arr);
}

// Delete record
if ($request_type == 3) {
    $id = $data->id;

    mysqli_query($con, "delete from station where id=" . $id);
    echo 1;
}
?>