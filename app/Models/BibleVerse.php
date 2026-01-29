<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BibleVerse extends Model
{
	/** @use HasFactory<\Database\Factories\BibleVerseFactory> */
	use HasFactory;

	protected $fillable = [
		'event_session_id',
		'book',
		'chapter',
		'verse',
		'content',
		'sort_order',
	];

	public function eventSession(): BelongsTo
	{
		return $this->belongsTo(EventSession::class);
	}
}
