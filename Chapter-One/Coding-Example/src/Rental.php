<?php
/**
 * The rental class represents a customer renting a movie.
 */
class Rental
{
  private $_movie;
  private $_daysRented;

  function __construct(Movie $movie, $daysRented)
  {
    $this->_movie = $movie;
    $this->_daysRented = $daysRented;
  }

  public function getDaysRented()
  {
    return $this->_daysRented;
  }

  public function getMovie()
  {
    return $this->_movie;
  }

  public function getCharge()
  {
    $result = 0.00;
    switch ($this->getMovie()->getPriceCode()) {
      case Movie::REGULAR:
        $result += 2;
        if ($this->getDaysRented() > 2) {
          $result += ($this->getDaysRented() - 2) * 1.5;
        }
        break;
      case Movie::NEW_RELEASE:
        $result += $this->getDaysRented() * 3;
        break;
      case Movie::CHILDRENS:
        $result += 1.5;
        if ($this->getDaysRented() > 3) {
          $result += ($this->getDaysRented() - 3) * 1.5;
        }
        break;
    }
    return $result;
  }

  public function getFrequentRenterPoints()
  {
    $frequentRenterPoints = 1;
    // add bonus for a two day new release rental
    if (($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE) &&
        $this->getDaysRented() > 1) {
      $frequentRenterPoints = 2;
    }

    return $frequentRenterPoints;
  }
}
