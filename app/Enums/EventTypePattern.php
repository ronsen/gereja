<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum EventTypePattern: string implements HasLabel
{
	case NONE = 'NONE';
	case WEEKLY = 'WEEKLY';
	case MONTHLY = 'MONTHLY';
	case YEARLY = 'YEARLY';

	public function getLabel(): ?string
	{
		return match($this) {
			self::NONE => 'None',
			self::WEEKLY => 'Weekly',
			self::MONTHLY => 'Monthly',
			self::YEARLY => 'Yearly',
		};
	}

	public function toString(): string
	{
		return $this->value;
	}
}
