<?php

class Idcard
{
  protected $name;
  protected $dob;
  protected $address;
  protected $expiration;

  public function __construct($name, $dob, $address, $expiration)
  {
    $this->name = $name;
    $this->dob = $dob;
    $this->address = $address;
    $this->expiration = $expiration;
  }

  public function present()
  {
    echo "ID belongs to ", $this->name, " with this expiration date: ", $this->expiration . "<br>";
  }

  public function renew($duration)
  {
    $this->expiration += $duration;
  }

  public function updateAddress($newAddress)
  {
    $this->address = $newAddress;
  }

  public function cancel()
  {
    $this->expiration = 0;
  }
}

class License extends Idcard
{
  protected $classType;
  protected $points;
  protected $fees;

  public function __construct($name, $dob, $address, $expiration, $classType, $points, $fees)
  {
    parent::__construct($name, $dob, $address, $expiration); // call parent constructor
    $this->classType = $classType;
    $this->points = $points;
    $this->fees = $fees;
  }
  public function isValid()
  {
  }
  public function viewPoint()
  {
  }
  public function reprimand()
  {
  }
  public function payFees()
  {
  }
  public function setType($type)
  {
    $this->classType = $type;
  }
  public function setExpiration($duration)
  {
    $this->expiration = $duration;
  }
}

$exampleId = new Idcard("Bruce Wayne", "01/01/1930", "123 arkham st", "01/01/2024");
$exampleId->present(); // ID belongs to Bruce Wayne with this expiration date: 01/01/2024
$exampleId->renew(24); // 24 months
$exampleId->present(); // ID belongs to Bruce Wayne with this expiration date: 01/01/2026

$exampleLicense = new License("Clark Kent", "01/01/1930", "123 fortress of solitude", "01/01/2024", "A", 15, 0);
$exampleLicense->present(); // ID belongs to Clark Kent with this expiration date: 01/01/2024
$exampleLicense->viewPoint(); // Points: 15
