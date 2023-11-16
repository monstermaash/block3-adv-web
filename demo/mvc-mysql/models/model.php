<?php

class ConnectionObject
{
  public function __construct(public $host, public $username, public $password, public $database)
  {
    // echo "ConnectionObject constructor<br>";
  }
}

class UserModel
{
  private $connectionObject;

  public function __construct(ConnectionObject $connectionObject)
  {
    $this->connectionObject = $connectionObject;
  }

  private function connect()
  {
    try {
      $mysqli = new mysqli(
        $this->connectionObject->host,
        $this->connectionObject->username,
        $this->connectionObject->password,
        $this->connectionObject->database
      );

      if ($mysqli->connect_error) {
        throw new Exception('Could not connect');
      }

      return $mysqli;
    } catch (Exception $e) {
      return false;
    }
  }

  public function disconnect($mysqli)
  {
    $mysqli->close();
  }

  public function selectUsers()
  {
    $mysqli = $this->connect();

    if ($mysqli) {
      $result = $mysqli->query("SELECT * FROM basic_demo");
      // $users = [];
      // $row = [];

      while ($row = $result->fetch_assoc()) {
        $users[] = $row;
        // var_dump($row);
      }
      $this->disconnect($mysqli);
      // var_dump($users);
      return $users;
    } else {
      return false;
    }
  }
}


$connectionObject = new ConnectionObject("localhost", "basic_demo_user", "p2kJe40^2", "basic_demo");
$userModel = new UserModel($connectionObject);

$users = $userModel->selectUsers();

if ($users) {
  foreach ($users as $user) {
    echo $user['ID'] . " " . $user['name'] . " " . $user['email'] . "<br>";
  }
} else {
  echo "Failed to fetch users.";
}
