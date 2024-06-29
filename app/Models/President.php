<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Validator;

class President extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'death_date',
        'party',
        'term_start_year',
        'term_end_year',
    ];

    public function facts()
    {
        return $this->hasMany(PresidentFact::class);
    }


}
