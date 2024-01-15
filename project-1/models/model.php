<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


class connectionObject
{
  public function __construct(public $host, public $username, public $password, public $database)
  {
  }
}

class userModel
{
  private $mysqli;
  private $connectionObject;

  public function __construct($connectionObject)
  {
    $this->connectionObject = $connectionObject;
  }
  public function connect()
  {
    try {
      $mysqli = new mysqli($this->connectionObject->host, $this->connectionObject->username, $this->connectionObject->password, $this->connectionObject->database);
      if ($mysqli->connect_error) {
        throw new Exception('Could not connect');
      }
      return $mysqli;
    } catch (Exception $e) {
      return false;
    }
  }
  public function selectAllPets()
  {
    $mysqli = $this->connect();

    if ($mysqli) {
      $pets = [];

      $query = "
            SELECT p.*, s.speciesName, b.breedType, sz.sizeName, f.furTypeName, ap.adoptionPrice
            FROM pets p
            JOIN species s ON p.speciesID = s.speciesID
            JOIN breeds b ON p.breedID = b.breedID
            JOIN size sz ON p.sizeID = sz.sizeID
            JOIN furTypes f ON p.furTypeID = f.furTypeID
            JOIN adoptionPricing ap ON p.adoptionPricingID = ap.adoptionPricingID
            ORDER BY p.petID ASC
        ";

      $result = $mysqli->query($query);

      while ($row = $result->fetch_assoc()) {
        $pets[] = $row;
      }

      $mysqli->close();
      return $pets;
    } else {
      return false;
    }
  }

  public function insertPet($petName, $species, $breed, $gender, $isVaccinated, $age, $isTrained, $size, $furType, $petDescription, $adoptionPrice, $petImage)
  {
    $mysqli = $this->connect();
    if (!$mysqli) {
      die('Could not connect to the database.');
    }

    $query = "INSERT INTO pets (petName, speciesID, breedID, gender, isVaccinated, age, isTrained, sizeID, furTypeID, petDescription, adoptionPricingID, petImage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    if (!$stmt) {
      die('Error in prepared statement: ' . htmlspecialchars($mysqli->error));
    }

    $stmt->bind_param('siissisiisis', $petName, $species, $breed, $gender, $isVaccinated, $age, $isTrained, $size, $furType, $petDescription, $adoptionPrice, $petImage);
    if ($stmt->execute()) {
      $mysqli->close();
      return true;
    } else {
      die('Error in query execution: ' . htmlspecialchars($stmt->error));
    }
  }

  public function selectPetById($petId)
  {
    $mysqli = $this->connect();

    if (!$mysqli) {
      die('Could not connect to the database.');
    }

    $query = "SELECT p.petID, p.petName, s.speciesName, b.breedType, p.gender, p.age, sz.sizeName, f.furTypeName, p.isVaccinated, p.isTrained, p.petDescription, ap.adoptionPrice
              FROM pets p
              INNER JOIN species s ON p.speciesID = s.speciesID
              INNER JOIN breeds b ON p.breedID = b.breedID
              INNER JOIN size sz ON p.sizeID = sz.sizeID
              INNER JOIN furTypes f ON p.furTypeID = f.furTypeID
              INNER JOIN adoptionPricing ap ON p.adoptionPricingID = ap.adoptionPricingID
              WHERE p.petID = $petId";

    $result = $mysqli->query($query);



    if ($result) {
      $pet = $result->fetch_assoc();
      $mysqli->close();
      return $pet;
    } else {
      die('Error: ' . htmlspecialchars($mysqli->error));
    }
  }

  public function updatePet($petId, $updatedPetName, $updatedSpecies, $updatedBreed, $updatedGender, $isVaccinatedUpdate, $updatedAge, $isTrainedUpdate, $updatedSize, $updatedFurType, $updatedPetDescription, $updatedAdoptionPrice)
  {
    $mysqli = $this->connect();

    if (!$mysqli) {
      error_log("Error: Could not connect to the database.");
      return false;
    }

    $query = "UPDATE pets SET petName = ?, speciesID = ?, breedID = ?, gender = ?, isVaccinated = ?, age = ?, isTrained = ?, sizeID = ?, furTypeID = ?, petDescription = ?, adoptionPricingID = ? WHERE petID = ?";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
      $mysqli->close();
      return false;
    }

    $stmt->bind_param(
      'sssssisiisii',
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
      $petId
    );

    if (!$stmt->execute()) {
      $error = $stmt->error;
      $stmt->close();
      $mysqli->close();

      error_log("SizeID to be updated: " . $updatedSize);

      if (!$stmt->execute()) {
        $error = $stmt->error;

        error_log("Error executing updatePet query: $error");

        echo "Error executing updatePet query: $error";

        $stmt->close();
        $mysqli->close();

        return false;
      }

      return false;
    }

    $stmt->close();
    $mysqli->close();

    return true;
  }

  public function deletePet($petId)
  {
    $mysqli = $this->connect();

    if (!$mysqli) {
      error_log("Error: Could not connect to the database.");
      return false;
    }

    $query = "DELETE FROM pets WHERE petID = ?";
    $stmt = $mysqli->prepare($query);

    if (!$stmt) {
      $mysqli->close();
      return false;
    }

    $stmt->bind_param('i', $petId);

    if (!$stmt->execute()) {
      $error = $stmt->error;
      $stmt->close();
      $mysqli->close();

      error_log("Error executing deletePet query: $error");
      echo "Error executing deletePet query: $error";

      return false;
    }

    $stmt->close();
    $mysqli->close();

    return true;
  }
}
