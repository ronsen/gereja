<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
	/** @use HasFactory<\Database\Factories\MemberFactory> */
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'church_id',
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
		'joined_at',
		'baptized_at',
		'confirmed_at',
	];

	protected function casts(): array
	{
		return [
			'gender' => Gender::class,
			'date_of_birth' => 'date',
			'joined_at' => 'date',
			'baptized_at' => 'date',
			'confirmed_at' => 'date',
		];
	}

	public function church(): BelongsTo
	{
		return $this->belongsTo(Church::class);
	}

	public function roles(): BelongsToMany
	{
		return $this
			->belongsToMany(Role::class)
			->using(MemberRole::class)
			->withPivot([
				'started_at',
				'ended_at',
			]);
	}

	public function activeRoles()
	{
		return $this
			->roles()
			->wherePivot('started_at', '<=', now())
			->where(function (Builder $q) {
				$q->wherePivotNull('ended_at')->orWherePivor('ended_at', '>=', now());
			});
	}

	public function attendances(): HasMany
	{
		return $this->hasMany(Attendance::class);
	}

	public function eventSessionAssignments(): HasMany
	{
		return $this->hasMany(EventSessionAssignment::class);
	}

	public function families(): BelongsToMany
	{
		return $this->belongsToMany(Family::class, 'family_members')->withPivot([
			'family_role_id',
		]);
	}
}
