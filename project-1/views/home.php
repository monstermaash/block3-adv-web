<!-- Display a list of pets available for adoption, using data retrieved from the model (e.g., calling Pet::getAll()).
Provide links or buttons to access the form for adding new pets. -->

<form action="">
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
</form>