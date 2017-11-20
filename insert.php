<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $trainno = mysqli_real_escape_string($connect, $_POST["trainno"]);  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $type = mysqli_real_escape_string($connect, $_POST["type"]);  
      $fromst = mysqli_real_escape_string($connect, $_POST["fromst"]);  
      $tost = mysqli_real_escape_string($connect, $_POST["tost"]);
      $days = mysqli_real_escape_string($connect, $_POST["days"]);
      $dep = mysqli_real_escape_string($connect, $_POST["dep"]);
      $arr = mysqli_real_escape_string($connect, $_POST["arr"]);  
           $query = "  
           INSERT INTO schedule(trainno, name,from_st, to_st,days,deptime,arrival)  
           VALUES('$trainno', '$name','$fromst', '$tost','$days','$dep','$arr');  
           ";  
           $message = 'Data Inserted';  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM trains ORDER BY trainno ASC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Train Number</th>
                          <th width="70%">Name</th>
                          <th width="70%">Type</th>
                          <th width="70%">From Station</th>
                          <th width="70%">To Station</th>
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["trainno"] . '</td>
                          <td>' . $row["name"] . '</td>
                          <td>' . $row["type"] . '</td>
                          <td>' . $row["fromst"] . '</td>
                          <td>' . $row["tost"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" trainno="'.$row["trainno"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" trainno="' . $row["trainno"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>