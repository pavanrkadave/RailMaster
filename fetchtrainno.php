<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "collegedb");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM trains WHERE trainno LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["trainno"];
 }
 echo json_encode($data);
}

?>