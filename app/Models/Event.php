<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'event_type_id',
		'name',
		'description',
		'start_at',
		'end_at',
	];

	protected function casts(): array
	{
		return [
			'start_at' => 'datetime',
			'end_at' => 'datetime',
		];
	}

	public function eventType(): BelongsTo
	{
		return $this->belongsTo(EventType::class);
	}
}
