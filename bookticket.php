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
        <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="home_user.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">
                    <br><br>
                    <h1 class = "header center red-text">Database Home Page</h1>

                    <div class = "row center">
                        <h5 class = "header col s12 light">Book A Ticket</h5>
                    </div>

                    <form class="col s12" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="alert alert-error"></div>

                        <div ng-app='myapp' ng-controller="userCtrl">

                            <div class="row center">
                                <div class="input-field  col s12">
                                    <input name="trainno" type="text" class="validate" ng-model = "trainno" required>
                                    <label for="icon_prefix">Train Number</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field  col s12">
                                    <input name="name" type="text" class="validate" ng-model = "name" required>
                                    <label for="icon_prefix">Name</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field  col s12">
                                    <input name="phone" type="text" class="validate" ng-model = "phone" required>
                                    <label for="icon_prefix">Phone</label>
                                </div>
                            </div>

                            <div class="row center">
                                <div class="input-field  col s12">
                                    <input name="class" type="text" class="validate" ng-model = "class" required>
                                    <label for="icon_prefix">Class</label>
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
                                    <input type="submit" id = "btn_save" ng-click ="add()" value="Book Ticket" class="btn-large waves-effect waves-light red" />    
                                </div>
                            </div>

                            <div class = "row center">
                                <div class = "col s12">
                                    <a href = "home_user.php" class="btn-large waves-effect waves-light red">Home</a>
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

                                        $(document).ready(function() {
                                        $('select').material_select();
                                        });
                                        var fetch = angular.module('myapp', []);
                                        fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {

                                        // Add new record
                                        $scope.add = function () {
                                        $http({
                                        method: 'post',
                                                url: 'insertbooking.php',
                                                data: {trainno: $scope.trainno, name: $scope.name, class: $scope.class, fromst: $scope.fromst, tost: $scope.tost, phone: $scope.phone, request_type: 2},
                                        }).then(function successCallback(response) {
                                        $scope.ticket.push(response.data[0]);
                                        });
                                        }

                                        }]);

</script>