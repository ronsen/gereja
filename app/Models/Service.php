<?php

namespace App\Models;

use App\Enums\Frequency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
	/** @use HasFactory<\Database\Factories\ServiceFactory> */
	use HasFactory;

	protected $fillable = [
		'church_id',
		'frequency',
		'name',
		'day_of_week',
		'day_of_month',
		'day_of_year',
		'month_of_year',
		'starts_at',
		'ends_at',
	];

	protected function casts(): array
	{
		return [
			'frequency' => Frequency::class,
			'starts_at' => 'datetime:H:i',
			'ends_at' => 'datetime:H:i',
		];
	}

	public function church(): BelongsTo
	{
		return $this->belongsTo(Church::class);
	}
}
