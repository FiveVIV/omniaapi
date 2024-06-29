<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresidentFact extends Model
{
    use HasFactory;

    protected $fillable = [
        'president_id',
        'fact',
    ];

    public function president()
    {
        return $this->belongsTo(President::class);
    }
}
