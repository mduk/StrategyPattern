<?php

namespace Mock\Delivery\Strategy\Ups;
use \Delivery\Consignment;
use \Delivery\Address;
use \Delivery\Estimate;

/**
 * \Mock\Delivery\Strategy\Ups\International
 *
 * An example delivery strategy implementation. Note that the actual
 * implementation details are entirely fictional. The important part
 * here is that it implements the \Delivery\Strategy interface.
 */
class International implements \Delivery\Strategy
{
  public function getName()
  {
    return 'UPS International';
  }

  public function getEstimate( Consignment $cargo, Address $destination )
  {
    // Our magic to estimate delivery
	$estimatedCost = 5.00 + ( $cargo->getWeight() * 7.50 );
	$estimatedTime = "5 Working Days";

    return new Estimate( array(
      'strategy' => $this,
      'consignment' => $cargo,
      'destination' => $destination,
      'cost' => $estimatedCost,
      'time' => $estimatedTime
    ) );
  }

  public function confirm( Estimate $estimate )
  {
	// Print shipping label
	// Send API notification
	return true;
  }
}
