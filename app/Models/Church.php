<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Church extends Model
{
	/** @use HasFactory<\Database\Factories\ChurchFactory> */
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'user_id',
		'name',
		'street_address',
		'city',
		'province',
		'postal_code',
		'phone_number',
		'email',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function memberTypes(): HasMany
	{
		return $this->hasMany(MemberType::class);
	}

	public function members(): HasMany
	{
		return $this->hasMany(Member::class);
	}
}
