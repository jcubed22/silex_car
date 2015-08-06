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

    $app->get("/car", function() {
        $porsche = new Car("2014 Porsche 911", 18000, 70000, "img/porsche.jpg");
        $stingray = new Car("76 Corvette Stingray", 20000, 40000, "img/mybaby.jpg");
        $trailblazer = new Car("2006 Chevy Trailblazer", 144000, 12000, "img/trail.jpg");
        $yugo = new Car("1981 Yugo", 6200, 5, "img/yugo.jpeg");

        $cars = array($porsche, $stingray, $trailblazer, $yugo);

        $car_match = array();
            foreach ($cars as $car) {
                if ($car->getPrice() <= $_GET["search_price"] && $car->getMiles() <= $_GET["search_miles"]) {
                    array_push($car_match, $car);
                }


            }

        $output = "";
        $output .= "<html>
                    <head>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
                    </head>
                    <body>
                    <div class='container'>
                    <h1>Car Dealership</h1>";
            if (empty($car_match)) {
                $output .= "<h2>No Matching Result!</h2>";
            }   else {
                foreach ($car_match as $car) {
                    $output .= "<li>" . $car->getCarModel() . "</li>
                    <ul>
                        <li><img src=" . $car->getPhoto() ." ></li>
                        <li> $" . $car->getPrice() . "</li>
                        <li> " . $car->getMiles() . " miles</li>
                    </ul>";
                }
            }

            $output .= "</div></body></html>";

            return $output;
    });

    return $app;
?>
