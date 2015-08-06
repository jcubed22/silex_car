<?php
    class Car
    {
        private $make_model;
        private $miles;
        private $price;
        private $photo;

        function __construct($car_model, $car_miles, $car_price, $car_pic)
        {
            $this->make_model = $car_model;
            $this->miles = $car_miles;
            $this->price = $car_price;
            $this->photo = $car_pic;

        }

        function setPrice($new_price)
        {
            $float_price = (float) $new_price;
            if ($float_price != 0) {
                $formatted_price = number_format($float_price, 2);
                $this->price = $formatted_price;
            }
        }

        function setCarModel($new_model)
        {
            $this->make_model = $new_model;
        }


        function getCarModel()
        {
            return $this->make_model;
        }

        function setMiles($new_miles)
        {
            $this->miles = $new_miles;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function getPrice()
        {
            return $this->price;
        }

        function setPhoto($new_photo)
        {
            $this->photo = $new_photo;
        }

        function getPhoto()
        {
            return $this->photo;
        }


    }

?>
