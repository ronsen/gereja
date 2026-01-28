<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
	/** @use HasFactory<\Database\Factories\MemberRoleFactory> */
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

	public function members(): BelongsToMany
	{
		return $this
			->belongsToMany(Member::class)
			->using(MemberRole::class)
			->withPivot([
				'started_at',
				'ended_at',
			]);
	}
}
