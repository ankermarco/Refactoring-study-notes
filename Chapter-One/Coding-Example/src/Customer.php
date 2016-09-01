<?php

/**
 * The customer class represents the customer of the store.
 */
class Customer
{
  private $_name;
  private $_rentals = array();

  function __construct($name)
  {
    $this->_name = $name;
  }

  public function addRental(Rental $arg)
  {
    array_push($this->_rentals, $arg);
  }

  public function getName()
  {
    return $this->_name;
  }

  public function statement()
  {
    $totalAmount = 0.00;
    $frequentRenterPoints = 0;
    $rentals = $this->_rentals;
    $result = "Rental Record for " . $this->getName() . "\n";
    foreach ($rentals as $each) {
      $frequentRenterPoints += $each->getFrequentRenterPoints();


      // show figures for this rental
      $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";
      $totalAmount += $each->getCharge();
    }
    // add footer lines
    $result .= "Amount owed is " . $this->getTotalCharge() . "\n";
    $result .= "You earned " . $frequentRenterPoints . " frequent renter points";
    return $result;
  }

  private function getTotalCharge()
  {
    $result = 0;
    foreach ($this->_rentals as $each) {
      $result += $each->getCharge();
    }
    return $result;
  }

}
