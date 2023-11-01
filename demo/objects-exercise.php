<?php

ini_set('display_errors', 1);

class Umbrella
{
  private $isOpen;
  private $color;
  private $isBroken;

  public function __construct($color, $isBroken)
  {
    $this->isOpen = false;
    $this->color = $color;
    $this->isBroken = $isBroken;
  }

  private function open()
  {
    $this->isOpen = true;
  }

  private function close()
  {
    $this->isOpen = false;
  }

  public function clickButton()
  {
    $this->open();
  }

  public function pushToClose()
  {
    $this->close();
  }

  public function action($openOrClose)
  {
    if ($openOrClose == 'click') {
      $this->open();
    } elseif ($openOrClose == 'push') {
      $this->close();
    } else {
      echo "its broken";
    }
  }

  public function getColor()
  {
    //must include return in order to "return" the value
    return $this->color;
  }
  //if you don't use return, it will still perform the operations, but it won't return a value.

  public function getIsBroken()
  {
    return $this->isBroken;
  }

  public function getStatus()
  {
    if ($this->isOpen) {
      echo "action: button clicked. <br>";
      //must include $this-> in order to get properties
      echo "my " . $this->isBroken . " " . $this->color . " umbrella is open.";
    } else {
      echo "action: push down umbrella. <br>";
      echo "my " . $this->isBroken . " " . $this->color . " umbrella is closed.";
    }
  }
}


$myUmbrella = new Umbrella("yellow", "not so broken");

$myUmbrella->action('click');
$myUmbrella->getStatus();
