<?php

namespace Mock\Delivery;

require_once dirname(__FILE__) . '/../../../../lib/Mock/Delivery/Consignment.php';

/**
 * Test class for Consignment.
 * Generated by PHPUnit on 2012-03-22 at 15:41:06.
 */
class ConsignmentTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var Consignment
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new Consignment;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
		
	}

	/**
	 * @covers Mock\Delivery\Consignment::getWeight
	 * @todo Implement testGetWeight().
	 */
	public function testGetWeight()
	{
		$this->assertEquals( 1.5, $this->object->getWeight() );
	}

}

?>
