<?php
class Car
{
    public $make_model;
    private $price;
    public $miles;
    public $image;

    function __construct($make_model, $price, $miles, $image)
    {
      $this->make_model = $make_model;
      $this->price = $price;
      $this->miles = $miles;
      $this->image = $image;
    }

    function worthBuying($max_price)
    {
      return $this->price < $max_price;
    }

    function worthDriving($max_mileage)
    {
      return $this->miles < $max_mileage;
    }

    function setPrice($new_price)
    {
      if ($new_price != 0) {
        $formatted_price = number_format($new_price,2,'.',',');
        $this->price = $formatted_price;
      }
    }
    function getPrice()
    {
      return $this->price;
    }
}

// $porsche = new Car();
// $porsche->make_model = "2014 Porsche 911";
// $porsche->price = 114991;
// $porsche->miles = 7864;
//
// $ford = new Car();
// $ford->make_model = "2011 Ford F450";
// $ford->price = 55995;
// $ford->miles = 14241;
//
// $lexus = new Car();
// $lexus->make_model = "2013 Lexus RX 350";
// $lexus->price = 44700;
// $lexus->miles = 20000;
//
// $mercedes = new Car();
// $mercedes->make_model = "Mercedes Benz CLS550";
// $mercedes->price = 39900;
// $mercedes->miles = 37979;

$honda = new Car("Honda Civic",9000,120000,'dream-life.jpg');


$cars = array($honda);
$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"])&&$car->worthDriving($_GET['mileage'])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                $carPrice = $car->getPrice();
                echo "<li> $car->make_model </li>";
                echo "<ul>";
                    echo "<li> $$carPrice </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
                echo "<img src='$car->image'>";
            }
        ?>
    </ul>
</body>
</html>
