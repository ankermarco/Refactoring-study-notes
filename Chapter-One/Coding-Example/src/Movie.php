<?php

/**
 * Movie is just a simple data class.
 */
class Movie
{
  const CHILDRENS = 2;
  const REGULAR = 0;
  const NEW_RELEASE = 1;

  private $_title;
  private $_priceCode;

  function __construct($title, $priceCode)
  {
    $this->_title = $title;
    $this->_priceCode = $priceCode;
  }

  public function getPriceCode()
  {
    return $this->_priceCode;
  }

  public function setPriceCode($arg)
  {
    $this->priceCode = $arg;
  }

  public function getTitle()
  {
    return $this->_title;
  }
}
