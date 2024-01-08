<?php
// cat infos, this is the object
include_once("model-animal.php");

class Cat extends Animal
{
  public function makeSound()
  {
    echo "The cat quarrels.";
  }
  public function meow()
  {
    echo "meow!";
  }
}
