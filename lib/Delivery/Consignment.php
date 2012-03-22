<?php

namespace Delivery;


/**
 * \Delivery\Consignment
 * 
 * This interface doesn't do a great deal within the context of
 * demonstrating the strategy pattern, however I'm sure you can see 
 * where I'm getting at with it. It just defines an interface for 
 * objects that represent an entire consignment to be shipped, this 
 * could be one parcel, all the way to numerious pallets.
 */
interface Consignment
{
	public function getWeight();
}