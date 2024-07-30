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
			self::HEAD_OF_HOUSEHOLD => 'Head of Household',
			self::SPOUSE => 'Spouse',
			self::CHILD => 'Child',
			self::OTHER_RELATIVE => 'Other Relative',
			self::NON_RELATIVE => 'Non Relative',
		};
	}

	public function toString(): string
	{
		return $this->value;
	}
}
