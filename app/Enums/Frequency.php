<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Frequency: string implements HasLabel
{
	case WEEKLY = 'WEEKLY';
	case MONTHLY = 'MONTHLY';
	case YEARLY = 'YEARLY';

	public function getLabel(): ?string
	{
		return match ($this) {
			self::WEEKLY => 'Weekly',
			self::MONTHLY => 'Monthly',
			self::YEARLY => 'Yearly',
		};
	}
}
