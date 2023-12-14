<?php

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
  public function selectPets()
  {
    $mysqli = $this->connect();
    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM pets");
      while ($row = $result->fetch_assoc()) {
        $results[] = $row;
      }
      $mysqli->close();
      return $results;
    } else {
      return false;
    }
  }

  public function insertPet($petName, $species, $breed, $gender, $isVaccinated, $age, $isTrained, $size, $furType, $petDescription, $adoptionPrice)
  {
    $mysqli = $this->connect();

    if (!$mysqli) {
      die('Could not connect to the database.');
    }

    $query = "INSERT INTO pets (petName, speciesID, breedID, gender, isVaccinated, age, isTrained, sizeID, furTypeID, petDescription, adoptionPricingID) VALUES ('$petName', $species, $breed, '$gender', '$isVaccinated', $age, '$isTrained', $size, $furType, '$petDescription', $adoptionPrice)";

    if ($mysqli->query($query)) {
      $mysqli->close();
      return true;
    } else {
      die('Error: ' . htmlspecialchars($mysqli->error));
    }
  }
}
