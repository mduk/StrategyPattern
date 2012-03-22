<?php

namespace Delivery;

/**
 * Address
 * 
 * This interface doesn't do a great deal within the context of
 * demonstrating the strategy pattern. However, I'm sure you can 
 * see where I'm getting at with it. The main thing to remember is 
 * that it defines an interface for address objects that the 
 * \Delivery\Strategy will handle.
 */
interface Address
{
	public function getPostcode();
}