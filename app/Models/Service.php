<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
	/** @use HasFactory<\Database\Factories\ServiceFactory> */
	use HasFactory;

	public const DAYS = [
		0 => 'Sunday',
		1 => 'Monday',
		2 => 'Tuesday',
		3 => 'Wednesday',
		4 => 'Thursday',
		5 => 'Friday',
		6 => 'Saturday',
	];

	protected $fillable = [
		'church_id',
		'name',
		'day_of_week',
		'start_time',
		'end_time',
	];

	protected function casts(): array
	{
		return [
			'start_time' => 'datetime:H:i',
			'end_time' => 'datetime:H:i',
		];
	}

	public function church(): BelongsTo
	{
		return $this->belongsTo(Church::class);
	}
}
