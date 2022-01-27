<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changelog extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'previously',
        'user_id',
        'practice_id'
    ];

    public function practice()
    {
        return $this->belongsTo(practice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
