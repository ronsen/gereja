<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
	/** @use HasFactory<\Database\Factories\AttendanceFactory> */
	use HasFactory;

	protected $fillable = [
		'event_session_id',
		'member_id',
	];

	public function eventSession(): BelongsTo
	{
		return $this->belongsTo(EventSession::class);
	}

	public function member(): BelongsTo
	{
		return $this->belongsTo(Member::class);
	}
}
