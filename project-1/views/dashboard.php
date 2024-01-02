<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
if (isset($_GET['message'])) {
  $message = urldecode($_GET['message']);
  echo "<h3 class='confirmation-message'>$message</h3>";
}
?>

<h1>Dashboard</h1>

<a href="index.php?controller=logout">Logout</a>
<section>

  <?php
  include_once("controllers/controller.php");
  foreach ($pets as $pet) {
    // echo "<p>" . $pet['petName'] . "</p>";
  }
  ?>

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
          <p>Size: <?php echo $pet['sizeID']; ?></p>
          <p>Fur Type: <?php echo $pet['furTypeID']; ?></p>
          <p>Vaccinated: <?php echo $pet['isVaccinated']; ?></p>
          <p>Trained: <?php echo $pet['isTrained']; ?></p>
          <p>Description: <?php echo $pet['petDescription']; ?></p>
          <p>Adoption Price: <?php echo $pet['adoptionPricingID']; ?></p>

          <div class="buttons">
            <p><a class="btn" href="index.php?controller=edit&petID=<?php echo $pet['petID']; ?>">Edit</a></p>
            <p><a class="btn" href="index.php?controller=delete&petID=<?php echo $pet['petID']; ?>" onclick="return confirmDelete('<?php echo $pet['petName']; ?>');">Delete</a></p>
          </div>

        </div>
      <?php endforeach; ?>
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

  <p><a href="index.php?controller=form">Add a New Pet</a></p>
</section>