<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MVC Demo</title>
</head>

<body>
  <h1>MVC with mySQL</h1>
  <?php
  // require_once("controllers/controller.php");

  include_once("controllers/controller.php");
  // $connection1 = new connectionObject("localhost", "root", "", "mvc_demo");
  // $controller = new Controller($connection1);
  // $controller->start();
  $connection2 = new connectionObject("localhost", "root", "", "mvc_demo");
  $controller = new Controller($connection2);
  $controller->start();
  $controller->showForm();
  echo $_POST["name"];
  ?>

</body>

</html>