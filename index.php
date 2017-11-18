<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | Home</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>

        <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">RailMaster 1.0 (Beta) </a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="login_admin.php">Admin Login</a></li>
                    <li><a href="login_user.php">User Login</a></li>      
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="login_admin.php">Admin Login</a></li>
                    <li><a href="login_user.php">User Login</a></li>
                </ul>				

                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>



        <div class="section no-pad-bot" id="index-banner">			

            <div class = "container">
                <br><br>
                <h1 class="header center red-text">Welcome to RailMaster</h1>
                <div class="row center">
                    <h5 class="header col s12 light">A Advanced Data Management Solution. </h5>
                </div>
                <div class="row center">
                     <a class="btn-large waves-effect waves-light red" onclick="Materialize.toast('Login Here', 4000,'',function(){alert('Your toast was dismissed')})">Login To Get Started</a>
                </div>
                <br><br>

            </div>
        </div>

        <div class="container">

            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center red-text"><i class="material-icons">flash_on</i></h2>
                            <h5 class="center red-text">Fast Data Access</h5>

                            <p class="light black-text">We did the most of the heavy lifting in order to give fast data access speeds for the users.We have used all latest technologies like <b>PHP 7.0, AJAX, AngularJS, HTML5, jQuery, MariaDB (MySQL)</b> in order to achieve high speed data access. </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center red-text"><i class="material-icons">group</i></h2>
                            <h5 class="center red-text">Best User Experience</h5>

                            <p class="light black-text">User Experience is what matters the most in all applications.In RailMaster we have used <b>Materialize CSS, AngularJS, AJAX </b> which are <i>Open Source</i> to enhance the user experience to another level.</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center red-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center red-text">Secure</h5>
                            <p class="light black-text">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br><br>

        <footer class="page-footer red lighten-1">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">About RailMaster</h5>
                        <p class="grey-text text-lighten-4">RailMaster is a responsive college database system developed by <a href = "http://facebook.com/pavanrkadave" class = "yellow-text">Pavan Hegde</a> and <a class = "yellow-text" href = "http://facebook.com/pavanrkadav">Mehul Mullur</a>.</p>

                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Settings</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12">
                        <h5 class="white-text">Connect</h5>
                        <ul>
                            <li><a class="white-text" href="#!">Link 1</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="yellow-text text-lighten-3" href="http://facebook.com/pavanrkadave">Pavan Hegde</a>
                </div>
            </div>
        </footer>


        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </body>
</html>
