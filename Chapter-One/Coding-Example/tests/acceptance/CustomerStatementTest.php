<?php
/**
 * This is the golden master test to begin with
 * before starting refactoring
 */
class CustomerStatementTest extends PHPUnit_Framework_TestCase
{
  private $movie;
  private $rental;
  private $customer;
  private $first = true;

  public function setUp()
  {
    $this->movie = new Movie('Test Movie', 1);
    $this->rental = new Rental($this->movie, 3);
    $this->customer = new Customer('Lee');

    if ($this->first)
    {
      $this->generateStatementOutput();
    }

  }

  public function generateStatementOutput()
  {
    $this->customer->addRental($this->rental);
    $statement = $this->customer->statement();
    file_put_contents('/tmp/gm.txt', $statement);
    $this->first = false;
  }

  public function testCustomerCanGetStatement()
  {
    $this->assertEquals(file_get_contents('/tmp/gm.txt'), $this->customer->statement());
  }

  public function tearDown()
  {
    $this->movie = null;
    $this->rental = null;
    $this->customer = null;
  }
}
