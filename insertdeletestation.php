<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

// Get all records
if ($request_type == 1) {
    $sel = mysqli_query($con, "select * from station order by id");
    $data = array();

    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array("id" => $row['id'], "sid" => $row['sid'], "sname" => $row['sname']);
    }
    echo json_encode($data);
}

// Insert record
if ($request_type == 2) {
    $id = $data->id;
    $sid = $data->sid;
    $sname = $data->sname;

    mysqli_query($con, "insert into station(id,sid,sname) values('" . $id . "','" . $sid . "','" . $sname . "')");

    $return_arr[] = array("id" => $id, "sid" => $sid, "sname" => $sname);
    echo json_encode($return_arr);
}

// Delete record
if ($request_type == 3) {
    $id = $data->id;

    mysqli_query($con, "delete from station where id=" . $id);
    echo 1;
}
?>