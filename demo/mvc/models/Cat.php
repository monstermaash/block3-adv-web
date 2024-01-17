<?php

include_once("Animal.php");

class Cat extends Animal
{
  public function makeSound()
  {
    echo "The cat quarrels.";
  }
}
