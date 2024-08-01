<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum FamilyMemberType: string implements HasLabel
{
	case HEAD_OF_HOUSEHOLD = 'HEAD_OF_HOUSEHOLD';
	case SPOUSE = 'SPOUSE';
	case CHILD = 'CHILD';
	case OTHER_RELATIVE = 'OTHER_RELATIVE';
	case NON_RELATIVE =	'NON_RELATIVE';

	public function getLabel(): ?string
	{
		return match($this) {
			self::HEAD_OF_HOUSEHOLD => 'Kepala Keluarga',
			self::SPOUSE => 'Pasangan',
			self::CHILD => 'Anak',
			self::OTHER_RELATIVE => 'Relatif',
			self::NON_RELATIVE => 'Non Relatif',
		};
	}

	public function toString(): string
	{
		return $this->value;
	}
}
