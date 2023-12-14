<!-- Display the form elements for user input.
Use action attribute to point to the controller script (e.g., action="controller.php").
Validate user input before submitting the form. -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a Pet!</title>
</head>

<body>
  <h1>Add a New Furry Friend</h1>
  <div class="container">
    <div class="row">
      <div class="left">
        <form method="POST">
          <label for="petName">Name:</label>
          <input type="text" name="petName" id="petName" required>

          <label for="species">Species:</label>
          <select name="species" id="species" required>
            <option value="">Select Species</option>
            <option value="1">Dog</option>
            <option value="2">Cat</option>
            <option value="3">Duck</option>
          </select>

          <label for="breed">Breed:</label>
          <select name="breed" id="breed" required>
            <option value="">Select Breed</option>
            <option value="1">Pure</option>
            <option value="2">Mixed</option>
          </select>

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

          <fieldset>
            <label for="isVaccinated">Vaccinated?</label>
            <input type="checkbox" name="isVaccinated" id="isVaccinated" required>
          </fieldset>

          <br>

          <label for="age">Age:</label>
          <input type="number" min="1" max="30" name="age" id="age" required>



          <label for="trained">Trained:</label>
          <select name="trained" id="trained" required>
            <option value="">Select Trained</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>

          <label for="size">Size:</label>
          <select name="size" id="size" required>
            <option value="">Select Size</option>
            <option value="1">Small</option>
            <option value="2">Medium</option>
            <option value="3">Large</option>
          </select>

          <label for="furType">Fur Type:</label>
          <select name="furType" id="furType" required>
            <option value="">Select Fur Type</option>
            <option value="1">Short Hair</option>
            <option value="2">Medium Hair</option>
            <option value="3">Long Hair</option>
          </select>

          <label for="description">Description:</label>
          <textarea name="description" id="description" rows="5" cols="30" maxlength="255" placeholder="Write a small description..." required></textarea>

          <label for="adoptionPricingID">Adoption Price:</label>
          <select name="adoptionPricingID" id="adoptionPricingID" required>
            <option value="">Select Adoption Price</option>
            <option value="5">$200</option>
            <option value="6">$350</option>
            <option value="1">$500</option>
            <option value="2">$600</option>
            <option value="4">$900</option>
            <option value="3">$1350</option>

            <!-- <button type="submit" name="submit" id="submit">Add Pet</button> -->
            <input class="submit-btn" type="submit" name="submit" value="Add Pet">
        </form>
      </div> <!-- end left -->
      <div class="right">photo of pet</div>
    </div> <!-- end row -->
  </div> <!-- end container -->

  <p><a href="home.php">See all pets</a></p>
</body>

</html>


<!-- <?php echo isset($_POST['petName']) ? $_POST['petName'] : ""; ?> -->