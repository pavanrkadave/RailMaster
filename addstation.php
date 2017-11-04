<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | Station </title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>

    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">
                    <br><br>
                    <h1 class = "header center orange-text">Database Home Page</h1>

                    <div class = "row center">
                        <h5 class = "header col s12 light">Enter a Station to store</h5>
                    </div>

                    <form class="col s12" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="alert alert-error"></div>

                        <div ng-app ="myapp" ng-controller ="userController" ng-init = "displayData()">

                            <div class="row center">
                                <div class="input-field col s12">
                                    <input name="sid" type="text" class="validate" ng-model ="sid" required>
                                    <label for="icon_prefix">Station ID</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field col s12">
                                    <input name="sname" type="text" class="validate" ng-model ="sname" required>
                                    <label for="icon_prefix">Station Name</label>
                                </div>
                            </div>


                            <div class ="row center">
                                <div class = "col s12">
                                    <input type="submit" name="btnInsert" ng-click = "insertData()" value="ADD" class="btn-large waves-effect waves-light orange" />
                                    <a href="addtrains.php" id="download-button" class="btn-large waves-effect waves-light orange">Add a Train</a>
                                </div>
                            </div>


                            <table class = "table table-bordered ex">
                                <div class = "row center">
                                    <tr>
                                        <th>Sid</th>
                                        <th>Station Name</th>
                                    </tr>

                                    <tr ng-repeat = "y in stations">
                                        <td>{{y.sid}}</td>
                                        <td>{{y.sname}}</td>
                                    </tr> 
                                </div>		   
                            </table>
                        </div>

                    </form>

                </div>
            </div>

            <!--  Scripts-->
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="js/materialize.js"></script>
            <script src="js/init.js"></script>
            <script src="js/script.js"></script>
            <link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>


            <script>
                                          var app = angular.module("myapp", []);

                                          app.controller("userController", function ($scope, $http) {
                                              $scope.insertData = function () {
                                                  $http.post("insert_station.php",
                                                          {'sid': $scope.sid, 'sname': $scope.sname}).success(function (data) {
                                                      alert(data);
                                                      $scope.sid = null;
                                                      $scope.sname = null;
                                                      $scope.displayData();
                                                  });
                                              }
                                              $scope.displayData = function () {
                                                  $http.get("display_station.php")
                                                          .success(function (data) {
                                                              $scope.stations = data;
                                                          });
                                              }
                                          });

            </script>

