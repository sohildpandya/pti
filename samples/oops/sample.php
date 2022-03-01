<?php
class customer_class {
  // data members / properities
  public $name;
  public $gender;
  public $balance;

  // Constructor

  function __construct($a,$b,$c) {
    $this->name=$a;
    $this->gender=$b;
    $this->balance=$c;
  }

  // Destructor

  function __destruct() {
      echo "The final balance of ".$this->name." is :".$this->balance."<br />";
  }

  // member functions/methods

  // SETTER METHODS
  function getName() {
    return $this->name;
  }
  function getGender() {
    return $this->gender;
  }
  function getBalance() {
    return $this->balance;
  }

  // SETTER METHODS
  function setName($a) {
    $this->name=$a;
  }
  function setGender($a) {
    $this->gender=$a;
  }
  function setBalance($a) {
    $this->balance=$a;
  }

  // REQUIREMENTS BASED methods

  function deposit($deposit_amount) {
    $this->balance = $this->balance + $deposit_amount;
  }

  function withdrawl($w_amount) {
    if ($w_amount>1000) {
      echo "You cannot withdraw more than 1000 in a day";
    }
    else if ($this->balance<500) {
      echo "Your balance is too low to allow you withdrawl";
    }
    else {
      $this->balance = $this->balance - $w_amount;
    }
  }

}

class prev_customer extends customer_class {
  function withdrawl($w_amount) {
    if (($this->balance-$w_amount)<0) {
      echo "Your balance may go negative if you withdraw ".$w_amount." from your account";
    }
    else {
      $this->balance = $this->balance - $w_amount;
    }
  }
}

$myObject=new customer_class("Ram","M",2000);
echo "<br />NORMAL CUSTOMER<br />";
echo $myObject->getName()." - Balance is : ".$myObject->getBalance()."<br />";
$myObject->withdrawl(1400);
echo $myObject->getName()." - Balance is ".$myObject->getBalance()."<br />";
$myObject->deposit(400);
echo $myObject->getName()." - Balance is ".$myObject->getBalance()."<br />";
echo "<br /><br />**************************************<br />";
echo "<br />PREVILEGED CUSTOMER<br />";
$yourObject=new prev_customer("Vijay","M",2500);
echo $yourObject->getName()." - Balance is : ".$yourObject->getBalance()."<br />";
$yourObject->withdrawl(1400);

echo "<br /><br />**************************************<br />";
?>
