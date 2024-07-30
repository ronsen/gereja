<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
	use HasFactory;

	protected $fillable = [
		'name',
	];

	public function familyMembers(): HasMany
	{
		return $this->hasMany(FamilyMember::class);
	}
}
