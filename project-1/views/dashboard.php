<?php
if (isset($_GET['message'])) {
  $message = urldecode($_GET['message']);
  echo "<h3 class='confirmation-message'>$message</h3>";
}
?>

<h2>Dashboard</h2>

<p><a class="btn" href="index.php?controller=logout">Logout</a></p>
<section>

  <?php
  include_once("controllers/controller.php");
  foreach ($pets as $pet) {
    // echo "<p>" . $pet['petName'] . "</p>";
  }
  ?>

  <h3>List of Pets Available for Adoption</h3>

  <div class="container">
    <?php if ($pets) : ?>
      <div class="card-container">
        <?php foreach ($pets as $pet) : ?>
          <div class="card">
            <h2><?php echo $pet['petName']; ?></h2>
            <p><?php echo $pet['petDescription']; ?></p>
            <hr>
            <div class="card-info">
              <p>Species: <span><?php echo $pet['speciesName']; ?></span></p>
              <p>Breed: <span><?php echo $pet['breedType']; ?></span></p>
              <p>Gender: <span><?php echo $pet['gender']; ?></span></p>
              <p>Age: <span><?php echo $pet['age']; ?></span></p>
              <p>Size: <span><?php echo $pet['sizeName']; ?></span></p>
              <p>Fur Type: <span><?php echo $pet['furTypeName']; ?></span></p>
              <p>Vaccinated: <span><?php echo $pet['isVaccinated']; ?></span></p>
              <p>Trained: <span><?php echo $pet['isTrained']; ?></span></p>
              <p>Adoption Price: <span>$<?php echo $pet['adoptionPrice']; ?></span></p>
            </div>
            <div class="buttons">
              <p><a class="btn" href="index.php?controller=edit&petID=<?php echo $pet['petID']; ?>">Edit</a></p>
              <p><a class="btn" href="index.php?controller=delete&petID=<?php echo $pet['petID']; ?>" onclick="return confirmDelete('<?php echo $pet['petName']; ?>');">Delete</a></p>
            </div>

          </div>
        <?php endforeach; ?>
      </div>
  </div>

  <script>
    // JavaScript for inline editing
    document.querySelectorAll('.editable').forEach(element => {
      element.addEventListener('blur', function() {
        const petId = this.dataset.petid;
        const updatedValue = this.innerText;

        // Send an AJAX request to update the pet's name
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Pet updated successfully');
          }
        };

        xhr.open('POST', 'edit-form.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(`petId=${petId}&updatedValue=${encodeURIComponent(updatedValue)}`);
      });
    });
  </script>

  <script>
    function confirmDelete(petName) {
      return confirm("Are you sure you want to delete '" + petName + "'?");
    }
  </script>

<?php else : ?>
  <!-- <p>No pets available for adoption at the moment.</p> -->
<?php endif; ?>

<p><a class="btn" href="index.php?controller=form">Add a New Pet</a></p>
</section>