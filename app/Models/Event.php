<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
	/** @use HasFactory<\Database\Factories\EventFactory> */
	use HasFactory;

	protected $fillable = [
		'church_id',
		'event_type_id',
		'name',
		'description',
		'location',
	];

	public function church(): BelongsTo
	{
		return $this->belongsTo(Church::class);
	}

	public function eventType(): BelongsTo
	{
		return $this->belongsTo(EventType::class);
	}

	public function eventSessions(): HasMany
	{
		return $this->hasMany(EventSession::class);
	}
}
