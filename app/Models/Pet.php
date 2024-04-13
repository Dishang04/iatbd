<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'when',
        'hourlyRate',
        'durationHours',
        'details',
        'image',
        'active'
        // 'question',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'interested_pet_user')->withPivot('active');
    }
}
