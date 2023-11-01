<?php

ini_set('display_errors', 1); // Show errors for debugging

$globalId = 0;

class BankAccount
{
  private $accountNumber;
  private $owner;
  private $balance = 0;
  private $overdraft = -100;

  public function __construct($owner, $balance = 0)
  {
    global $globalId;
    $globalId++;
    $this->accountNumber = $globalId;
    // $this->owner = $owner;
    // $this->balance = $balance;
  }

  public function __destruct()
  {
    $this->balance = 0;
    return $this->balance;
  }

  public function getOwner()
  {
    return $this->owner;
  }

  public function getId()
  {
    return $this->accountNumber;
  }

  public function getBalance()
  {
    return $this->balance;
  }

  private function setBalance($balance)
  {
    $this->balance = $balance;
  }

  public function deposit($amount)
  {
    $this->setBalance($this->getBalance() + $amount);
  }

  public function withdrawal($amount)
  {
    if ($this->getBalance() - $amount < $this->overdraft) {
      echo "Insufficient funds";
    } else {
      $this->setBalance($this->getBalance() - $amount);
    }
  }
}

$account1 = new BankAccount("John", 1000);
echo "account1 id: ", $account1->getId(), "<br>", " owner: ", $account1->getOwner();
echo "<br>";
$account1->deposit(100);
$account1->withdrawal(50);
echo "Balance: ", $account1->getBalance();

echo "<br>";
echo "<br>";

$account2 = new BankAccount("Tommy", 0);
echo "account2 id: ", $account2->getId(), "<br>", " owner: ", $account2->getOwner();
echo "<br>";
$account2->deposit(600);
$account2->withdrawal(200);
echo "Balance: ", $account2->getBalance();

echo "<br>";
echo "<br>";

$account3 = new BankAccount("Peter", 2);
echo "account3 id: ", $account3->getId(), "<br>", " owner: ", $account3->getOwner();
echo "<br>";
echo "Balance: ", $account3->getBalance();

echo "<br>";
echo "<br>";

$account4 = new BankAccount("Typed", 2);
echo "account4 id: ", $account4->getId(), "<br>", " owner: ", $account4->getOwner();
echo "<br>";
echo "Balance: ", $account4->getBalance();
