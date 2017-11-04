<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | Station</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>


    <style type=text/css>
        th {
            font-size:18px;
            color:#000;
            padding:8px;
            border-bottom : 5px solid #f06220;
            border-left : 3px solid #f06220;
            border-right : 3px solid #f06220;
            border-top : 3px solid #f06220;
        }

        td {
            padding:8px;
            color:#000;
            font-size:18px;
            border-bottom : 2px solid #f06220;
            border-left : 2px solid #f06220;
            border-right : 2px solid #f06220;
        }
    </style>

    <style type = "text/css">
        .example-container {
            display: flex;
            flex-direction: column;
            max-height: 500px;
            min-width: 300px;
        }

        .mat-table {
            overflow: auto;
            max-height: 500px;
        }
    </style>

    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">
                    <br><br>
                    <h1 class = "header center orange-text">Display Train Data</h1>
                </div>

                <div ng-app = "myapp" ng-controller = "userController" ng-init = "displayData()">
                    <table class = "table table-bordered ex">
                        <div class = "row center">
                            <tr>
                                <th>Train No</th>
                                <th>Train Name</th>
                                <th>From Station</th>
                                <th>To Station</th>
                            </tr>

                            <tr ng-repeat = "x in names">
                                <td>{{x.number}}</td>
                                <td>{{x.Trainname}}</td>
                                <td>{{x.fromstation}}</td>
                                <td>{{x.tostation}}</td>

                            </tr> 
                        </div>		   
                    </table>
                </div>



                <div class ="row center">
                    <div class="col s12">
                        <input type="button" value="Go To Home" class="btn-large waves-effect waves-light orange" onClick="document.location.href = 'index.php'" />
                    </div>
                </div>

                <!--  Scripts-->
                <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                <script src="js/materialize.js"></script>
                <script src="js/init.js"></script>
                <link rel="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
                <script src ="js/script.js"></script>

            </div>
        </div>
    </body>
</html>

<script>
          var app = angular.module("myapp", []);

          app.controller("userController", function ($scope, $http) {
              $scope.displayData = function () {
                  $http.get("select_view.php")
                          .success(function (data) {
                              $scope.names = data;
                          });
              }
          });
</script>



