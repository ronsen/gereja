<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupMember extends Model
{
	use HasFactory;

	protected $fillable = [
		'group_id',
		'congregation_id',
	];

	public function group(): BelongsTo
	{
		return $this->belongsTo(Group::class);
	}

	public function congregation(): BelongsTo
	{
		return $this->belongsTo(Congregation::class);
	}
}
