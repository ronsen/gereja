<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventSession extends Model
{
    /** @use HasFactory<\Database\Factories\EventSessionFactory> */
    use HasFactory;

    protected $fillable = [
        'event_id',
        'session_date',
        'start_time',
        'end_time',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function eventSessionAssignments(): HasMany
    {
        return $this->hasMany(EventSessionAssignment::class);
    }

    public function members()
    {
        return $this->belongsToMany(
            Member::class,
            'event_session_assignments',
        )->withPivot('service_role_id');
    }
}
