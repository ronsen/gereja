<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
	/** @use HasFactory<\Database\Factories\MemberFactory> */
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'church_id',
		'member_type_id',
		'name',
		'gender',
		'place_of_birth',
		'date_of_birth',
		'street_address',
		'city',
		'province',
		'postal_code',
		'phone_number',
		'email',
	];

	protected function casts(): array
	{
		return [
			'gender' => Gender::class,
			'date_of_birth' => 'date',
		];
	}

	public function church(): BelongsTo
	{
		return $this->belongsTo(Church::class);
	}

	public function memberType(): BelongsTo
	{
		return $this->belongsTo(MemberType::class);
	}
}
