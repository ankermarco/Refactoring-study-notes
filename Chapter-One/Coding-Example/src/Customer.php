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
    $result = "Rental Record for " . $this->getName() . "\n";
    foreach ($this->_rentals as $each) {
      // show figures for this rental
      $result .= "\t" . $each->getMovie()->getTitle() . "\t" . $each->getCharge() . "\n";
    }
    // add footer lines
    $result .= "Amount owed is " . $this->getTotalCharge() . "\n";
    $result .= "You earned " . $this->getTotalFrequentRenterPoints() . " frequent renter points";
    return $result;
  }

  public function htmlStatement()
  {
    $result = "<h1>Rentals for <em>" .$this->getName(). "</em></h1>\n";
    foreach ($this->_rentals as $each) {
      // show figure for each rental
      $result .= "\t<p>" . $each->getMovie()->getTitle() . ": " . $each->getCharge() . "</p>\n";
    }
    // add footer lines
    $result .= "\t<p>You owe <em>" . $this->getTotalCharge() . "</em><br/>\n";
    $result .= "\tYou earned <em>" . $this->getTotalFrequentRenterPoints() . " frequent renter points</p>";
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

  private function getTotalFrequentRenterPoints()
  {
    $result = 0;
    foreach ($this->_rentals as $each) {
      $result += $each->getFrequentRenterPoints();
    }
    return $result;
  }

}
