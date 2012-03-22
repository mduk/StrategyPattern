<?php

namespace Mock\Delivery\Strategy\RoyalMail;
use \Delivery\Consignment;
use \Delivery\Address;
use \Delivery\Estimate;

/**
 * \Mock\Delivery\Strategy\RoyalMail\FirstClass
 *
 * An example delivery strategy implementation. Note that the actual
 * implementation details are entirely fictional. The important part
 * here is that it implements the \Delivery\Strategy interface.
 */
class FirstClass implements \Delivery\Strategy
{
  public function getName()
  {
    return 'Royal Mail First Class';
  }

  public function getEstimate( Consignment $cargo, Address $destination )
  {
    // Our magic to estimate delivery
	$estimatedCost = 1.50;
	$estimatedTime = "3 to 5 Working Days";

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
	return true;
  }
}
