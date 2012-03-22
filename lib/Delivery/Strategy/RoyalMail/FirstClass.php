<?php

namespace Delivery\Strategy\RoyalMail;
use \Delivery\Consignment;
use \Delivery\Address;
use \Delivery\Estimate;

/**
 * \Delivery\Strategy\RoyalMail\FirstClass
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
    $estimate = new \RoyalMail\Estimate(
      $consignment->getWeight(),
      $destination->getPostcode()
    );

    return new Estimate( array(
      'strategy' => $this,
      'consignment' => $cargo,
      'destination' => $destination,
      'cost' => $estimate->getCost(),
      'time' => $estimate->getTime()
    ) );
  }

  public function confirm( Estimate $estimate )
  {
    LabelPrinter::print( new \RoyalMail\ShippingLabel( array(
      'class' => 'first',
      'address' => $estimate->getDestination()
    ) ) );
  }
}
