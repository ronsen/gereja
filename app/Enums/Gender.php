<?php

namespace App\Enums;

enum Gender: string
{
	case MALE = 'MALE';
	case FEMALE = 'FEMALE';

	public function toString(): string
	{
		return $this->value;
	}
}
