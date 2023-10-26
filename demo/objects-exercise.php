<?php

ini_set('display_errors', 1);

class Umbrella
{
  private $isOpen;

  public function __construct()
  {
    $this->isOpen = false;
  }

  public function open()
  {
    $this->isOpen = true;
  }

  public function close()
  {
    $this->isOpen = false;
  }

  public function getStatus()
  {
    if ($this->isOpen) {
      echo "umbrella is open.";
    } else {
      echo "umbrella is closed.";
    }
  }
}


$myUmbrella = new Umbrella();

$myUmbrella->open();
// $myUmbrella->close();
$myUmbrella->getStatus();


/*

Object: Umbrella

Properties:
- isOpen?
- isBroken?

Methods:
- button for open
- push to close



*/
