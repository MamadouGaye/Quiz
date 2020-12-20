<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['text', 'is_right_answer'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
