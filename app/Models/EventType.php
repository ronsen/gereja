<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventType extends Model
{
	/** @use HasFactory<\Database\Factories\EventTypeFactory> */
	use HasFactory;

	protected $fillable = [
		'user_id',
		'name',
	];

	public $timestamps = false;

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function events(): HasMany
	{
		return $this->hasMany(Event::class);
	}
}
