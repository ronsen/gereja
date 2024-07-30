<?php

namespace App\Models;

use App\Enums\FamilyMemberType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyMember extends Model
{
	use HasFactory;

	protected $fillable = [
		'family_id',
		'congregation_id',
		'type',
	];

	public function casts(): array
	{
		return [
			'type' => FamilyMemberType::class,
		];
	}

	public function family(): BelongsTo
	{
		return $this->belongsTo(Family::class);
	}

	public function congregation(): BelongsTo
	{
		return $this->belongsTo(Congregation::class);
	}
}
