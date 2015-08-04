<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/car.php';

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
            <!DOCTYPE html>
            <html>
            <head>
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
                <title>Search for your ideal car!</title>
            </head>
            <body>
                <div class='container'>
                    <h1>Find a car!</h1>
                    <form action='/car'>
                        <div class='form-group'>
                            <label for='search_price'>Enter Maximum Price:</label>
                            <input id='search_price' name='search_price' class='form-control' type='number'>
                        </div>
                        <div class='form-group'>
                            <label for='search_miles'>Enter Maximum Mileage:</label>
                            <input id='search_miles' name='search_miles' class='form-control' type='number'>
                        </div>
                        <button type='submit' class='btn-success'>Find it!</button>
                    </form>
                </div>
            </body>
            </html>
            ";
    });

    $search_results->get("/car", function() {
            
    })


    return $app;
?>
