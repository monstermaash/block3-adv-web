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
      $isVaccinated = $_POST['isVaccinated'];
      $age = $_POST['age'];
      $isTrained = $_POST['isTrained'];
      $size = $_POST['sizeID'];
      $furType = $_POST['furTypeID'];
      $petDescription = $_POST['petDescription'];
      $adoptionPrice = $_POST['adoptionPricingID'];
      $petImage = $_POST['petImage'];


      $petImage = '';
      if (!empty($_FILES['petImage']['name'])) {
        $targetDir = "uploads/";
        if (!file_exists($targetDir)) {
          mkdir($targetDir, 0777, true);
        }
        $targetFile = $targetDir . basename($_FILES['petImage']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES['petImage']['tmp_name']);
        if ($check === false) {
          throw new Exception("File is not an image.");
        }

        if (file_exists($targetFile)) {
          throw new Exception("Sorry, file already exists.");
        }

        if ($_FILES['petImage']['size'] > 500000) {
          throw new Exception("Sorry, your file is too large.");
        }

        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedFormats)) {
          throw new Exception("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");
        }

        if (move_uploaded_file($_FILES['petImage']['tmp_name'], $targetFile)) {
          $petImage = $targetFile;
        } else {
          throw new Exception("Sorry, there was an error uploading your file.");
        }
      }

      if (empty($petName) || empty($species) || empty($breed) || empty($gender) || empty($isVaccinated) || empty($age) || empty($isTrained) || empty($size) || empty($furType) || empty($petDescription) || empty($adoptionPrice) || empty($petImage)) {
        throw new Exception('Missing information in form data.');
      }

      if ($this->model->insertPet($petName, $species, $breed, $gender, $isVaccinated, $age, $isTrained, $size, $furType, $petDescription, $adoptionPrice, $petImage)) {
        $message = "$petName added successfully!";
        header("Location: index.php?controller=dashboard&message=" . urlencode($message));
        exit();
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
    $updatedPetImage = $_POST['petImage'];

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
      $updatedAdoptionPrice,
      $updatedPetImage
    );

    if ($success) {
      $petName = $this->model->selectPetById($petId)['petName'];
      $message = "$petName updated successfully!";
      header("Location: index.php?controller=dashboard&message=" . urlencode($message));
      exit();
    } else {
      echo 'Update failed.';
    }
  }
  public function delete($petId)
  {
    $petName = $this->model->selectPetById($petId)['petName'];
    $success = $this->model->deletePet($petId);

    if ($success) {
      $message = "$petName deleted successfully!";
      header("Location: index.php?controller=dashboard&message=" . urlencode($message));
      exit();
    } else {
      echo 'Delete failed.';
    }
  }
}

$connection = new connectionObject("localhost", "petstore_db_user", "5bJ94ht4~", "petstore_db");
$controller = new Controller($connection);

if (isset($_POST['petName']) && isset($_GET['petID'])) {
  $controller->update($_GET['petID']);
} elseif (isset($_POST['petName'])) {
  $controller->add();
} elseif (isset($_GET['controller']) && $_GET['controller'] === 'delete' && isset($_GET['petID'])) {
  $controller->delete($_GET['petID']);
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