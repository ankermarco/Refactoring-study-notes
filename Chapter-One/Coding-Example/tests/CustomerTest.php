<?php
/**
 *
 */
class CustomerTest extends PHPUnit_Framework_TestCase
{
  public function testCustomerCanGetName()
  {
    $jon = new Customer("Jon");
    $jack = new Customer("Jack");


    $this->assertEquals("Jon", $jon->getName());
  }

  public function testCustomerCanAddRental()
  {
    //$this->markTestSkipped();
    $movieMock = $this->getMockBuilder(Movie::class)
                    ->setConstructorArgs(array('Test Movie',15.00))
                    ->getMock();

    $movieMock->expects($this->any())
              ->method('getTitle')
              ->will($this->returnValue('Mock Movie Title'));

    $rentalMock = $this->getMockBuilder(Rental::class)
                ->setConstructorArgs(array($movieMock,3))
                ->getMock();

    /* Override method */
    $rentalMock->expects($this->any())
              ->method('getMovie')
              ->will($this->returnValue($movieMock));

    $lee = new Customer("Lee");
    $lee->addRental($rentalMock);
    $lee->addRental($rentalMock);
    $statement1 = $lee->statement();
    $statement2 = $lee->statement();
    $this->assertEquals($statement1, $statement2);
  }
}
