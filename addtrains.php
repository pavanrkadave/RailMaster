<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | Trains</title>

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
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="index1.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">
                    <br><br>
                    <h1 class = "header center orange-text">Database Home Page</h1>

                    <div class = "row center">
                        <h5 class = "header col s12 light">Enter a Train to store</h5>
                    </div>

                    <form class="col s12" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="alert alert-error"></div>

                        <div ng-app='myapp' ng-controller="userCtrl">

                            <div class="row center">
                                <div class="input-field col s12">
                                    <input name="trainno" type="text" class="validate" ng-model = "trainno" >
                                    <label for="icon_prefix">Train Number</label>
                                </div>
                            </div>

                            <div class = "row center">
                                <div class ="input-field col s12">
                                    <input name="name" type="text" class = "validate" ng-model = "name" />
                                    <label for = "icon_prefix">Train Name</label>
                                </div>
                            </div>

                            <div class = "row center">
                                <div class ="input-field col s12">
                                    <input name="type" type="text" class = "validate" ng-model = "type" />
                                    <label for = "icon_prefix">Train Type</label>
                                </div>
                            </div>

                            <div class = "row center">
                                <div class ="input-field col s12">
                                    <input name="fromst" type="text" class = "validate" ng-model = "fromst" />
                                    <label for = "icon_prefix">From Station</label>
                                </div>
                            </div>

                            <div class = "row center">
                                <div class ="input-field col s12">
                                    <input name="tost" type="text" class = "validate" ng-model = "tost" />
                                    <label for = "icon_prefix">To Station</label>
                                </div>
                            </div>

                            <div class ="row center">
                                <div class="col s12">
                                    <input type="submit" id = "btn_save" ng-click ="add()" value="Save Train" class="btn-large waves-effect waves-light orange" />
                                </div>
                            </div>

                            <table class = "table table-bordered ex">
                                <div class = "row center">
                                    <tr>
                                        <th>Number</th>
                                        <th>Train Name</th>
                                        <th>Type</th>
                                        <th>From Station</th>
                                        <th>To Station</th>
                                    </tr>

                                    <tr ng-repeat = "z in trains">
                                        <td>{{z.trainno}}</td>
                                        <td>{{z.name}}</td>
                                        <td>{{z.type}}</td>
                                        <td>{{z.fromst}}</td>
                                        <td>{{z.tost}}</td>
                                        <td><input type="submit" value="Delete" ng-click = "remove($index, z.trainno)" 
                                                   class="btn-large waves-effect waves-light orange" /></td>

                                    </tr> 
                                </div>								
                            </table>

                            <div class = "row center">
                                <div class = "col s12">
                                    <a href = "index1.php" class="btn-large waves-effect waves-light orange">Home</a>
                                    <a href = "addstation.php" class="btn-large waves-effect waves-light orange">Add a Station</a>
                                </div>
                            </div>

                    </form>
                </div>                   
            </div>
        </div>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/script.js"></script>
        <link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    </body>
</html>

<script>
                                            var fetch = angular.module('myapp', []);

                                            fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {

                                                    // Get all records
                                                    $http({
                                                        method: 'post',
                                                        url: 'insertdeletetrains.php',
                                                        data: {request_type: 1},

                                                    }).then(function successCallback(response) {
                                                        $scope.trains = response.data;
                                                    });

                                                    // Add new record
                                                    $scope.add = function () {
                                                        $http({
                                                            method: 'post',
                                                            url: 'insertdeletetrains.php',
                                                            data: {trainno: $scope.trainno, name: $scope.name, type: $scope.type, fromst: $scope.fromst, tost: $scope.tost, request_type: 2},
                                                        }).then(function successCallback(response) {
                                                            $scope.trains.push(response.data[0]);
                                                        });
                                                    }

                                                    // Remove record
                                                    $scope.remove = function (index, trainno) {

                                                        $http({
                                                            method: 'post',
                                                            url: 'insertdeletetrains.php',
                                                            data: {trainno: trainno, request_type: 3},
                                                        }).then(function successCallback(response) {
                                                            $scope.trains.splice(index, 1);
                                                        });
                                                    }

                                                }]);

</script>