<?php
/**
 *
 */
class RentalTest extends PHPUnit_Framework_TestCase
{
  public function testCanGetMovieToRental()
  {
    $movieMock = $this->getMockBuilder(Movie::class)
    ->setConstructorArgs(array('Test Movie',15.00))
    ->getMock();

    $movieMock->expects($this->any())
          ->method("getTitle")
          ->will($this->returnValue('Mock Title'));

    $myRental = new Rental($movieMock, 3);

    $this->assertEquals("Mock Title", $myRental->getMovie()->getTitle());

  }

}
