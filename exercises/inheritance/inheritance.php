<?php

#1
class Animal
{
  public function makeSound()
  {
    echo "rawr <br>";
  }
}

class Cat extends Animal
{
  public function makeSound()
  {
    echo "meow <br>";
  }
}

$testAnimal = new Animal();
$testAnimal->makeSound(); // rawr
$testCat = new Cat();
$testCat->makeSound(); // meow

echo "<br>";


#2
class Vehicule
{
  public function drive()
  {
    echo "vrooooooooom <br>";
  }
}

class Car
{
  public function repairCar()
  {
    echo "repairing a car <br>";
  }
}

$testVehicule = new Vehicule();
$testVehicule->drive(); // vrooooooooom
$testCar = new Car();
$testCar->repairCar(); // Repairing a car

echo "<br>";


#3
class Shape
{
  public function getArea()
  {
    // public $width;
    // public $height;
  }
}

class Rectangle
{
  public function getArea()
  {
    // return $this->width * $this->height;
  }
}
