<!-- Display a list of pets available for adoption, using data retrieved from the model (e.g., calling Pet::getAll()).
Provide links or buttons to access the form for adding new pets. -->

<!-- <form action="">
  <select name="" id="">
    <option value="">Select a pet</option>

    <?php

    if ($pets) {
      foreach ($pets as $pet) {
        echo "<option value=" .  $pet['petID'] . ">" . $pet['petName'] . "</option>";
      }
    } else {
      echo "no pets found";
    }
    ?>

  </select>
  <button type="submit">View Details</button>
</form> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Pet Adoption</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
  <h1>List of Pets Available for Adoption</h1>

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

  <p><a href="../index.php">Add a New Pet</a></p>
</body>

</html>