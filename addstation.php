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
        <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="home_admin.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">

                    <h1 class = "header center red-text">Database Home Page</h1>

                    <div class = "row center">
                        <h5 class = "header col s12 light">Enter a Station to store</h5>
                    </div>

                    <form class="col s12" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="alert alert-error"></div>

                        <div ng-app='myapp' ng-controller="userCtrl">

                            <div class="row center">
                                <div class="input-field col s12">
                                    <input name="id" type="text" class="validate" ng-model ="id"  required>
                                    <label for="icon_prefix">Sequence Number</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field col s12">
                                    <input name="sid" type="text" class="validate" ng-model ="sid">
                                    <label for="icon_prefix">Station ID</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field col s12">
                                    <input name="sname" type="text" class="validate" ng-model ="sname">
                                    <label for="icon_prefix">Station Name</label>
                                </div>
                            </div>


                            <div class ="row center">
                                <div class = "col s12">
                                    <input type="submit" name="btn_insert" ng-click = "add()" value="Add Station" 
                                           class="btn waves-effect waves-light red" />
                                </div>
                            </div>


                            <table class = "table highlight centered">
                                <div class = "row center">
                                    <thead>
                                        <tr>
                                            <th>Seq No</th>
                                            <th>SID</th>
                                            <th>Station Name</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr ng-repeat = "y in station">
                                            <td>{{y.id}}</td>
                                            <td>{{y.sid}}</td>
                                            <td>{{y.sname}}</td>
                                            <td><input type="submit" value="Delete" ng-click = "remove($index, y.id)" 
                                                       class="btn-large waves-effect waves-light red" /></td>
                                        </tr>
                                    </tbody>

                                </div>		   
                            </table>
                        </div>

                        <div class = "row center">
                            <div class = "col s12">
                                <a href = "home_admin.php" class="btn-large waves-effect waves-light red">Home</a>
                                <a href = "addtrains.php" class="btn-large waves-effect waves-light red">Add a Train</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
    </body>
</html>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>


<script>
                                                var fetch = angular.module('myapp', []);

                                                fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {

                                                        // Get all records
                                                        $http({
                                                            method: 'post',
                                                            url: 'insertdeletestation.php',
                                                            data: {request_type: 1},
                                                        }).then(function successCallback(response) {
                                                            $scope.station = response.data;
                                                        });

                                                        // Add new record
                                                        $scope.add = function () {
                                                            $http({
                                                                method: 'post',
                                                                url: 'insertdeletestation.php',
                                                                data: {id: $scope.id, sid: $scope.sid, sname: $scope.sname, request_type: 2},
                                                            }).then(function successCallback(response) {
                                                                $scope.station.push(response.data[0]);
                                                            });
                                                        }

                                                        // Remove record
                                                        $scope.remove = function (index, id) {
                                                            $http({
                                                                method: 'post',
                                                                url: 'insertdeletestation.php',
                                                                data: {id: id, request_type: 3},
                                                            }).then(function successCallback(response) {
                                                                $scope.station.splice(index, 1);
                                                            });
                                                        }

                                                    }]);

</script>
