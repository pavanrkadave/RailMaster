<?php

$connect = mysqli_connect("localhost", "root", "", "collegedb");
$data = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
    $sid = mysqli_real_escape_string($connect, $data->sid);
    $sname = mysqli_real_escape_string($connect, $data->sname);

    $sql = "INSERT INTO station (sid,sname)" . "VALUES ('$sid','$sname')";
    //If the query is successful redirect to welcome.php,done!
    if (mysqli_query($connect, $sql)) {
        echo 'Station Added Successfully';
    } else {
        echo 'Station Cannot be added';
    }
}
?>