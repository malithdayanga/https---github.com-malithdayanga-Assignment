<?php

class Shape {
    public function getArea() {
        // implementation to be defined in the derived classes
    }
}

class Triangle extends Shape {
    private $base;
    private $height;

    public function __construct($base, $height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function getArea() {
        return 0.5 * $this->base * $this->height;
    }
}

class Square extends Shape {
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function getArea() {
        return $this->side * $this->side;
    }
}

class Circle extends Shape {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getArea() {
        return pi() * $this->radius * $this->radius;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shapeType = $_POST['shape'];
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];

    if ($shapeType === 'triangle') {
        $triangle = new Triangle($value1, $value2);
        $area = $triangle->getArea();
    } else if ($shapeType === 'square') {
        $square = new Square($value1);
        $area = $square->getArea();
    } else if ($shapeType === 'circle') {
        $circle = new Circle($value1);
        $area = $circle->getArea();
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Shape</title>
</head>
<body>

<div class="shape-form-container">
    
    

    <form method="post">

    <div class="answer">
        <?php
            echo "The Answer is : <input type='number' name='value1' placeholder='$area' class='box'>";
            
        ?>
    </div>
<br>
        <label>Select a shape:</label>
        <select name="shape" class="box">
            <option value="triangle">Triangle</option>
            <option value="square">Square</option>
            <option value="circle">Circle</option>
        </select>
        <br>
        <label>Enter the first value:</label>
        <input type="number" name="value1" placeholder="Enter Value" class="box">
        <br>
        <label>Enter the second value:</label>
        <input type="number" name="value2" placeholder="Enter Value" class="box">
        <br>
        <button type="submit" class="btn">Calculate Area</button>
        <a href="home.php" class="shape-btn">Go back</a>
    </form>
</div>
</body>
</html>
