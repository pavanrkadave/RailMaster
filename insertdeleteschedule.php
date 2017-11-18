<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

// Get all records
if ($request_type == 1) {
    $sel = mysqli_query($con, "select * from schedule order by trainno");
    $data = array();

    while ($row = mysqli_fetch_array($sel)) {
        $data[] = array("trainno" => $row['trainno'], "name" => $row['name'], "from_st" => $row['from_st'], "to_st" => $row['to_st'], "days" => $row['days'], "deptime" => $row['deptime'], "arrival" => $row['arrival']);
    }
    echo json_encode($data);
}

// Insert record
if ($request_type == 2) {
    $trainno = $data->trainno;
    $name = $data->name;
    $from_st = $data->from_st;
    $to_st = $data->to_st;
    $days = $data->days;
    $deptime = $data->deptime;
    $arrival = $data->arrival;

    mysqli_query($con, "insert into schedule(trainno,name,from_st,to_st,days,deptime,arrival) values('" . $trainno . "','" . $name . "','" . $from_st . "','" . $to_st . "','" . $days . "','" . $deptime . "','" . $arrival . "')");

    $return_arr[] = array("trainno" => $trainno, "name" => $name, "from_st" => $from_st, "to_st" => $to_st, "days" => $days, "deptime" => $deptime, "arrival" => $arrival);
    echo json_encode($return_arr);
}

// Delete record
if ($request_type == 3) {
    $trainno = $data->trainno;

    mysqli_query($con, "delete from schedule where trainno=" . $trainno);
    echo 1;
}
?>