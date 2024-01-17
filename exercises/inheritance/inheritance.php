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

echo "#1 <br>";
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

echo "#2 <br>";
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
    // default
    return 0;
  }
}

class Rectangle extends Shape
{
  private $width;
  private $height;

  public function __construct($width, $height)
  {
    $this->width = $width;
    $this->height = $height;
  }

  public function getArea()
  {
    return $this->width * $this->height;
  }
}

echo "#3 <br>";
$testRectangle = new Rectangle(5, 10);
echo $testRectangle->getArea(); // should give 50

echo "<br>";
echo "<br>";


#4
class Employee
{
  private $salary;

  public function __construct($salary)
  {
    $this->salary = $salary;
  }

  public function work()
  {
    echo "working as an employee!";
  }

  public function getSalary()
  {
    return $this->salary;
  }
}

class HRManager extends Employee
{
  public function __construct($salary)
  {
    parent::__construct($salary);
  }

  public function work()
  {
    echo "Managing employees";
  }

  public function addEmployee()
  {
    echo "Adding new employee!";
  }
}

echo "#4 <br>";
$emp = new Employee(40000);
$mgr = new HRManager(70000);

$emp->work();
echo "Employee salary: " . $emp->getSalary();

$mgr->work();
echo "Manager salary: " . $mgr->getSalary();
$mgr->addEmployee();

echo "<br>";
echo "<br>";


#5
class BankAccount
{
  protected $balance;

  public function __construct($initialBalance)
  {
    $this->balance = $initialBalance;
  }

  public function deposit($amount)
  {
    $this->balance += $amount;
  }

  public function withdraw($amount)
  {
    $this->balance -= $amount;
  }
}

class SavingsAccount extends BankAccount
{
  public function withdraw($amount)
  {
    if ($this->balance - $amount >= 100) {
      parent::withdraw($amount);
    } else {
      echo "Withdrawal denied. Minimum balance should be 100. <br>";
    }
  }
}

echo "#5 <br>";
$savingsAccount = new SavingsAccount(200);
$savingsAccount->withdraw(50);
echo $savingsAccount->$balance;
$savingsAccount->withdraw(100);
echo $savingsAccount->$balance;

echo "<br>";
echo "<br>";


#6
class Animals
{
  public function move()
  {
    echo "Moving <br>";
  }
}

class Cheetah extends Animal
{
  public function move()
  {
    echo "Running <br>";
  }
}

echo "#6 <br>";
$animal = new Animals();
$animal->move();

$cheetah = new Cheetah();
$cheetah->move();

echo "<br>";
echo "<br>";

#7




#8


#9


#10
