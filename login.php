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
            <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="section no-pad-bot">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">Login.</h1>

                <div class="row center">
                    <h5 class="header col s12 light">Enter Username and Password to Login.</h5>
                </div>

                <form class="col s12" action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="alert alert-error"></div>

                    <div class="row center">
                        <div class="input-field col s12">
                            <input name="user" type="text" class="validate">
                            <label for="icon_prefix">Username</label>
                        </div>
                    </div>

                    <div class="row center">

                        <div class="input-field col s12">
                            <input name="passsword" type="text" class="validate">
                            <label for="icon_prefix">Password</label>
                        </div>
                    </div>

                    <div class ="row center">
                        <div class="col s12">
                            <input type="submit" value="Save" name="register" class="btn-large waves-effect waves-light orange" />
                        </div>
                    </div>

                </form>
            </div>
        </div>


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'collegedb');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $mysqli->real_escape_string($_POST['user']);
            $password = $mysqli->real_escape_string($_POST['password']);

            if ($user == 'admin' && $password = 'admin') {

                echo '<script language="javascript">';
                echo 'alert("Logged in Successfully as ' . $user . '"); location.href="index1.php"';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'alert("Login Failed!"); location.href="login.php"';
                echo '</script>';
            }
        }
        ?>
    </body>
</html>
