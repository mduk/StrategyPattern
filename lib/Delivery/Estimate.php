<?php

namespace Delivery;

/**
 * \Delivery\Estimate 
 */
class Estimate
{
	
	/**
	 * @var \Delivery\Strategy The strategy used to get this estimate 
	 */
	protected $_strategy = null;
	
	/**
	 * @var \Delivery\Consignment The consignment that this estimate is for
	 */
	protected $_consignment = null;
	
	/**
	 * @var \Delivery\Address The destination address estimated for
	 */
	protected $_destination = null;
	
	/**
	 * @var currency The estimated total shipping cost
	 */
	protected $_cost = null;
	
	/**
	 * @var duration The time required to deliver the consignment 
	 */
	protected $_time = null;
	
	/**
	 * __construct
	 * 
	 * @param array $data Data to populate the Estimate instance with
	 */
	public function __construct( array $data=array() )
	{
		foreach ( $data as $key => $value )
		{
			if ( property_exists( $this, "_$key" ) )
			{
				$this->{"_$key"} = $value;
			}
		}
	}
	
	/**
	 * __call
	 * 
	 * Handles all the get*() calls.
	 * 
	 * @param string $method The name of the method called
	 * @param mixed $args Not currently used
	 * @return mixed Method result
	 */
	public function __call( $method, $args )
	{
		if ( substr( $method, 0, 3 ) == 'get' )
		{
			$param = strtolower( substr( $method, 3 ) );
			
			if ( property_exists( $this, "_$param" ) )
			{
				return $this->{"_$param"};
			}
		}
		
		trigger_error( "Unknown method called: $method", E_USER_ERROR );
	}
}