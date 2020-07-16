<?php

namespace ProductDiscounter\PaymentType;

abstract class PaymentType
{
	/** @var string */
	protected $name;

	public function __construct()
	{
		$this->name = static::PAYMENT_TYPE_NAME;
	}

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->name;
	}
}
