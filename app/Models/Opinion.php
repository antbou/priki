<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    public function practice()
    {
        return $this->belongsTo(Practice::class)->first();
    }

    public function comments()
    {
        return $this->hasMany(UserOpinion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->first();
    }
}
