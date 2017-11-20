<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "collegedb");  
      $query = "SELECT * FROM schedule WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);
        
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Train Number</label></td>  
                     <td width="70%">'.$row["trainno"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>From Station</label></td>  
                     <td width="70%">'.$row["from_st"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>To Station</label></td>  
                     <td width="70%">'.$row["to_st"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Days</label></td>  
                     <td width="70%">'.$row["days"].'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Departure</label></td>  
                     <td width="70%">'.$row["deptime"].'</td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Arrival</label></td>  
                     <td width="70%">'.$row["arrival"].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>