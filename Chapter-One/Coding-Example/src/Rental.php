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
}
