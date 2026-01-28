<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MemberRole extends Pivot
{
	protected $table = 'member_role';

	protected $casts = [
		'started_at' => 'date',
		'ended_at' => 'date',
	];

	public function isActive(): bool
	{
		return (
			$this->started_at <= today()
			&& (is_null($this->ended_at) || $this->ended_at >= today())
		);
	}
}
