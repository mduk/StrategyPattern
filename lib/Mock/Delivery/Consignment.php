<?php

namespace Mock\Delivery;

class Consignment implements \Delivery\Consignment
{
	public function getWeight()
	{
		return 1.5;
	}
}