<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Congregation extends Model
{
	use HasFactory, SoftDeletes;

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
