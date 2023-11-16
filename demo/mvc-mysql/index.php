<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MVC Demo</title>
</head>

<body>
  <h1>MVC with mySQL</h1>
  <!-- add controller -->
  <?php
  include_once("controllers/controller.php");
  // require_once("controllers/controller.php");

  $controller = new Controller();
  $controller->start();
  // $controller->start();
  // $controller->start();

  ?>

</body>

</html>