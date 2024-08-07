<?php

namespace App\Models;

use App\Enums\EventTypePattern;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventType extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
		'pattern',
	];

	public function casts(): array
	{
		return [
			'pattern' => EventTypePattern::class,
		];
	}

	public function events(): HasMany
	{
		return $this->hasMany(Event::class);
	}
}
