<?php

include_once 'controllers/controller.php';
include_once 'models/model.php';

$connection = new connectionObject("localhost", "petstore_db_user", "5bJ94ht4~", "petstore_db");
$controller = new Controller($connection);

?>

<h1>Edit Pet</h1>

<?php

$_GET['petID'];

if ($pet) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedPetName = $_POST['petName'];
    $updatedSpecies = $_POST['speciesID'];
    $updatedBreed = $_POST['breedID'];
    $updatedGender = $_POST['gender'];
    $isVaccinatedUpdate = isset($_POST['isVaccinated']) ? 'Yes' : 'No';
    $updatedAge = $_POST['age'];
    $isTrainedUpdate = $_POST['isTrained'];
    $updatedSize = $_POST['sizeID'];
    $updatedFurType = $_POST['furTypeID'];
    $updatedPetDescription = $_POST['petDescription'];
    $updatedAdoptionPrice = $_POST['adoptionPricingID'];

    echo $updatedSize = $_POST['sizeID'];

    $success = $controller->update(
      $_GET['petID'],
      $updatedPetName,
      $updatedSpecies,
      $updatedBreed,
      $updatedGender,
      $isVaccinatedUpdate,
      $updatedAge,
      $isTrainedUpdate,
      $updatedSize,
      $updatedFurType,
      $updatedPetDescription,
      $updatedAdoptionPrice
    );

    if ($success) {
      header('Location: index.php?controller=dashboard');
      exit();
    } else {
      echo 'Update failed.';
      echo $updatedSize = $_POST['sizeID'];
    }
  }
?>
  <form method="post">
    <label for="petName">Name:</label>
    <input type="text" name="petName" id="petName" required>

    <label for="species">Species:</label>
    <select name="speciesID" id="species" required>
      <option value="">Select Species</option>
      <option value="1">Dog</option>
      <option value="2">Cat</option>
      <option value="3">Duck</option>
    </select>

    <label for="breed">Breed:</label>
    <select name="breedID" id="breed" required>
      <option value="">Select Breed</option>
      <option value="1">Pure</option>
      <option value="2">Mixed</option>
    </select>

    <label for="age">Age:</label>
    <input type="number" min="1" max="999999" name="age" id="age" required>

    <fieldset>
      <label for="gender">Gender:</label>
      <div>
        <input type="radio" name="gender" id="genderMale" value="Male">
        <label for="genderMale">Male</label>

        <input type="radio" name="gender" id="genderFemale" value="Female">
        <label for="genderFemale">Female</label>
      </div>
    </fieldset>

    <br>

    <label for="size">Size:</label>
    <select name="sizeID" id="size" required>
      <option value="">Select Size</option>
      <option value="1">Small</option>
      <option value="2">Medium</option>
      <option value="3">Large</option>
    </select>

    <label for="furType">Fur Type:</label>
    <select name="furTypeID" id="furType" required>
      <option value="">Select Fur Type</option>
      <option value="1">Short Hair</option>
      <option value="2">Medium Hair</option>
      <option value="3">Long Hair</option>
    </select>

    <label for="isTrained">Trained:</label>
    <select name="isTrained" id="trained" required>
      <option value="">Select Training Status</option>
      <option value="Yes">Trained</option>
      <option value="No">Not Trained</option>
    </select>

    <label for="isVaccinated">Vaccinated:</label>
    <select name="isVaccinated" id="vaccinated" required>
      <option value="">Select Vaccination Status</option>
      <option value="Yes">Vaccinated</option>
      <option value="No">Not Vaccinated</option>
    </select>

    <label for="description">Description:</label>
    <textarea name="petDescription" id="description" rows="5" cols="30" maxlength="255" placeholder="Write a small description..." required></textarea>

    <label for="adoptionPricingID">Adoption Price:</label>
    <select name="adoptionPricingID" id="adoptionPricingID" required>
      <option value="">Select Adoption Price</option>
      <option value="5">$200</option>
      <option value="6">$350</option>
      <option value="1">$500</option>
      <option value="2">$600</option>
      <option value="4">$900</option>
      <option value="3">$1350</option>
    </select>

    <input type="submit" value="Update Pet">
  </form>
<?php
} else {
  echo '<p>Error: Pet not found.</p>';
}
?>