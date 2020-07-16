<?php

namespace ProductDiscounter\PaymentType;

final class FakePaymentType extends PaymentType
{
	protected const PAYMENT_TYPE_NAME = 'fake';

	/**
	 * @return string
	 */
	public function __toString(): string
	{
		return $this->name;
	}
}
