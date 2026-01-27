<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

	protected $fillable = [
		'church_id',
        'name',
        'description',
        'event_date',
        'starts_at',
        'ends_at',
        'active',
    ];

    protected $casts = [
        'event_date' => 'date',
        'starts_at' => 'datetime:H:i',
        'ends_at' => 'datetime:H:i',
    ];

	public function church(): BelongsTo
	{
		return $this->belongsTo(Church::class);
	}
}
