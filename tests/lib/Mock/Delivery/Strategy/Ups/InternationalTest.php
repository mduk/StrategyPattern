<?php

namespace Mock\Delivery\Strategy\Ups;

require_once dirname(__FILE__) . '/../../../../../../lib/Mock/Delivery/Strategy/Ups/International.php';

/**
 * Test class for International.
 * Generated by PHPUnit on 2012-03-22 at 15:41:06.
 */
class InternationalTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var International
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->object = new International;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
		
	}

	public function testGetName()
	{
		$this->assertEquals( 'UPS International', $this->object->getName() );
	}

	public function testGetEstimate()
	{
		$estimate = $this->object->getEstimate(
			new \Mock\Delivery\Consignment,
			new \Mock\Delivery\Address
		);
		$this->assertInstanceOf( '\\Delivery\\Estimate', $estimate );
		$this->assertEquals( 16.25, $estimate->getCost() );
		$this->assertEquals( '5 Working Days', $estimate->getTime() );
	}

	public function testConfirm()
	{
		$estimate = $this->object->getEstimate(
			new \Mock\Delivery\Consignment,
			new \Mock\Delivery\Address
		);
		$result = $this->object->confirm( $estimate );
		$this->assertTrue( $result );
	}

}

?>
