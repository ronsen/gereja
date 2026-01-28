<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventSessionAssignment extends Model
{
	protected $fillable = [
		'event_session_id',
		'person_id',
		'service_role_id',
	];

	public function eventSession(): BelongsTo
	{
		return $this->belongsTo(EventSession::class);
	}

	public function member(): BelongsTo
	{
		return $this->belongsTo(Member::class);
	}

	public function serviceRole(): BelongsTo
	{
		return $this->belongsTo(ServiceRole::class);
	}
}
