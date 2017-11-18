<?php
$link = mysqli_connect("localhost", "root", "", "collegedb");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | Schedule</title>

         <!--  Scripts-->
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="js/materialize.js"></script>
            <script src="js/init.js"></script>
            <script src="js/script.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

            <link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <!--
    <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="style.css" type="text/css">
    -->
    <body>
        <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="home_admin.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">
                    <br><br>
                    <h1 class = "header center red-text">Schedule Home Page</h1>

                    <div class = "row center">
                        <h5 class = "header col s12 light">Enter a Schedule to store</h5>
                    </div>

                    <form class="col s12" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="alert alert-error"></div>

                        <div ng-app='myapp' ng-controller="userCtrl" ng-init = "loadTrain()">
                            <div class="row center">

                                <div class = "row center">
                                    <div class ="input-field col s12">
                                        <input name="trainno" id="trainno" type="text" class = "validate" ng-model = "trainno" autocomplete="off" />
                                        <label for = "name">Train Number</label>
                                    </div>
                                </div>


                                <div class = "row center">
                                    <div class ="input-field col s12">
                                        <input name="name" id="name" type="text" class = "validate" ng-model = "name" />
                                        <label for = "name">Train Name</label>
                                    </div>
                                </div>

                                <div class = "row center">
                                    <div class ="input-field col s12">
                                        <input name="from_st" type="text" class = "validate" ng-model = "from_st" />
                                        <label for = "from_st">From Station</label>
                                    </div>
                                </div>

                                <div class = "row center">
                                    <div class ="input-field col s12">
                                        <input name="to_st" type="text" class = "validate" ng-model = "to_st" />
                                        <label for = "to_st">To Station </label>
                                    </div>
                                </div>

                                <div class = "row center">
                                    <div class ="input-field col s12">
                                        <input name="days" type="text" class = "validate" ng-model = "days" />
                                        <label for = "days">Days</label>
                                    </div>
                                </div>

                                <div class = "row center">
                                    <div class ="input-field col s12">
                                        <input name="deptime" type="text" class = "validate" ng-model = "deptime" />
                                        <label for = "deptime">Departure Time</label>
                                    </div>
                                </div>

                                <div class = "row center">
                                    <div class ="input-field col s12">
                                        <input name="arrival" type="text" class = "validate" ng-model = "arrival" />
                                        <label for = "arrival">Arrival Time</label>
                                    </div>
                                </div>



                                <div class ="row center">
                                    <div class="col s12">
                                        <input type="submit" id = "btn_save" ng-click ="add()" value="Save Schedule" class="btn-large waves-effect waves-light red" />
                                    </div>
                                </div>

                                <table class = "table highlight centered">
                                    <div class = "row center">
                                        <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Train Name</th>
                                                <th>From Station</th>
                                                <th>To Station</th>
                                                <th>Days</th>
                                                <th>Departure Time</th>
                                                <th>Arrival Time</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr ng-repeat = "a in schedule">
                                                <td>{{a.trainno}}</td>
                                                <td>{{a.name}}</td>
                                                <td>{{a.from_st}}</td>
                                                <td>{{a.to_st}}</td>
                                                <td>{{a.days}}</td>
                                                <td>{{a.deptime}}</td>
                                                <td>{{a.arrival}}</td>
                                                <td><input type="submit" value="Delete" ng-click = "remove($index, a.trainno)" 
                                                           class="btn-large waves-effect waves-light red" /></td>
                                            </tr>
                                        </tbody>
                                    </div>
                                </table>								
                            </div>

                            <div class = "row center">
                                <div class = "col s12">
                                    <a href = "home_admin.php" class="btn-large waves-effect waves-light red">Home</a>
                                    <a href = "addstation.php" class="btn-large waves-effect waves-light red">Add a Station</a>
                                    <a href = "addtrains.php" class="btn-large waves-effect waves-light red">Add a Train</a>
                                </div>
                            </div>

                    </form>                   
                </div>
            </div>
    </body>
</html>

<script>

            $(document).ready(function(){
         
         $('#trainno').typeahead({
          source: function(query, result)
          {
           $.ajax({
            url:"fetchtrainno.php",
            method:"POST",
            data:{query:query},
            dataType:"json",
            success:function(data)
            {
             result($.map(data, function(item){
              return item;
             }));
            }
           })
          }
         });
         
        });


            $(document).ready(function(){
         
         $('#name').typeahead({
          source: function(query, result)
          {
           $.ajax({
            url:"fetchtrainname.php",
            method:"POST",
            data:{query:query},
            dataType:"json",
            success:function(data)
            {
             result($.map(data, function(item){
              return item;
             }));
            }
           })
          }
         });
         
        });


    $(document).ready(function () {
    $('select').material_select();
    });
    var fetch = angular.module('myapp', []);

    fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {

    $scope.loadTrain = function () {
        $http.get("load_train.php")
                .success(function (data) {
                    $scope.trains = data;
                })
    }

    // Get all records
    $http({
        method: 'post',
        url: 'insertdeleteschedule.php',
        data: {request_type: 1},

    }).then(function successCallback(response) {
        $scope.schedule = response.data;
    });

    // Add new record
    $scope.add = function () {
        $http({
            method: 'post',
            url: 'insertdeleteschedule.php',
            data: {trainno: $scope.trainno, name: $scope.name, from_st: $scope.from_st, to_st: $scope.to_st, days: $scope.days, deptime: $scope.deptime, arrival: $scope.arrival, request_type: 2},
        }).then(function successCallback(response) {
            $scope.schedule.push(response.data[0]);
        });
    }

    // Remove record
    $scope.remove = function (index, trainno) {

        $http({
            method: 'post',
            url: 'insertdeleteschedule.php',
            data: {trainno: trainno, request_type: 3},
        }).then(function successCallback(response) {
            $scope.schedule.splice(index, 1);
        });
    }

    }]);

</script>