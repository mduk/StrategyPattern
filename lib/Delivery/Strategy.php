<?php

namespace Delivery;

/**
 * \Delivery\Strategy
 *
 * Provides the common interface for different delivery strategy implementations.
 */
interface Strategy
{
  /**
   * getName
   *
   * Return the name of the courier service.
   *
   * @returns string The name of the delivery strategy
   */
  public function getName();

  /**
   * getEstimate
   *
   * Retrieve an estimate from the courier for delivery of a particular
   * consignment of cargo.
   *
   * @param \Delivery\Consignment $cargo The consignment to be dispatched
   * @param \Delivery\Address $destination The address to be shipped to
   * @returns \Delivery\Estimate The estimate for delivery (price and time).
   */
  public function getEstimate( Consignment $cargo, Address $destination );

  /**
   * confirm
   *
   * Confirm an estimate with a courier.
   *
   * @param \Delivery\Estimate $estimate The estimate to be confirmed
   * @returns boolean Whether or not the estimate has been confirmed.
   */
  public function confirm( Estimate $estimate );
}
