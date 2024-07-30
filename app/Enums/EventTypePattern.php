<?php

namespace App\Enums;

enum EventTypePattern: string
{
	case NONE = 'NONE';
	case WEEKLY = 'WEEKLY';
	case MONTHLY = 'MONTHLY';
	case YEARLY = 'YEARLY';

	public function toString(): string
	{
		return $this->value;
	}
}
