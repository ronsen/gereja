<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
	use HasFactory;

	protected $fillable = [
		'group_type_id',
		'name',
	];

	public function groupType(): BelongsTo
	{
		return $this->belongsTo(GroupType::class);
	}

	public function groupMembers(): HasMany
	{
		return $this->hasMany(GroupMember::class);
	}
}
