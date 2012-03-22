<?php

namespace Mock\Delivery;

class Address implements \Delivery\Address
{
	public function getPostcode()
	{
		return 'SE10 0DX';
	}
}