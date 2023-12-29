<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet store</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <?php if ($pets) : ?>
    <div class="card-container">
      <?php foreach ($pets as $pet) : ?>
        <div class="card">
          <h2><?php echo $pet['petName']; ?></h2>
          <p>Species: <?php echo $pet['speciesID']; ?></p>
          <p>Breed: <?php echo $pet['breedID']; ?></p>
          <p>Gender: <?php echo $pet['gender']; ?></p>
          <p>Age: <?php echo $pet['age']; ?></p>
          <p>Size: <?php echo $pet['size']; ?></p>
          <p>Fur Type: <?php echo $pet['furType']; ?></p>
          <p>Vaccinated: <?php echo $pet['isVaccinated']; ?></p>
          <p>Trained: <?php echo $pet['isTrained']; ?></p>
          <p>Description: <?php echo $pet['petDescription']; ?></p>
          <p>Adoption Price: <?php echo $pet['adoptionPrice']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else : ?>
    <p>No pets available for adoption at the moment.</p>
  <?php endif; ?>
</body>

</html>