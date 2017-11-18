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

        <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">RailMaster 1.0 (Beta) </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#">Log Out</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Log out</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div class="section no-pad-bot" id="index-banner">

            <div class="container">
                <br><br>
                <h1 class="header center red-text">User Home Page</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Enter Data to Store</h5>
                </div>

                <div class="row center">
                    <form class="form" autocomplete="off">
                        <div class="alert alert-error"></div>
                        <input type="button" value="Book A Ticket" class="btn-large waves-effect waves-light red" onClick="document.location.href = 'bookticket.php'" />
                        <input type="button" value="Train Status" class="btn-large waves-effect waves-light red" onClick="document.location.href = 'trainstatus.php'" />
                        <input type="button" value="Search Train" class="btn-large waves-effect waves-light red" onClick="document.location.href = 'searchtrain.php'" />
                    </form>
                </div>

                <br><br>
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
            echo "<br><br><br><br><br><br><br><br> Database System and Server Status : </b><i> Online. </i> ";
        ?>
    </body>
</html>
