<?php

namespace App\Models;

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
		'street',
		'city',
		'province',
		'postal_code',
		'phone_number',
		'email',
	];

	public function church(): BelongsTo
	{
		return $this->belongsTo(Church::class);
	}

	public function memberType(): BelongsTo
	{
		return $this->belongsTo(MemberType::class);
	}
}
