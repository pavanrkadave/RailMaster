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
            <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">
                    <br><br>
                    <h1 class = "header center orange-text">Database Home Page</h1>

                    <div class = "row center">
                        <h5 class = "header col s12 light">Enter a Train to store</h5>
                    </div>

                    <form class="col s12" action="addtrains.php" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="alert alert-error"></div>

                        <div class="row center">
                            <div class="input-field col s12">
                                <input name="trainno" type="text" class="validate" required>
                                <label for="icon_prefix">Train Number</label>
                            </div>
                        </div>

                        <div class = "row center">
                            <div class ="input-field col s12">
                                <input name="name" type="text" class = "validate" required />
                                <label for = "icon_prefix">Train Name</label>
                            </div>
                        </div>

                        <div class = "row center">
                            <div class ="input-field col s12">
                                <input name="type" type="text" class = "validate" required />
                                <label for = "icon_prefix">Train Type</label>
                            </div>
                        </div>

                        <div class = "row center">
                            <div class ="input-field col s12">
                                <input name="fromst" type="text" class = "validate" required />
                                <label for = "icon_prefix">From Station</label>
                            </div>
                        </div>

                        <div class = "row center">
                            <div class ="input-field col s12">
                                <input name="tost" type="text" class = "validate" required />
                                <label for = "icon_prefix">To Station</label>
                            </div>
                        </div>

                        <div class ="row center">
                            <div class="col s12">
                                <input type="submit" value="Save Train " name="register" class="btn-large waves-effect waves-light orange" />
                                <input type="submit" value="Add a Station" onClick="document.location.href = 'addstation.php'" class="btn-large waves-effect waves-light orange" />
                                <input type="submit" value="Go To Home" onclick = "document.location.href = 'index1.php'" class="btn-large waves-effect waves-light orange" />
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

                $trainno = $mysqli->real_escape_string($_POST['trainno']);
                $name = $mysqli->real_escape_string($_POST['name']);
                $type = $mysqli->real_escape_string($_POST['type']);
                $fromst = $mysqli->real_escape_string($_POST['fromst']);
                $tost = $mysqli->real_escape_string($_POST['tost']);

                $sql = "INSERT INTO trains (trainno,name,type,fromst,tost)" . "VALUES ('$trainno','$name','$type','$fromst','$tost')";
                //If the query is successful redirect to welcome.php,done!
                if ($mysqli->query($sql) == true) {
                    echo '<script language="javascript">';
                    echo 'alert("Successfully inserted the Train ' . $name . '"); location.href="index.php"';
                    echo '</script>';
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Train Cannot Be Added"); location.href="index.php"';
                    echo '</script>';
                }
            }
            ?>

    </body>
</html>