<?php
/**
 *
 */
class CustomerTest extends PHPUnit_Framework_TestCase
{
  public function testCustomerCanGenerateStatement()
  {
    $jon = new Customer("Jon");
    $jack = new Customer("Jack");
    $lee = new Customer("Lee");
  }
}
