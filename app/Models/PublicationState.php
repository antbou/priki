<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationState extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function practices()
    {
        return $this->hasMany(Practice::class);
    }

    public static function findBySlug(string $slug): PublicationState
    {
        return self::where('slug', $slug)->first();
    }
}
