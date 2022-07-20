<?php
    class Vehicles{
        public $name;
        public $model;
        public $makeYear;
        public $color;
        public $fuelType;
        function __construct($name,$model,$makeYear,$color, $fuelType){
        $this-> name = $name;
        $this-> model = $model;
        $this-> makeYear = $makeYear;
        $this-> color = $color;
        $this-> fuelType = $fuelType;
    }
        function printCar(){
            return "Hello my car is {$this->name} {$this->model} <br>";
        }
    }
    $var = new Vehicles ("benz", "gx-520", 2022, "black", "diesel");
    echo $var-> printCar();
    class Ship extends Vehicles {
        public $length;
        public $price;
        public $driver;
        function __construct($name,$model,$makeYear, $color, $fuelType,$length, $price, $driver)
        {
            parent::__construct($name,$model,$makeYear,$color, $fuelType);
            $this-> length = $length;
            $this->price = $price;
            $this->driver = $driver;
        }
        function printship(){
            return "Hello my ship is {$this->name}";
        }
    }
    $var = new ship ("msblue", "luxuryship",2000, "darkblue", "diesel", 8000, 50000000, "master");
    echo $var-> printship();
?>