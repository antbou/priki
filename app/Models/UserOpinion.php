<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOpinion extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'user_opinion';

    protected $fillable = [
        'user_id',
        'opinion_id',
        'comment',
        'points',
    ];

    public function opinion()
    {
        return $this->belongsTo(Opinion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
