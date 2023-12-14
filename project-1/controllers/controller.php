<!-- Receive form data from form.php through POST requests.
Pass the data to the appropriate model methods for processing (e.g., Pet::create()).
Handle any errors or success scenarios returned by the model.
Redirect users to the appropriate page (e.g., confirmation page, error page, or refreshed home page). -->

<?php
include_once 'models/model.php';

class Controller
{
  private $model;
  public function __construct($connection)
  {
    $this->model = new userModel($connection);
  }
  public function showPets()
  {
    $pets = $this->model->selectPets();
    include 'views/home.php';
  }
  public function showForm()
  {
    include 'views/form.php';
  }
  public function add()
  {
    try {
      // Ensure that the form was submitted
      if (!isset($_POST['petName'])) {
        throw new Exception('Form not submitted properly.');
      }

      // Extract form data
      $petName = $_POST['petName'];
      $species = $_POST['species'];
      $breed = $_POST['breed'];
      $gender = $_POST['gender'];
      $isVaccinated = isset($_POST['isVaccinated']) ? 'Yes' : 'No';
      $age = $_POST['age'];
      $isTrained = $_POST['trained'];
      $size = $_POST['size'];
      $furType = $_POST['furType'];
      $petDescription = $_POST['description'];
      $adoptionPrice = $_POST['adoptionPricingID'];

      // Validate form data
      if (empty($petName) || empty($species) || empty($breed) || empty($gender) || empty($isVaccinated) || empty($age) || empty($isTrained) || empty($size) || empty($furType) || empty($petDescription) || empty($adoptionPrice)) {
        throw new Exception('Missing information in form data.');
      }

      // Call the model method to insert pet
      if ($this->model->insertPet($petName, $species, $breed, $gender, $isVaccinated, $age, $isTrained, $size, $furType, $petDescription, $adoptionPrice)) {
        echo "<p>Added pet: $petName, $species, $breed, $gender, $isVaccinated, $age, $isTrained, $size, $furType, $petDescription, $adoptionPrice</p>";
      } else {
        throw new Exception('Could not add pet to the database.');
      }

      // Redirect to show pets
      $this->showPets();
    } catch (Exception $e) {
      // Log the error and display a user-friendly message
      echo '<p>Error: ' . $e->getMessage() . '</p>';
      $this->showForm();
    }
  }
}

$connection = new connectionObject("localhost", "petstore_user", "5bJ94ht4~", "petstore");
$controller = new Controller($connection);

// $controller->showPets();
// $controller->showForm();
// $controller->add();
// if page gets information, add it
// otherwise show form
if (isset($_POST['petName'])) {
  $controller->add();
} else {
  $controller->showForm();
}
