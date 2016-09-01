<?php
/**
 * This is the golden master test to begin with
 * before starting refactoring
 */
class CustomerStatementTest extends PHPUnit_Framework_TestCase
{
  private $customer;

  public function setUp()
  {
    $this->customer = new Customer('Lee');
    $this->generateStatementOutput();
  }

  private function generateStatementOutput()
  {
    $this->customer->addRental(new Rental(new Movie('Test Movie', 1), 3));
    $this->customer->addRental(new Rental(new Movie('Test Movie 2', 1), 2));
    
    if(!file_exists('/tmp/gm.txt'))
    {
      $statement = $this->customer->statement();
      file_put_contents('/tmp/gm.txt', $statement);
    }
  }

  public function testCustomerCanGetStatement()
  {
    $this->assertEquals(file_get_contents('/tmp/gm.txt'), $this->customer->statement());
  }

  public function tearDown()
  {
    $this->customer = null;
  }
}
