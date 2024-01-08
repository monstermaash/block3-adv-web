<?php
//determine how many cats do i have
include_once("model-cat.php");

$cats = array();
$cats[] = new Cat("Tom", 2);
$cats[] = new Cat("Garfield", 3);
$cats[] = new Cat("Felix", 1);
$cats[] = new Cat("Sylvester", 4);
