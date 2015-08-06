<?php
    require_once __DIR__.'/../vendor/autoload.php';
    require_once __DIR__.'/../src/car.php';

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get('/', function () use ($app) {

        $porsche = new Car("2014 Porsche 911", 18000, 70000, "img/porsche.jpg");
        $stingray = new Car("76 Corvette Stingray", 20000, 40000, "img/mybaby.jpg");
        $trailblazer = new Car("2006 Chevy Trailblazer", 144000, 12000, "img/trail.jpg");
        $yugo = new Car("1981 Yugo: Like New!", 6200, 5, "img/yugo.jpeg");

        $cars = array($porsche, $stingray, $trailblazer, $yugo);

        return $app['twig']->render('inventory.html.twig', array('cars' => $cars));

    });

    $app->get('/search', function () use ($app) {

        return $app['twig']->render('search.html.twig');

    });

    $app->get('/results', function() use ($app) {


        $car_match = array();
            foreach ($cars as $car) {
                if ($car->getPrice() <= $_GET["search_price"] && $car->getMiles() <= $_GET["search_miles"]) {
                    array_push($car_match, $car);
                };
            };
    });

    return $app;

?>
