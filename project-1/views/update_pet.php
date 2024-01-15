<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $petId = $_POST['petID'];
  $updatedValue = $_POST['updatedValue'];

  $success = $controller->updatePet($petId, $updatedValue);

  if ($success) {
    echo 'Pet updated successfully';
  } else {
    echo 'Failed to update pet';
  }
} else {
  http_response_code(400);
  echo 'Invalid request method';
}
