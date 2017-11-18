<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | Register</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>

        <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">RailMaster 1.0 (Beta) </a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="login_user.php">User Login</a></li>      
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="login_user.php">User Login</a></li>
                </ul>				

                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div class="section no-pad-bot" id="index-banner">			

            <div class = "container">
                <br><br>
                <h1 class="header center red-text">User Registration </h1>
                <div class="row center">
                    <h5 class="header col s12 light">Page Under Construction</h5>
                </div>

             <form class="col s12" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="alert alert-error"></div>
                    
                        <div ng-app = "myapp" ng-controller="userCtrl" class="container">
                        
                        <div class="row center">
                            <div class="input-field col s12">
                                <input type="text" name="userid" ng-model = "userid" class="validate" required>
                                <label for="icon_prefix">User Name</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="input-field col s12">
                                <input type="text" name="name" ng-model = "name" class="validate" required>
                                <label for="icon_prefix">Name</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="input-field col s12">
                                <input type="email" name="email" ng-model = "email" class="validate" required>
                                <label for="icon_prefix">Email</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="input-field col s12">
                                <input type="password" name="password" ng-model = "password" class="validate" required>
                                <label for="icon_prefix">Password</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="input-field col s12">
                                <input type="text" name="address" ng-model = "address" class="validate" required>
                                <label for="icon_prefix">Address</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="input-field col s12">
                                <input type="text" name="phone" ng-model = "phone" class="validate" required>
                                <label for="icon_prefix">Phone</label>
                            </div>
                        </div>

                        <div class="row center">
                            <div class="col s12">
                                <input type="submit" name="btn_insert" ng-click="add()" value="Register" class="btn-large waves-effect waves-light red">
                            </div>
                        </div>

                 </div>
             </form>
        </div>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </body>
</html>

<script>
var fetch = angular.module('myapp', []);

fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {

        // Add new record
        $scope.add = function () {
            $http({
                method: 'post',
                url: 'submituser.php',
                data: {userid: $scope.userid, name: $scope.name, email: $scope.email,address: $scope.address,phone: $scope.phone,password: $scope.password request_type: 1},
            }).then(function successCallback(response) {
                $scope.user.push(response.data[0]);
            });
        }
    }]);

</script>
