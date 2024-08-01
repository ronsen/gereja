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
			self::NONE => 'Kosong',
			self::WEEKLY => 'Mingguan',
			self::MONTHLY => 'Bulanan',
			self::YEARLY => 'Tahunan',
		};
	}

	public function toString(): string
	{
		return $this->value;
	}
}
