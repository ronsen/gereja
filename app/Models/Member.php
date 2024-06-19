<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'date_of_birth',
		'gender',
		'address',
		'city',
		'province',
		'country',
		'phone_number',
		'email',
	];

	protected function casts(): array
	{
		return [
			'date_of_birth' => 'date',
			'gender' => Gender::class,
		];
	}
}
