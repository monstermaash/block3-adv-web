<?php

$response = array();

if ($success) {
  $response['success'] = true;
  $response['petName'] = $petName;
} else {
  $response['success'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
