<h1>Edit Pet</h1>

<?php

$_GET['petID'];

if ($pet) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updatedPetName = $_POST['petName'];
    $updatedSpecies = $_POST['speciesID'];
    $updatedBreed = $_POST['breedID'];
    $updatedGender = $_POST['gender'];
    $isVaccinatedUpdate = $_POST['isVaccinated'];
    $updatedAge = $_POST['age'];
    $isTrainedUpdate = $_POST['isTrained'];
    $updatedSize = $_POST['sizeID'];
    $updatedFurType = $_POST['furTypeID'];
    $updatedPetDescription = $_POST['petDescription'];
    $updatedAdoptionPrice = $_POST['adoptionPricingID'];

    $updatedPetImage = '';
    if (!empty($_FILES['petImage']['name'])) {
      $targetDir = "uploads/";
      $targetFile = $targetDir . basename($_FILES['petImage']['name']);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

      $check = getimagesize($_FILES['petImage']['tmp_name']);
      if ($check === false) {
        echo 'File is not an image.';
      } else {
        if (move_uploaded_file($_FILES['petImage']['tmp_name'], $targetFile)) {
          $updatedPetImage = $targetFile;
        } else {
          echo 'Sorry, there was an error uploading your file.';
        }
      }
    }

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
      $updatedAdoptionPrice,
      $updatedPetImage
    );

    if ($success) {
      header('Location: index.php?controller=dashboard');
      exit();
    } else {
      echo 'Update failed.';
    }
  }
?>
  <form method="post" enctype="multipart/form-data">
    <label for="petName">Name:</label>
    <input type="text" name="petName" id="petName" required value="<?php echo htmlspecialchars($pet['petName']); ?>">

    <label for="species">Species:</label>
    <select name="speciesID" id="species" required>
      <option value="">Select Species</option>
      <option value="1" <?php echo ($pet['speciesName'] == "Dog") ? 'selected' : ''; ?>>Dog</option>
      <option value="2" <?php echo ($pet['speciesName'] == "Cat") ? 'selected' : ''; ?>>Cat</option>
      <option value="3" <?php echo ($pet['speciesName'] == "Duck") ? 'selected' : ''; ?>>Duck</option>
    </select>

    <label for="breed">Breed:</label>
    <select name="breedID" id="breed" required>
      <option value="">Select Breed</option>
      <option value="1" <?php echo ($pet['breedType'] == "Pure") ? 'selected' : ''; ?>>Pure</option>
      <option value="2" <?php echo ($pet['breedType'] == "Mixed") ? 'selected' : ''; ?>>Mixed</option>
    </select>

    <label for="age">Age:</label>
    <input type="number" min="1" max="999999" name="age" id="age" required value="<?php echo htmlspecialchars($pet['age']); ?>">


    <fieldset>
      <label for="gender">Gender:</label>
      <div>
        <input type="radio" name="gender" id="genderMale" value="Male" <?php echo ($pet['gender'] == 'Male') ? 'checked' : ''; ?>>
        <label for="genderMale">Male</label>

        <input type="radio" name="gender" id="genderFemale" value="Female" <?php echo ($pet['gender'] == 'Female') ? 'checked' : ''; ?>>
        <label for="genderFemale">Female</label>
      </div>
    </fieldset>

    <br>

    <label for="size">Size:</label>
    <select name="sizeID" id="size" required>
      <option value="">Select Size</option>
      <option value="1" <?php echo ($pet['sizeName'] == "Small") ? 'selected' : ''; ?>>Small</option>
      <option value="2" <?php echo ($pet['sizeName'] == "Medium") ? 'selected' : ''; ?>>Medium</option>
      <option value="3" <?php echo ($pet['sizeName'] == "Large") ? 'selected' : ''; ?>>Large</option>
    </select>

    <label for="furType">Fur Type:</label>
    <select name="furTypeID" id="furType" required>
      <option value="">Select Fur Type</option>
      <option value="1" <?php echo ($pet['furTypeName'] == "Short") ? 'selected' : ''; ?>>Short Hair</option>
      <option value="2" <?php echo ($pet['furTypeName'] == "Medium") ? 'selected' : ''; ?>>Medium Hair</option>
      <option value="3" <?php echo ($pet['furTypeName'] == "Long") ? 'selected' : ''; ?>>Long Hair</option>
    </select>

    <label for="isTrained">Trained:</label>
    <select name="isTrained" id="trained" required>
      <option value="">Select Training Status</option>
      <option value="Yes" <?php echo ($pet['isTrained'] == 'Yes') ? 'selected' : ''; ?>>Trained</option>
      <option value="No" <?php echo ($pet['isTrained'] == 'No') ? 'selected' : ''; ?>>Not Trained</option>
    </select>

    <label for="isVaccinated">Vaccinated:</label>
    <select name="isVaccinated" id="vaccinated" required>
      <option value="">Select Vaccination Status</option>
      <option value="Yes" <?php echo ($pet['isVaccinated'] == 'Yes') ? 'selected' : ''; ?>>Vaccinated</option>
      <option value="No" <?php echo ($pet['isVaccinated'] == 'No') ? 'selected' : ''; ?>>Not Vaccinated</option>
    </select>

    <label for="description">Description:</label>
    <textarea name="petDescription" id="description" rows="5" cols="30" maxlength="255" placeholder="Write a small description..." required><?php echo htmlspecialchars($pet['petDescription']); ?></textarea>

    <label for="adoptionPricingID">Adoption Price:</label>
    <select name="adoptionPricingID" id="adoptionPricingID" required>
      <option value="">Select Adoption Price</option>
      <option value="1" <?php echo ($pet['adoptionPrice'] == 200) ? 'selected' : ''; ?>>$200</option>
      <option value="2" <?php echo ($pet['adoptionPrice'] == 350) ? 'selected' : ''; ?>>$350</option>
      <option value="3" <?php echo ($pet['adoptionPrice'] == 500) ? 'selected' : ''; ?>>$500</option>
      <option value="4" <?php echo ($pet['adoptionPrice'] == 600) ? 'selected' : ''; ?>>$600</option>
      <option value="5" <?php echo ($pet['adoptionPrice'] == 900) ? 'selected' : ''; ?>>$900</option>
      <option value="6" <?php echo ($pet['adoptionPrice'] == 1350) ? 'selected' : ''; ?>>$1350</option>
    </select>

    <label for="petImage">Pet Image:</label>
    <input type="file" name="petImage" id="petImage">

    <input type="submit" value="Update Pet">
  </form>
<?php
} else {
  echo '<p>Error: Pet not found.</p>';
}
?>