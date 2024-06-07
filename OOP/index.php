<?php

declare(strict_types=1);

$name = "Global variable"; // variable

function test() //function
{
    global $name;

    return $name;
}

class Test
{
    public $name = "property"; //property

    public function method() // method
    {
        return test();
    }

    public function add(int $a, int $b = 88): int
    {
        return $a + $b;
    }

    public function divide($a, $b, $divide)
    {
        return $this->add($a,$b) / $divide;
    }

}

//class Fruit
//{
//
//}


//$test = new Test(); // object

//var_dump($test instanceof Fruit);


//echo $test->name; // old value


//$test->name = "new Property";

//echo $test->method();


//echo $test->add(5, 20);


//echo $test->divide(5,10,2);

//echo $test->name;


class Car
{
    protected string|null $model = null;

    public function __construct(?string $model = null)
    {
        $this->model = $model;
    }

    public function __destruct()
    {

    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): void
    {
        $this->model = $model;
    }
}

//$car = new Car();
//
//$car2 = new Car();

//var_dump($car2 == $car);

//echo $car2->getModel();
//
//echo $car->getModel();
//
//$car->setModel('Honda');
//
//echo $car->getModel();

class Fruit {
    protected $protectedName = "Protected name";

    public $publicName;

    public function __construct()
    {
        $this->publicName = $this->protectedName;
    }
}

$fruit = new Fruit();


//view('about', ['name' => 'Vasif']);
