<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemberType extends Model
{
	/** @use HasFactory<\Database\Factories\MemberTypeFactory> */
	use HasFactory;

	public $timestamps = false;

	protected $fillable = [
		'user_id',
		'name',
	];

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function members(): HasMany
	{
		return $this->hasMany(Member::class);
	}
}
