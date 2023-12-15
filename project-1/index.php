<!-- Serve as the entry point for your application.
Include the necessary files (model.php, controller.php, etc.) based on the requested URL.
Pass control to the appropriate file based on the request path. -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MVC with mySQL</title>
  <!-- css -->
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>Pet this</h1>
  <!-- add controller -->
  <?php
  include_once("controllers/controller.php");
  // Add this line to display the list of pets
  $controller->showPets();
  ?>

</body>

</html>