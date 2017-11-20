<?php  
 $connect = mysqli_connect("localhost", "root", "", "collegedb");  
 $query = "SELECT * FROM trains ORDER BY trainno ASC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>RailMaster | Schedules</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 


            <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
         
      </head>  
      <body> 
      <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="home_admin.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav> 
           <br /><br />  
           <div class="container">  
                <h3 align="center">Availabe Trains.</h3>  
                <br />  
                <div  class="table-responsive">  
                     
                     <div align="center">  
                          <a href = "home_admin.php" class="btn btn-warning red">Go To Home</a>  
                     </div>

                     <br />  
                     <div  id="train_table" >  
                          <table  class="table centered highlight">  
                               <thead>   
                                    <th>Train Number</th>  
                                    <th>Name</th>  
                                    <th>Type</th>
                                    <th>From Station</th>
                                    <th>To Station</th>  
                               </thead>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tbody>  
                                    <td><?php echo $row["trainno"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["type"]; ?></td>
                                    <td><?php echo $row["fromst"]; ?></td>
                                    <td><?php echo $row["tost"]; ?></td>  
                                    <td><input type="button" name="edit" value="Add Schedule" id="<?php echo $row["id"]; ?>" class="btn btn-info edit_data red" /></td>  
                                    <td><input type="button" name="view" value="View Schedule" id="<?php echo $row["id"]; ?>" class="btn btn-info view_data red" /></td>  
                               </tbody>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  

 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Train Details</h4>  
                </div>  
                <div class="modal-body" id="train_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>

 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Update Trains</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Train Number</label>  
                          <input type="text" name="trainno" id="trainno" class="form-control" />  
                          <br />  
                          <label>Name</label>  
                          <input type="text" name="name" id="name" class="form-control"/>  
                          <br />  
                          <label>Type</label>  
                          <select name="type" id="type" class="form-control">  
                               <option value="Express">Express</option>  
                               <option value="Shatabdhi">Shatabdhi</option>
                               <option value="Local">Local</option>
                               <option value="Intercity">Intercity</option>
                               <option value="SuperFast">SuperFast</option>  
                          </select>  
                          <br />  
                          <label>From Station</label>  
                          <input type="text" name="fromst" id="fromst" class="form-control" />  
                          <br />  
                          <label>To Station</label>  
                          <input type="text" name="tost" id="tost" class="form-control" />  
                          <br/>
                          <label>days</label>  
                          <select name="days" id="days" class="form-control">  
                               <option value="Weekdays">Weekdays</option>  
                               <option value="Weekends">Weekends</option>
                               <option value="All Days">All Days</option>
                               <option value="Twice a Week">Twice a Week</option>  
                          </select>  
                          <br />  
                          <label>Departure Time</label>  
                          <input type="text" name="dep" id="dep" class="form-control" />  
                          <br/>
                          <label>Arrival Time</label>  
                          <input type="text" name="arr" id="arr" class="form-control" />  
                          <br/>  
                          <input type="hidden" name="id" id="id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>
 $(document).ready(function(){

      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });

      $(document).on('click', '.edit_data', function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('#trainno').val(data.trainno);  
                     $('#name').val(data.name);  
                     $('#type').val(data.type);  
                     $('#fromst').val(data.fromst);  
                     $('#tost').val(data.tost);
                     $('#days').val(data.days);
                     $('#dep').val(data.deptime);
                     $('#arr').val(data.arrival);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#trainno').val() == "")  
           {  
                alert("Number is required");  
           }  
           else if($('#name').val() == '')  
           {  
                alert("Name is required");  
           }  
           else if($('#fromst').val() == '')  
           {  
                alert("From St is required");  
           }  
           else if($('#tost').val() == '')  
           {  
                alert("To Station is required");  
           }
           else if($('#days').val() == '')  
           {  
                alert("Days is required");  
           }  
           else if($('#dep').val() == '')  
           {  
                alert("Departure Time is required");  
           }  
           else if($('#arr').val() == '')  
           {  
                alert("Arrival Time is required");  
           }     
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#train_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var id = $(this).attr("id");  
           if(id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#train_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 }); 

 </script>