<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    // $pets = $this->model->selectAllPets();
    // include 'views/home.php';
    return $this->model->selectAllPets();
  }
  public function showForm()
  {
    include 'views/form.php';
  }
  public function add()
  {
    try {
      if (!isset($_POST['petName'])) {
        throw new Exception('Form not submitted properly.');
      }

      $petName = $_POST['petName'];
      $species = $_POST['speciesID'];
      $breed = $_POST['breedID'];
      $gender = $_POST['gender'];
      $isVaccinated = isset($_POST['isVaccinated']) ? 'Yes' : 'No';
      $age = $_POST['age'];
      $isTrained = $_POST['isTrained'];
      $size = $_POST['sizeID'];
      $furType = $_POST['furTypeID'];
      $petDescription = $_POST['petDescription'];
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
    } catch (Exception $e) {
      echo $e->getMessage();
      echo var_dump($e);
    }
  }
  public function editForm($petId)
  {
    $pet = $this->model->selectPetById($petId);
    include 'views/edit-form.php';
  }
  public function update($petId)
  {
    // Get the updated data from the form
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

    // Call the model method to update the pet
    $success = $this->model->updatePet(
      $petId,
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
    }
  }
}

$connection = new connectionObject("localhost", "petstore_db_user", "5bJ94ht4~", "petstore_db");
$controller = new Controller($connection);

if (isset($_POST['petName']) && isset($_GET['petID'])) {
  $controller->update($_GET['petID']);
} elseif (isset($_POST['petName'])) {
  $controller->add();
}
?>

<?php

if (!isset($_GET['controller']) || $_GET['controller'] == "home") {
  include("views/welcome.php");
} elseif ($_GET['controller'] == "login") {
  include("views/login.php");
} elseif ($_GET['controller'] == "dashboard") {
  $pets = $controller->showPets();
  include("views/dashboard.php");
} elseif ($_GET['controller'] == "edit") {
  $controller->editForm($_GET['petID']);
} elseif ($_GET['controller'] == "logout") {
  include("views/logout.php");
} elseif ($_GET['controller'] == "form") {
  $controller->showForm();
} else {
  include("views/404.php");
}

?>
