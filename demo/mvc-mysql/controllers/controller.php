<?php
include_once("models/model.php");
class Controller
{
  private $model;
  public function __construct()
  {
    $connectionObject = new connectionObject("localhost", "basic_demo_user", "p2kJe40^2", "basic_demo");
    $this->model = new userModel($connectionObject);
  }
  public function start()
  {
    $users = $this->model->selectUsers();
    include 'views/home.php';
  }
}
