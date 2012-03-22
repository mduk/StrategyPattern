<?php

namespace Delivery;
use \Delivery\Consignment;
use \Delivery\Address;
use \Delivery\Estimate;

/**
 * \Delivery\Options
 *
 * A class to centralise the access to all the strategy implementations.
 */
class Options
{
  /**
   * @var array All the different strategy classes
   */
  protected $_strategies = array(
    '\\Mock\\Delivery\\Strategy\\RoyalMail\\FirstClass',
    '\\Mock\\Delivery\\Strategy\\RoyalMail\\Recorded',
    '\\Mock\\Delivery\\Strategy\\Ups\\International',
    '\\Mock\\Delivery\\Strategy\\Ups\\NextDay',
  );
  
  /**
   * __construct
   * 
   * Creates a new Options instance, optionally using the delivery
   * strategy class names provided.
   * 
   * @param array $strategies Strategy class names
   */
  public function __construct( $strategies=null )
  {
	  if ( $strategies )
	  {
		  $this->_strategies = $strategies;
	  }
  }

  /**
   * getEstimates
   *
   * Calculate estimates for all available delivery strategies
   *
   * @param \Delivery\Consignment $cargo The cargo to be delivered
   * @param \Delivery\Address $destination The address to be delivered to
   * @return array(\Delivery\Estimate) An array of delivery estimates
   */
  public function getEstimates( Consignment $cargo, Address $destination )
  {
    $estimates = array();
    foreach ( $this->_strategies as $strategyName )
    {
      $strategy = new $strategyName;

      if ( !( $strategy instanceof \Delivery\Strategy ) )
      {
        throw new \Delivery\Exception( 
			"$strategyName is not a \Delivery\Strategy",
			\Delivery\Exception::INVALID_STRATEGY
		);
      }

      $estimates[] = $strategy->getEstimate( $cargo, $destination );
    }
    return $estimates;
  }

  /**
   * confirm
   *
   * Confirms an estimate for delivery.
   *
   * @param \Delivery\Estimate $estimate The delivery estimate to be confirmed
   * @returns boolean Whether or not the confirmation was successful
   */
  public function confirm( Estimate $estimate )
  {
    return $estimate->getStrategy()->confirm( $estimate );
  }
}
