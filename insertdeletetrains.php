<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

// Get all records
if ($request_type == 1) {
    $sel = mysqli_query($con, "select * from trains");
    $data = array();

    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array("trainno" => $row['trainno'], "name" => $row['name'], "type" => $row['type'], "fromst" => $row['fromst'], "tost" => $row['tost']);
    }
    echo json_encode($data);
}

// Insert record
if ($request_type == 2) {

    $trainno = $data->trainno;
    $name = $data->name;
    $type = $data->type;
    $fromst = $data->fromst;
    $tost = $data->tost;

    mysqli_query($con, "insert into trains(trainno,name,type,fromst,tost) values('" . $trainno . "','" . $name . "','" . $type . "','" . $fromst . "','" . $tost . "')");

    $return_arr[] = array("trainno" => $trainno, "name" => $name, "type" => $type, "fromst" => $fromst, "tost" => $tost);
    echo json_encode($return_arr);
}

// Delete record
if ($request_type == 3) {
    $trainno = $data->trainno;

    mysqli_query($con, "delete from trains where trainno=" . $trainno);
    echo 1;
}

?>