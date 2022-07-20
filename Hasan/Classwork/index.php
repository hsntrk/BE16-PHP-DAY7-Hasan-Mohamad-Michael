<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Classwork</title>
</head>

<body class="bg-secondary">
    <?php
    class vehicle
    {
        public $name;
        public $model;
        public $makeYear;
        public $color;
        public $fuelType;

        function __construct($name, $model, $makeYear, $color, $fuelType)
        {

            $this->name = $name;
            $this->model = $model;
            $this->makeYear = $makeYear;
            $this->color = $color;
            $this->fuelType = $fuelType;
        }

        function printInfo()
        {
            return "
                <div class='container m-5 p-3'></dive><div class='card shadow-lg' style='width: 18rem;'>
                <div class='card-header'> {$this->name} </div>
                <ul class='list-group list-group-flush'>
                <li class='list-group-item'>{$this->model}</li>
                <li class='list-group-item'>{$this->makeYear}</li>
                <li class='list-group-item'>{$this->color}</li>
                <li class='list-group-item'>{$this->fuelType}</li>
                </ul>
                </div></div>";
        }
    }

    $var = new vehicle("Audi", "R8", "2022", "black", "benzin");
    echo $var->printInfo();

    class Ship extends vehicle
    {
        public $length;
        public $price;
        public $driver;
        function __construct($name, $model, $makeYear, $color, $fuelType, $length, $price, $driver)
        {
            parent::__construct($name, $model, $makeYear, $color, $fuelType);
            $this->length = $length;
            $this->price = $price;
            $this->driver = $driver;
        }
        function printship()
        {
            // return "Hello my ship is {$this->name}";
            return "
                <div class='container m-5 p-3'></dive><div class='card shadow-lg' style='width: 18rem;'>
                <div class='card-header'> {$this->name} </div>
                <ul class='list-group list-group-flush'>
                <li class='list-group-item'>{$this->model}</li>
                <li class='list-group-item'>{$this->makeYear}</li>
                <li class='list-group-item'>{$this->color}</li>
                <li class='list-group-item'>{$this->fuelType}</li>
                <li class='list-group-item'>{$this->length}</li>
                <li class='list-group-item'>{$this->price}</li>
                <li class='list-group-item'>{$this->driver}</li>
                </ul>
                </div></div>";
        }
    }
    $var = new ship("Hasan Marine", "CopypasteShip", 2022, "wightblue", "kerosin", "25meter", "50.000.000", "Boss Hasan");
    echo $var->printship();

    ?>




</body>

</html>