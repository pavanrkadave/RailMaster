<!DOCTYPE html>
<html lang="en">

    <head>

        <!--Meta Data -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>RailMaster | SearchTrains </title>

        <!--Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/script.js"></script>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    </head>

    <body>
        <nav class="red lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="home_user.php" class="brand-logo">RailMaster 1.0 (Beta) </a></div>
        </nav>

        <div class="body-content">
            <div class="section no-pad-bot">
                <div class = "container">

                    <h3 class = "header center red-text">Search Train</h3>

                    <div class="row center">
                        <div class="input-field col s12">
                            <input type="number" name="search_text" id="search_text" class="validate" />
                            <label for="icon_prefix">Enter a Train Number To Search.</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row center">
                <h5 class="header center red-text">Search Result</h5>
            </div>
            <br/>
            <div id="result"></div>
        </div>
    </body>
</html>


<script>
    $(document).ready(function () {

        load_data();

        function load_data(query)
        {
            $.ajax({
                url: "fetchtrain.php",
                method: "POST",
                data: {query: query},
                success: function (data)
                {
                    $('#result').html(data);
                }
            });
        }
        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '')
            {
                load_data(search);
            } else
            {
                load_data();
            }
        });
    });
</script>