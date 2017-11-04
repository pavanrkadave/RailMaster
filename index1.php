<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | Login</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="index1.php" class="brand-logo">RailMaster 1.0 (Beta) </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#">Logged In As Root</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Logged In As Root</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">Database Home Page</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Enter Data to Store</h5>
                </div>
                <div class="row center">
                    <form class="form" autocomplete="off">
                        <div class="alert alert-error"></div>
                        <input type="button" value="Add Trains" class="btn-large waves-effect waves-light orange" onClick="document.location.href = 'addtrains.php'" /><br></br>
                        <input type="button" value="Add Stations" class="btn-large waves-effect waves-light orange" onClick="document.location.href = 'addstation.php'" />
                        <input type="button" value="Display Trains" class="btn-large waves-effect waves-light orange" onClick="document.location.href = 'displaytrains.php'" /><br></br>
                        <input type="button" value="Go to Home" class="btn-large waves-effect waves-light orange" onClick="document.location.href = 'index.php'" />
                        <input type="button" value="Add Schedule" class="btn-large waves-effect waves-light orange" onClick="document.location.href = 'displaytrains.php'" /><br></br>
                    </form>
                </div>
                <br><br>
            </div>
        </div>

    </div>
</div>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

<?php
$con = mysqli_connect("localhost", "root", "", "collegedb");

if (mysqli_connect_errno()) {
    echo "RailMaster Server is Down, Please Contact Pavan Hegde" . mysqli_connect_error();
} else
    echo "<b> Database System and Server Status : </b><i> Online </i> "
    ?>
</body>
</html>
