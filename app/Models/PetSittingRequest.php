<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetSittingRequest extends Model
{
    use HasFactory;

    protected $fillable = ['pet_id', 'sitter_id', 'status'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function sitter()
    {
        return $this->belongsTo(User::class, 'sitter_id');
    }
}
