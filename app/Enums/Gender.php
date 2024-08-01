<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Gender: string implements HasLabel
{
	case MALE = 'MALE';
	case FEMALE = 'FEMALE';

	public function getLabel(): ?string
	{
		return match($this) {
			self::MALE => 'Laki-laki',
			self::FEMALE => 'Perempuan',
		};
	}

	public function toString(): string
	{
		return $this->value;
	}
}
